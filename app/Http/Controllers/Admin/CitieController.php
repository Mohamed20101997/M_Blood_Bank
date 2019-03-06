<?php 

namespace App\Http\Controllers\Admin;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Cities;
use App\Governorate;
use DB;
class CitieController extends Controller 
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $records = Cities::orderBy('id','DESC')->paginate(10);
    $governorates = Governorate::pluck('name', 'id')->toArray();
    return view('admin.cities.index',['title' => 'Cities'],compact('records','governorates'));
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
          'governorate_id' => 'required',
      ], [] ,[
        'citie'=>'Citie is required',
      ]);
      Cities::create($validated);
      session()->flash('success', ' Add Record Success');
      return redirect(aurl('citie'));

    
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
    $citie= Cities::findOrFail($id);
    $governorates = Governorate::pluck('name', 'id')->toArray();
    return view('admin.cities.edit',['title' => 'Edit citie'],compact('citie','governorates'));
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
      'governorate_id' => 'required',
    ], [] ,[
      'citie'=>'Citie is required',
    ]);
      Cities::where('id', $id)->update($validated);
    session()->flash('success', ' Update Record Success');
    return redirect(aurl('citie'));
    
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public static function delete($id,$name=null){
        
    return view('admin.cities.delete',compact('id','name'))->render();

}
  public function destroy($id)
  {
    Cities::find($id)->delete();
    session()->flash('success', ' Delete Record Success');
    return redirect(aurl('citie'));
    
  }
}

?>