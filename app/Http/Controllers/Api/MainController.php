<?php
namespace App\Http\Controllers\Api;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Governorate;
use App\Cities;
use App\Post;
use App\Token;
use App\Category;
use App\Order;
use App\Contact;
use App\Setting;
class MainController extends Controller
{
    public function governorates(){

        $governorates = Governorate::all();
        return responseJson('1', 'success', $governorates);
    }
    public function cities(Request $request){
        $cities = Cities::where(function($query) use($request)
        {
            if($request->has('governorate_id'))
            {
                $query->where('governorate_id',$request->governorate_id);
            }
        })->with('governorate')->get();
        return responseJson('1', 'success', $cities);
    }
    public function posts(){

        $posts = Post::with('category')->orderBy('id','desc')->paginate(1);
        return responseJson('1', 'success', $posts);
    }
    public function categories(){

        $categories = Category::all();
        return responseJson('1', 'success', $categories);
    }

    public function showPost($id){
        $show = Post::find($id);
        if($show){
            return responseJson('1', 'success',[
                'ShowPost' =>$show,
                'category' => $show->load('category'),
            ]);
        }else{
            return responseJson('0', 'No Such ID', $show);
        }
       
    }
    
    public function orders(Request $request){
 
        $validator = validator()->make($request->all(),[
            'name'          =>'required',
            'age'           =>'required',
            'number_of_bags'=>'required',
            'hospital_name' =>'required',
            'blood_type_id' =>'required|exists:blood_types,id',
            'city_id'       =>'required|exists:cities,id',
            'phone_number'  =>'required',
            'details'       => 'required|min:50',
        ]);
        if($validator->fails())
        {
            return responseJson('0', $validator->errors()->first(), $validator->errors());
        }
       
        $Order = $request->user()->orders()->create($request->all());

        // Find Clients suitable for this order request

        $clientsIds  =$Order->city->governorate
        ->client_governorates()->whereHas('bloodtypes', function($q) use ($request){
            $q->where('blood_types.id', $request->blood_type_id);
            })->pluck('clients.id')->toArray();

        if(count($clientsIds))
        {
            //create Notifecation in database

            $notification = $Order->notifications()->create([
                'title' => 'يوجد حاله قريبه منك',
                'body'  =>$Order->blood_type->name. 'محتاج متبرع لفصيه دم ',
            ]);

            //attach clients to this notification
            $notification->clients()->attach($clientsIds);
            $tokens = Token::whereIn('client_id',$clientsIds )->where('token', '!=', null)->pluck('token')->toArray();

            if(count($tokens))
            {
                $title = $notification->title;
                $body = $notification->body;
                $data = [
                    'donation_request_id' =>$Order->id
                ];
                $send = notifyByFirebase($title, $body, $tokens, $data);
                info("firebase result: " . $send);
                
            }
            
        }
        $Order->save();
        return responseJson(1,'تم الأضافه بنجاح', [
            'Order'=>$Order->load('blood_type','city','client'),

        ]);
    }

    public function notificationsCount(Request $request)
    {
        return responseJson(1, 'loaded...', [
            'notifications_count' => $request->user()->notifications()->count()
        ]);
    }

    public function notifications(Request $request)
    {
        $items = $request->user()->notifications()->latest()->paginate(20);
        return responseJson(1, 'Loaded...', $items);
    }

    
    public function orderShow($id){
        
        $order = Order::find($id);
        if($order){
            return responseJson('1', 'success', [
                'Order'=>$order->load('blood_type','city','client'),
            ]);
        }else{
            return responseJson('0', 'No Such ID', $order);
        }

    }

    public function contact(Request $request){
        $validator = validator()->make($request->all(),[
            'name'          =>'required',
            'email'         =>'required|email',
            'phone_number'  =>'required',
            'titile_message'=>'required',
            'message'       => 'required',
        ]);
        if($validator->fails())
        {
            return responseJson('0', $validator->errors()->first(), $validator->errors());
        }
        $contact = Contact::create($request->all());
        $contact->save();
        return responseJson(1,'تم الارسال بنجاح', [
            'contact' => $contact,
            'client'   => $request->user()
        ]);
    }

    public function settings()
    {
        $setting = Setting::all();
        return responseJson(1, 'Show Settings', $setting);
    }

    public function postFavourite(Request $request)
    {
        $rules = [
                'post_id' => 'required|exists:posts,id',
        ];
        $validator = validator()->make($request->all(),$rules);
        
        if($validator->fails())
        {
            return responseJson('0', $validator->errors()->first(), $validator->errors());
        }
         $toggle  = $request->user()->posts()->toggle($request->post_id);

         return responseJson(1, 'Success ', $toggle);
    }

    public function myFavourite(Request $request)
    {
        $posts = $request->user()->posts()->latest()->paginate(20);
        return responseJson(1, 'Loaded...', $posts); 

    }


   
}
 