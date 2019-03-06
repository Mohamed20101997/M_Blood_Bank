<?php 

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Blood_Type;
use App\Cities;
use App\Client;

class ClientController extends Controller 
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $records = Client::orderBy('id','DESC')->paginate(10);
    $bloodTypes = Blood_Type::pluck('name', 'id')->toArray();
    $cities = Cities::pluck('name', 'id')->toArray();
    return view('admin.clients.index',['title' => 'Clients'],compact('records','bloodTypes','cities'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {

  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
      echo 'ddddd';
   
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {

  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {

    
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(Request $request, $id)
  {


  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */

   
  public function active($id){
    
    Client::find($id);
    Client::where('id', $id)->update(['is_active'=>'1']);
    $Client = Client::pluck('is_active')->toArray();
    session()->flash('success', 'Active Success');
    return redirect(aurl('client'));

}
  public function deactive($id){

    Client::find($id);
    Client::where('id', $id)->update(['is_active'=>'0']);
    $Client = Client::pluck('is_active','name')->toArray();
    session()->flash('success', ' De-Active Success');
    return redirect(aurl('client'));

}

  public static function delete($id,$name=null){
        
    return view('admin.clients.delete',compact('id','name'))->render();

}
  public function destroy($id)
  {
    Client::findOrFail($id)->delete();
    session()->flash('success', ' Delete Record Success');
    return redirect(aurl('client'));
    
  }
  
}

?>