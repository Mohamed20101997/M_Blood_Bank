<?php 

namespace App\Http\Controllers\Admin;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Setting;
use Illuminate\Support\Facades\Validator;

class SettingsController extends Controller 
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $records = Setting::orderBy('id','DESC')->paginate(10);
    return view('admin.settings.index',['title' => 'settings'],compact('records'));
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
  

  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    $setting= Setting::findOrFail($id);
    return view('admin.settings.edit',['title' => 'settings edit'],compact('setting'));
    
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
      'about'=>'required',
      'phone_number' => 'required',
      'email' => 'required|email',
    ], [] ,[
      'about'=>'About Application',
      'phone_number' => 'Phone Number',
      'email' => 'Email',
    ]);

    Setting::where('id', $id)->update($validated);
    session()->flash('success', ' Update Record Success');
    return redirect(aurl('setting'));

  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */

  public function destroy($id)
  {
  
  }
  
}

?>