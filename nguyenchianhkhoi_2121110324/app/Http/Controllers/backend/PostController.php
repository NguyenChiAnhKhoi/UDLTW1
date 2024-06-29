<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Topic;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    //
    public function index()
    {
        $list = Post::where('status', '!=', 2)->orderBy('created_at', 'desc')->get();
        $topics = Topic::where('status', '!=', 2)->pluck('name', 'id');
        return view("backend.post.index", compact('list','topics'));
    }

    public function store(StorePostRequest $request){
        $post = new Post();
        $post->topic_id = $request->topic_id; //form
        $post->title = $request->title; //form
        $post->slug = Str::of($request->title)->slug('-');
        $post->detail = $request->detail; //form
        if($request->hasFile('image')){
            if(in_array($request->image->extension(), ["jpg", "png", "webp", "gif"])){
                $fileName = $post->slug . '.' . $request->image->extension();
                $request->image->move(public_path("images/posts"), $fileName);
                $post->image = $fileName;
            }
        }
        $post->type = $request->type; //form
        $post->description = $request->description; //form
        $post->created_at = date('Y-m-d H:i:s');
        $post->created_by = 1;
        $post->status = $request->status; //form
        $post->save(); //Luuu vao CSDL
        return redirect()->route('admin.post.index');
    }

    public function edit(string $id)
    {
        $post = Post::find($id);
        if($post == null)
        {
            session()->flash('error', 'Dữ liệu id của danh mục không tồn tại!');
            return view("backend.post.index");
        }
        $list = Post::where('post.status', '!=', 2)
            ->select('post.id', 'post.title', 'post.image', 'post.slug')
            ->orderBy('post.created_at', 'desc')
            ->get();
            $topics = Topic::where('status', '!=', 2)
            ->select('topic.id', 'topic.name' )
            ->get();
            // ->pluck('name', 'id');
            $htmltopics = "";
            foreach ($topics as $item) {
                if($post->topic_id == $item->id){
                    $htmltopics .= "<option selected value='" . $item->id . "'>" . $item->name . "</option>";
                }
                else{
                    $htmltopics .= "<option value='" . $item->id . "'>" . $item->name . "</option>";
                }
            }

        $htmlparentId = "";
        $htmlsortOrder = "";
        foreach ($list as $item) {
            if($post->parent_id == $item->id){
                $htmlparentId .= "<option selected value='" . $item->id . "'>" . $item->name . "</option>";
            }
            else{
                $htmlparentId .= "<option value='" . $item->id . "'>" . $item->name . "</option>";
            }

            if($post->sort_order-1 == $item->sort_order){
                $htmlsortOrder .= "<option selected value='" . ($item->sort_order + 1) . "'>Sau " . $item->name . "</option>";
            }
            else{
                $htmlsortOrder .= "<option value='" . ($item->sort_order + 1) . "'>Sau " . $item->name . "</option>";
            }
        }
        return view("backend.post.edit", compact("post", "htmlparentId", "htmlsortOrder","topics","htmltopics"));
    }

    public function update(Request $request, string $id)
    {
        $post = Post::find($id);
        if($post==null){
            //chuyen trang va bao loi
        }
        $post->topic_id = $request->topic_id; //form
        $post->title = $request->title; //form
        $post->slug = Str::of($request->title)->slug('-');
        $post->detail = $request->detail; //form
        if($request->hasFile('image')){
            if(in_array($request->image->extension(), ["jpg", "png", "webp", "gif"])){
                $fileName = $post->slug . '.' . $request->image->extension();
                $request->image->move(public_path("images/posts"), $fileName);
                $post->image = $fileName;
            }
        }
        $post->type = $request->type; //form
        $post->description = $request->description; //form
        $post->created_at = date('Y-m-d H:i:s');
        $post->created_by = 1;
        $post->status = $request->status; //form
        $post->save(); //Luuu vao CSDL
        return redirect()->route('admin.post.index');
    }

    public function show(string $id)
    {
        $post = Post::find($id);
        if($post == null)
        {
            session()->flash('error', 'Dữ liệu id của danh mục không tồn tại!');
            return view("backend.post.index");
        }
        $list = Post::where('post.status', '!=', 2)
            ->select('post.id', 'post.title', 'post.image', 'post.slug', 'post.description')
            ->orderBy('post.created_at', 'desc')
            ->get();
        $topic  = Topic::where('status', '!=', 2)
                ->select('topic.id', 'topic.name' )
                ->get();


        return view("backend.post.show", compact("post","topic"));
    }

    public function delete(Request $request, string $id)
    {
        $post = Post::find($id);
        if($post==null){
            //chuyen trang va bao loi
        }

        $post->status = 2;
        $post->save();

        return redirect()->route('admin.post.index');
    }

    public function trash()
    {
        $topics = Topic::where('status', '!=', 2)->pluck('name', 'id');
        $list = Post::where('status', '=', 2)->orderBy('created_at', 'desc')->get();
        return view("backend.post.trash", compact('topics','list'));
    }

    public function restore(Request $request, string $id)
    {
        $post = Post::find($id);
        if($post==null){
            //chuyen trang va bao loi
        }

        $post->status = 0;
        $post->save();

        return redirect()->route('admin.post.trash');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('admin.post.trash');
    }
}
