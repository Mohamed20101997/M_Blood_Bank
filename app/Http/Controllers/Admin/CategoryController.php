<?php 

namespace App\Http\Controllers\Admin;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\Validator;
class CategoryController extends Controller 
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $records = Category::orderBy('id','DESC')->paginate(10);
    return view('admin.Categories.index',['title' => 'Governorate'],compact('records'));
    
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
    $validated = $request->validate([
      'name'=>'required',
  ], [] ,[
      'name'=> 'Name Is Required',
  ]);

  Category::create($validated);
  session()->flash('success', ' Add Record Success');
  return redirect(aurl('category'));

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
    $category  = Category::find($id);
    return view('admin.categories.edit',['title' => 'Edit Category'],compact('category'));
    
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(Request $request, $id)
  {
      $validated = $request->validate([
        'name'=>'required',
    ], [] ,[
        'name'=> 'Name Is Required',
    ]);

    Category::where('id', $id)->update($validated);
    session()->flash('success', ' Update Record Success');
    return redirect(aurl('category'));
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public static function delete($id,$name=null){
        
    return view('admin.categories.delete',compact('id','name'))->render();

}
  public function destroy($id)
  {
    Category::find($id)->delete();
    session()->flash('success', ' Delete Record Success');
    return redirect(aurl('category'));
    
  }
  
}

?>