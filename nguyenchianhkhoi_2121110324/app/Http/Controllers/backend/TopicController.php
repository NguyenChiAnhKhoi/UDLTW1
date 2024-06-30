<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Topic;
use App\Http\Requests\StoreTopicRequest;


class TopicController extends Controller
{
  /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list=Topic::where('status','!=',2)->orderBy('created_at','desc')->get();
        $htmlparentid="";
        $htmlsortorder="";
        foreach($list as $item){
            $htmlparentid .="<option value='".$item->id."'>".$item->name."</option>";
            $htmlsortorder .="<option value='".($item->sort_order+1)."'>Sau ".$item->name."</option>";
        }
        return view("backend.topic.index",compact("list","htmlparentid","htmlsortorder"));
    }


    public function store(StoreTopicRequest $request)
    {
        $topic = new Topic();
        $topic -> name=$request->name;
        $topic->slug = Str::of($request->name)->slug('-');
        $topic -> sort_order = $request->sort_order;
        $topic -> description = $request->description;
        $topic -> created_at = date('Y-m-d H:i:s');
        $topic -> created_by = Auth::id()??1;
        $topic -> status =$request -> status;
        $topic -> save();
        return redirect()->route('admin.topic.index');
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $topic = Topic::find($id);
        if($topic == null)
        {
            session()->flash('error', 'Dữ liệu id của danh mục không tồn tại!');
            return view("backend.topic.index");
        }
        $list = Topic::where('topic.status', '!=', 2)
            ->select('topic.id', 'topic.name', 'topic.slug', 'topic.description')
            ->orderBy('topic.created_at', 'desc')
            ->get();
        $htmlsortorder = "";
            foreach ($list as $item) {
                if($topic->sort_order-1 == $item->sort_order){
                    $htmlsortorder .= "<option selected value='" . ($item->sort_order + 1) . "'>Sau " . $item->name . "</option>";
                }
                else{
                    $htmlsortorder .= "<option value='" . ($item->sort_order + 1) . "'>Sau " . $item->name . "</option>";
                }
            }
        return view("backend.topic.edit", compact("topic", "htmlsortorder"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $topic = Topic::find($id);
        if($topic==null){
            session()->flash('error', 'Dữ liệu id của topic không tồn tại!');
            return view("backend.topic.index");
        }
        $topic -> name=$request->name;
        $topic->slug = Str::of($request->name)->slug('-');
        $topic -> sort_order = $request->sort_order;
        $topic -> description = $request->description;
        $topic -> created_at = date('Y-m-d H:i:s');
        $topic -> created_by = Auth::id()??1;
        $topic -> status =$request -> status;
        $topic->save();
        $request->session()->flash('success', 'sửa thành công.');
        return redirect()->route('admin.topic.index');
    }


    public function show(string $id)
    {
        $topic = Topic::find($id);
        if($topic == null)
        {
            session()->flash('error', 'Dữ liệu id của danh mục không tồn tại!');
            return view("backend.topic.index");
        }
        $list = Topic::where('topic.status', '!=', 2)
            ->select('topic.id', 'topic.name', 'topic.slug', 'topic.description')
            ->orderBy('topic.created_at', 'desc')
            ->get();



        return view("backend.topic.show", compact("topic","list"));
    }

    public function delete(Request $request, string $id)
    {
        $topic = Topic::find($id);
        if($topic==null){
            //chuyen trang va bao loi
        }

        $topic->status = 2;
        $topic->save();

        return redirect()->route('admin.topic.index');
    }
    public function trash()
    {
        $list = Topic::where('status', '=', 2)->orderBy('created_at', 'desc')->get();
        return view("backend.topic.trash", compact('list'));
    }
    public function restore(Request $request, string $id)
    {
        $topic = Topic::find($id);
        if($topic==null){
            //chuyen trang va bao loi
        }

        $topic->status = 0;
        $topic->save();

        return redirect()->route('admin.topic.trash');
    }

    public function destroy($id)
    {
        $topic = Topic::findOrFail($id);
        $topic->delete();

        return redirect()->route('admin.topic.trash');
    }

    public function create()
    {
        $list=Topic::where('status','!=',2)->orderBy('created_at','desc')->get();
        $htmlparentid="";
        $htmlsortorder="";
        foreach($list as $item){
            $htmlparentid .="<option value='".$item->id."'>".$item->name."</option>";
            $htmlsortorder .="<option value='".($item->sort_order+1)."'>Sau ".$item->name."</option>";
        }
        return view("backend.topic.create",compact("list","htmlparentid","htmlsortorder"));
    }

}
