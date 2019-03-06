<?php 

namespace App\Http\Controllers\Admin;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Order;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller 
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $records = Order::orderBy('id','DESC')->paginate(10);
    return view('admin.orders.index',['title' => 'Order'],compact('records'));
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
    

  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    $order  = Order::findOrFail($id);
    return view('admin.orders.show',['title' => 'show Order'],compact('order'));

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
  public static function delete($id,$title=null){
        
    return view('admin.orders.delete',compact('id','title'))->render();

}
  public function destroy($id)
  {
    Order::findOrFail($id)->delete();
    session()->flash('success', ' Delete Record Success');
    return redirect(aurl('order'));
  }
  
}

?>