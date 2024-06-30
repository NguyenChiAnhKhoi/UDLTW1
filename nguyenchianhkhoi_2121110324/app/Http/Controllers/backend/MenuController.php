<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreMenuRequest;

class MenuController extends Controller
{
    public function index()
    {
        $list = Menu::where('status', '!=', 2)->orderBy('created_at', 'desc')->get();
        $htmlparentId = "";
        $htmlsortOrder = "";
        foreach($list as $item)
        {
            $htmlparentId .= "<option value='".$item->id."'>".$item->name."</option>";
            $htmlsortOrder .="<option value='" . $item->sort_order +1 . "'>" . $item->name . "</option>";
        }
        return view("backend.menu.index", compact('list','htmlparentId','htmlsortOrder'));
    }

    //Store
    public function store(StoreMenuRequest $request)
{
    $menu = new Menu();
    $menu->name = $request->name;
    $menu->link = $request->link;
    $menu->sort_order = $request->sort_order;
    $menu->parent_id = $request->parent_id;
    $menu->type = $request->type;
    $menu->position = $request->position;
    $menu->table_id = $request->table_id;
    $menu->created_at = date('Y-m-d H:i:s');
    $menu->updated_at = date('Y-m-d H:i:s');
    $menu->created_by = Auth::id() ?? 1;
    $menu->updated_by = Auth::id() ?? 1;
    $menu->status = $request->status;
    $menu->save();

    return redirect()->route('admin.menu.index');
}

public function edit(string $id)
    {
        $menu = Menu::find($id);
        if($menu == null)
        {
            session()->flash('error', 'Dữ liệu id của danh mục không tồn tại!');
            return view("backend.menu.index");
        }
        $list = Menu::where('menu.status', '!=', 2)
            ->select('menu.id', 'menu.name', 'menu.sort_order', 'menu.position', 'menu.link', 'menu.type')
            ->orderBy('menu.created_at', 'desc')
            ->get();
            $htmlparentId = "";
            $htmlsortOrder = "";
            foreach ($list as $item) {
                if($menu->parent_id == $item->id){
                    $htmlparentId .= "<option selected value='" . $item->id . "'>" . $item->name . "</option>";
                }
                else{
                    $htmlparentId .= "<option value='" . $item->id . "'>" . $item->name . "</option>";
                }

                if($menu->sort_order-1 == $item->sort_order){
                    $htmlsortOrder .= "<option selected value='" . ($item->sort_order + 1) . "'>Sau " . $item->name . "</option>";
                }
                else{
                    $htmlsortOrder .= "<option value='" . ($item->sort_order + 1) . "'>Sau " . $item->name . "</option>";
                }
            }
            return view("backend.menu.edit", compact("menu", "htmlparentId", "htmlsortOrder"));
    }

    public function update(Request $request, string $id)
    {
        $menu = Menu::find($id);
        if($menu==null){
            //chuyen trang va bao loi
        }
    $menu->name = $request->name;
    $menu->link = $request->link;
    $menu->sort_order = $request->sort_order;
    $menu->parent_id = $request->parent_id;
    $menu->type = $request->type;
    $menu->position = $request->position;
    $menu->table_id = $request->table_id;
    $menu->created_at = date('Y-m-d H:i:s');
    $menu->updated_at = date('Y-m-d H:i:s');
    $menu->created_by = Auth::id() ?? 1;
    $menu->updated_by = Auth::id() ?? 1;
    $menu->status = $request->status;
    $menu->save();

    return redirect()->route('admin.menu.index');
    }

    public function show(string $id)
    {
        $menu = Menu::find($id);
        if($menu == null)
        {
            session()->flash('error', 'Dữ liệu id của danh mục không tồn tại!');
            return view("backend.menu.index");
        }
        $list = Menu::where('menu.status', '!=', 2)
            ->select('menu.id', 'menu.name', 'menu.link', 'menu.position', 'menu.table_id')
            ->orderBy('menu.created_at', 'desc')
            ->get();
        $menus  = Menu::where('status', '!=', 2)
                ->select('menu.id', 'menu.name' )
                ->get();



        return view("backend.menu.show", compact("menu","menus"));
    }

    public function delete(Request $request, string $id)
    {
        $menu = Menu::find($id);
        if($menu==null){
            //chuyen trang va bao loi
        }

        $menu->status = 2;
        $menu->save();

        return redirect()->route('admin.menu.index');
    }
    public function trash()
    {
        $list = Menu::where('status', '=', 2)->orderBy('created_at', 'desc')->get();
        return view("backend.menu.trash", compact('list'));
    }
    public function restore(Request $request, string $id)
    {
        $menu = Menu::find($id);
        if($menu==null){
            //chuyen trang va bao loi
        }

        $menu->status = 0;
        $menu->save();

        return redirect()->route('admin.menu.trash');
    }

    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();

        return redirect()->route('admin.menu.trash');
    }
    public function create()
    {
        $list = Menu::where('menu.status','!=',2)->orderBy('created_at','DESC')->get();
        $htmlparentId = "";
        $htmlsortOrder = "";
        foreach($list as $item)
        {
            $htmlparentId .= "<option value='".$item->id."'>".$item->name."</option>";
            $htmlsortOrder .="<option value='" . $item->sort_order +1 . "'>" . $item->name . "</option>";
        }
        return view("backend.menu.create", compact('list','htmlparentId','htmlsortOrder'));
    }
}
