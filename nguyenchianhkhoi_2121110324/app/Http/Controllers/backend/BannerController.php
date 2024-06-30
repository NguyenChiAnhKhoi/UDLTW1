<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreBannerRequest;

class BannerController extends Controller
{
    public function index()
    {
        $list = Banner::where('banner.status','!=',2)->orderBy('created_at','DESC')->get();
        return view("backend.banner.index",compact("list"));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBannerRequest $request)
    {
        $banner = new Banner();
        $banner->name = $request->name;
        $banner->link = $request->link;
        $banner->position=$request->position;
        $banner->description =$request->description;
        $banner->created_by =Auth::id()??1; //Cái này là nếu có id của người tạo thì nó lấy id còn không có thì để mặc định là 1
        $banner->status = $request->status;
        $banner->created_at =date('Y-m-d H:i:s');

        if($request->hasFile('image')){
            if(in_array($request->image->extension(), ["jpg", "png", "webp", "gif"])){
                $currentDateTime = now()->format('YmdHis');
                $fileName = $currentDateTime . '.' . $request->image->extension();
                $request->image->move(public_path("images/banner"), $fileName);
                $banner->image = $fileName;
            }
        }

        $banner->save();
        return redirect()->route('admin.banner.index');
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $banner = Banner::find($id);
        if($banner == null)
        {
            session()->flash('error', 'Dữ liệu id của danh mục không tồn tại!');
            return view("backend.banner.index");
        }
        $list = Banner::where('banner.status', '!=', 0)
            ->select('banner.id', 'banner.name', 'banner.image', 'banner.position')
            ->orderBy('banner.created_at', 'desc')
            ->get();

        $htmlposittion = "";
        foreach ($list as $item) {
            $itemPosition = intval($item->position);
            if (intval($banner->position) - 1 == $itemPosition) {
                $htmlposittion .= "<option selected value='" . ($itemPosition + 1) . "'>Sau " . $item->name . "</option>";
            } else {
                $htmlposittion .= "<option value='" . ($itemPosition + 1) . "'>Sau " . $item->name . "</option>";
            }
        }

        return view("backend.banner.edit", compact("banner",  "htmlposittion"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $banner = Banner::find($id);
        if($banner==null){
            //chuyen trang va bao loi
        }
        $banner->name = $request->name;
        $banner->link = $request->link;
        $banner->position=$request->position;
        $banner->description =$request->description;
        $banner->created_by =Auth::id()??1; //Cái này là nếu có id của người tạo thì nó lấy id còn không có thì để mặc định là 1
        $banner->status = $request->status;
        $banner->created_at =date('Y-m-d H:i:s');
        if($request->hasFile('image')){
            if(in_array($request->image->extension(), ["jpg", "png", "webp", "gif"])){
                $currentDateTime = now()->format('YmdHis');
                $fileName = $currentDateTime . '.' . $request->image->extension();
                $request->image->move(public_path("images/banner"), $fileName);
                $banner->image = $fileName;
            }
        }
        $banner->save();
        return redirect()->route('admin.banner.index');
    }


    public function show(string $id)
    {
        $banner = Banner::find($id);
        if($banner == null)
        {
            session()->flash('error', 'Dữ liệu id của danh mục không tồn tại!');
            return view("backend.banner.index");
        }
        $list = Banner::where('banner.status', '!=', 2)
            ->select('banner.id', 'banner.name', 'banner.image', 'banner.description', 'banner.position')
            ->orderBy('banner.created_at', 'desc')
            ->get();



        return view("backend.banner.show", compact("banner","list"));
    }

    public function delete(Request $request, string $id)
    {
        $banner = Banner::find($id);
        if($banner==null){
            //chuyen trang va bao loi
        }

        $banner->status = 2;
        $banner->save();

        return redirect()->route('admin.banner.index');
    }
    public function trash()
    {
        $list = Banner::where('status', '=', 2)->orderBy('created_at', 'desc')->get();
        return view("backend.banner.trash", compact('list'));
    }
    public function restore(Request $request, string $id)
    {
        $banner = Banner::find($id);
        if($banner==null){
            //chuyen trang va bao loi
        }

        $banner->status = 0;
        $banner->save();

        return redirect()->route('admin.banner.trash');
    }

    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);
        $banner->delete();

        return redirect()->route('admin.banner.trash');
    }
    public function create()
    {
        return view("backend.banner.create");
    }

}
