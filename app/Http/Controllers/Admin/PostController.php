<?php 

namespace App\Http\Controllers\Admin;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Post;
use App\Category;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller 
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $records = Post::orderBy('id','DESC')->paginate(10);
    $category = Category::pluck('name','id')->toArray();
    return view('admin.Posts.index',['title' => 'Posts'],compact('records','category'));
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
      'title'=>'required',
      'image'=>'required|image|mimes:jpg,jpeg,png',
      'category_id'=>'required',
      'content'=>'required',
  ], [] ,[
    'title'=>'Post Title',
    'photo'=>'Photo',
    'category_id'=>'Post Category',
    'content'=>'Content For Post',
  ]);

    $validated['image'] = $request->image->store('images');
    Post::create($validated);
    session()->flash('success', ' Add Record Success');
    return redirect(aurl('post'));

  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    $post  = Post::findOrFail($id);
    return view('admin.posts.show',['title' => 'show post'],compact('post'));

  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    $post  = Post::findOrFail($id);
    $category = Category::pluck('name','id')->toArray();
    return view('admin.posts.edit',['title' => 'Edit Post'],compact('post','category'));
    
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
      'title'=>'required',
      'category_id'=>'required',
      'content'=>'required',
  ], [] ,[
    'title'=>'Post Title',
    'category_id'=>'Post Category',
    'content'=>'Content For Post',
  ]);
  
  $image = Post::find($id);
  
  if($request->hasFile('image'))
  {
      Storage::delete($image->image);
      $validated['image'] = $request->image->store('images');
  }
    Post::where('id', $id)->update($validated);
    session()->flash('success', ' Add Record Success');
    return redirect(aurl('post'));

  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public static function delete($id,$title=null){
        
    return view('admin.Posts.delete',compact('id','title'))->render();

}
  public function destroy($id)
  {
    $image = \DB::table('posts')->where('id', $id)->first();
    Storage::delete($image->image);
    Post::findOrFail($id)->delete();
    session()->flash('success', ' Delete Record Success');
    return redirect(aurl('post'));
  }
  
}

?>