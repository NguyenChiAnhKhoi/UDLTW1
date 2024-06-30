<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Category; // import model Category
use App\Models\Brand; // import model Category

class ProductController extends Controller
{
    //
    public function index()
    {
        $categories = Category::where('status', '!=', 2)->pluck('name', 'id');
        $brands = Brand::where('status', '!=', 2)->pluck('name', 'id');
        $list = Product::where('status', '!=', 2)->orderBy('created_at', 'desc')->get();
        return view("backend.product.index", compact('categories','brands','list'));
    }


     /* them */
    public function store(StoreProductRequest $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->slug = Str::of($request->name)->slug('-');
        $product->brand_id = $request->brand_id;
        $product->category_id = $request->category_id;
        $product->detail = $request->detail;
        $product->description = $request->description;
        if($request->hasFile('image')){
            if(in_array($request->image->extension(), ["jpg", "png", "webp", "gif"])){
                $fileName = $product->slug . '.' . $request->image->extension();
                $request->image->move(public_path("images/products"), $fileName);
                $product->image = $fileName;
            }
        }
        $product->price = $request->price;
        $product->pricesale = $request->pricesale;
        $product->created_at = date('Y-m-d H:i:s');
        $product->created_by = Auth::id() ?? 1;
        $product->status = $request->status;
        $product->save();

        return redirect()->route('admin.product.index');
    }
    public function edit(string $id)
    {
        $product = Product::find($id);
        if($product == null)
        {
            session()->flash('error', 'Dữ liệu id của danh mục không tồn tại!');
            return view("backend.product.index");
        }
        $list = Product::where('product.status', '!=', 2)
            ->select('product.id', 'product.name', 'product.image', 'product.slug', 'product.description', 'product.price', 'product.pricesale')
            ->orderBy('product.created_at', 'desc')
            ->get();
            $categories  = Category::where('status', '!=', 2)
            ->select('category.id', 'category.name' )
            ->get();
            $brands  = Brand::where('status', '!=', 2)
            ->select('brand.id', 'brand.name' )
            ->get();
            // // ->pluck('name', 'id');

            $htmlcategories = "";
            foreach ($categories as $item) {
                if($product->category_id == $item->id){
                    $htmlcategories .= "<option selected value='" . $item->id . "'>" . $item->name . "</option>";
                }
                else{
                    $htmlcategories .= "<option value='" . $item->id . "'>" . $item->name . "</option>";
                }
            }


            $htmlbrands = "";
            foreach ($brands as $item) {
                if($product->brand_id == $item->id){
                    $htmlbrands .= "<option selected value='" . $item->id . "'>" . $item->name . "</option>";
                }
                else{
                    $htmlbrands .= "<option value='" . $item->id . "'>" . $item->name . "</option>";
                }
            }

        return view("backend.product.edit", compact("product","categories","brands","htmlcategories","htmlbrands"));
    }

    public function update(Request $request, string $id)
    {
        $product = Product::find($id);
        if($product==null){
            //chuyen trang va bao loi
        }
        $product->name = $request->name;
        $product->slug = Str::of($request->name)->slug('-');
        $product->brand_id = $request->brand_id;
        $product->category_id = $request->category_id;
        $product->detail = $request->detail;
        $product->description = $request->description;
        if($request->hasFile('image')){
            if(in_array($request->image->extension(), ["jpg", "png", "webp", "gif"])){
                $fileName = $product->slug . '.' . $request->image->extension();
                $request->image->move(public_path("images/products"), $fileName);
                $product->image = $fileName;
            }
        }
        $product->price = $request->price;
        $product->pricesale = $request->pricesale;
        $product->created_at = date('Y-m-d H:i:s');
        $product->created_by = Auth::id() ?? 1;
        $product->status = $request->status;
        $product->save();

        return redirect()->route('admin.product.index');
    }

    public function show(string $id)
    {
        $product = Product::find($id);
        if($product == null)
        {
            session()->flash('error', 'Dữ liệu id của danh mục không tồn tại!');
            return view("backend.product.index");
        }
        $list = Product::where('product.status', '!=', 2)
            ->select('product.id', 'product.name', 'product.image', 'product.slug', 'product.description', 'product.price', 'product.pricesale')
            ->orderBy('product.created_at', 'desc')
            ->get();
        $categories  = Category::where('status', '!=', 2)
                ->select('category.id', 'category.name' )
                ->get();
        $brands  = Brand::where('status', '!=', 2)
            ->select('brand.id', 'brand.name' )
            ->get();



        return view("backend.product.show", compact("product","categories","brands"));
    }

    public function delete(Request $request, string $id)
    {
        $product = Product::find($id);
        if($product==null){
            //chuyen trang va bao loi
        }

        $product->status = 2;
        $product->save();

        return redirect()->route('admin.product.index');
    }

    public function trash()
    {
        $categories = Category::where('status', '!=', 2)->pluck('name', 'id');
        $brands = Brand::where('status', '!=', 2)->pluck('name', 'id');
        $list = Product::where('status', '=', 2)->orderBy('created_at', 'desc')->get();
        return view("backend.product.trash", compact('categories','brands','list'));
    }

    public function restore(Request $request, string $id)
    {
        $product = Product::find($id);
        if($product==null){
            //chuyen trang va bao loi
        }

        $product->status = 0;
        $product->save();

        return redirect()->route('admin.product.trash');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.product.trash');
    }
    public function create()
    {
        $categories = Category::where('status', '!=', 2)->pluck('name', 'id');
        $brands = Brand::where('status', '!=', 2)->pluck('name', 'id');
        $list = Product::where('status', '!=', 2)->orderBy('created_at', 'desc')->get();
        return view("backend.product.create", compact('categories','brands','list'));
    }
}
