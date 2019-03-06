<?php
namespace App\Http\Controllers\Api;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Client;
use App\Blood_Type;
use App\Token;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = validator()->make($request->all(),[
            'name'=>'required',
            'email'=>'required|unique:clients|email',
            'phone_number'=>'required|unique:clients',
            'password'=>'required|confirmed',
            'city_id'=>'required|exists:cities,id',
            'blood_type_id'=>'required|exists:blood_types,id',
        ]);

        if($validator->fails())
        {
            return responseJson('0', $validator->errors()->first(), $validator->errors());
        }

        $request->merge(['password'=>bcrypt($request->password)]);
        $client = Client::create($request->all());
        $client->api_token = str_random(60);
        $client->save();
        return responseJson(1,'تم الأضافه بنجاح', [
            'api_token'=>$client->api_token,
            'client'=>$client->load('blood_type','city'),
            //'blood Name'=>$client>load('blood_type')
        ]);
        
    }
    public function login(Request $request){

        $validator = validator()->make($request->all(),[
            'phone_number'=>'required',
            'password'=>'required',
        ]);
        if($validator->fails())
        {
            return responseJson('0', $validator->errors()->first(), $validator->errors());
        }
        $client = Client::where('phone_number', $request->phone_number)->first();
        
        $active = Client::where('is_active', 1)->first();

        if($client)
        {
            if(Hash::check($request->password, $client->password))
            {
                if($client->is_active == 1)
                {
                    return responseJson('1', 'تم تسجيل الدخول',[
                        'api_token'=>$client->api_token,
                        'client' => $client->load('blood_type','city')
                    ]);

                }else{
                    return responseJson('0', 'لقد تم حظرك من قبل الادمن');
                }
            }else{
                return responseJson('0', 'البيانات غير صحيحه');
            }
        }else{
            return responseJson('0', 'البيانات غير صحيحه');
        }
       
    }

    public function profile(Request $request){

        $profile = $request->user();
        return responseJson('1', 'success', [
            'profile' => $profile->load('blood_type','city')
        ]);
    }

    public function  profileEdit(Request $request ,$id){

        $profile = $request->user();

        if($profile){

            $validator = validator()->make($request->all(),[
                'email'=> Rule::unique('clients')->ignore($request->user()->id),
                'phone_number'=> Rule::unique('clients')->ignore($request->user()->id),
                'password'=>'sometimes|nullable|min:6|confirmed',

            ]);

            if($request->has('password'))
            {
                $request->merge(['password'=>bcrypt($request->password)]);
            }
            if($validator->fails())
            {
                return responseJson('0', $validator->errors()->first(), $validator->errors());
            }
            

            $client = Client::where('id', $id)->update($request->all());

            return responseJson(1,'تم التحديث بنجاح', $client);

        }else{
            return responseJson('1', 'No Such ID', $profile);
        }

    }

    public function reset(Request $request)
    {
        $validation = validator()->make($request->all(),[
            'phone_number'=>'required'
        ]);

        if($validation->fails())
        {
            $data = $validation->errors();
            return responseJson('0', $validation->errors()->first(), $data);
        }

        $user = Client::where('phone_number', $request->phone_number)->first();
        if($user)
        {
            $code = rand(1111,9999);
            $update = $user->update(['code_verify' => $code]);
            if($update)
            {
                //Send Sms
                //Send Email
    
                return responseJson('1','برجاء فحص هاتفك', ['pin_code_for_test' => $code]);
    
            }else{

                return responseJson('0','حدث خطأ حاول مره اخري');
            }
        }else {
            return responseJson('0','لا يوجد أي حساب مرتبط بهذا الهاتف  ');
        }  

    }

   public function password(Request $request)
   {
       $validation = validator()->make($request->all(),[
        'code_verify' => 'required',
        'password'    => 'required|confirmed'
       ]);
       
       if($validation->fails())
       {
           $data = $validation->errors();
           return responseJson('0', $validation->errors()->first(), $data);
       }
       $user = Client::where('code_verify', $request->code_verify)->where('code_verify', '!=', 0)->first();

       if($user)
       {
           $user->password = bcrypt($request->password);
           $user->code_verify =null;

           if($user->save())
           {
            return responseJson('1','تم تغير كلمة المرور بنجاح');

           }else {

            return responseJson('0','حدث خطأ حاول مره اخري');

           }
       }else {
        return responseJson('0','هذا الكود غير صالح');
       }
   }

   public function registerToken(Request $request){
       $validation = validator()->make($request->all(),[
           'token' => 'required',
           'type'   => 'required|in:android,ios'
       ]);
       if($validation->fails())
       {
           $data = $validation->errors();
           return responseJson('0', $validation->errors()->first(), $data);
       }
        Token::where('token', $request->token)->delete();
        $request->user()->tokens()->create($request->all());
        return responseJson('1','تم التسجيل بنجاح');
   }

   public function removeToken(Request $request){

        $validation = validator()->make($request->all(),[
            'token' => 'required',
        ]);
        if($validation->fails())
        {
            $data = $validation->errors();
            return responseJson('0', $validation->errors()->first(), $data);
        }
        Token::where('token', $request->token)->delete();
        return responseJson('1','تم الحذف بنجاح');
    }

    public function notificationsSettings(Request $request)
    {
        $rules = [
            'governorates.*' => 'exists:governorates,id',
            'blood_types.*' => 'exists:blood_types,name',
        ];
        $validator = validator()->make($request->all(),$rules);
        if ($validator->fails())
        {
            return responseJson(0,$validator->errors()->first(),$validator->errors());
        }

        if ($request->has('governorates'))
        {
            $request->user()->governorates()->sync($request->governorates);
        }

        if ($request->has('blood_types'))
        {
            $blood_types = Blood_Type::whereIn('name',$request->blood_types)->pluck('blood_types.id')->toArray();
            $request->user()->bloodtypes()->sync($blood_types);
        }

        $data = [
            'governorates' => $request->user()->governorates()->pluck('governorates.id')->toArray(),
            'blood_types' => $request->user()->bloodtypes()->pluck('blood_types.name')->toArray(),
        ];
        
        return responseJson(1,'تم  التحديث',$data);
    }

}
