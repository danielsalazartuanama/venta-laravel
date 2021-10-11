<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Product;
use App\Provider;
use App\Subcategory;
use App\Tag;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as  PDF;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:products.create')->only(['create', 'store']);
        $this->middleware('can:products.index')->only(['index']);
        $this->middleware('can:products.edit')->only(['edit', 'update']);
        $this->middleware('can:products.show')->only(['show']);
        $this->middleware('can:products.destroy')->only(['destroy']);
    }
    public function index()
    {
        $products = Product::get();
        return view('admin.product.index', compact('products'));
    }
    public function create()
    {
        $categories = Category::get();
        $providers = Provider::get();
        $tags=Tag::all();
        return view('admin.product.create', compact('categories', 'providers','tags'));
    }
    public function store(StoreRequest $request, Product $product)
    {
     
        $product->my_story($request);
        return redirect()->route('products.index');
    }
    public function show(Product $product)
    {
        return view('admin.product.show', compact('product'));
    }
    public function edit(Product $product)
    {
        $categories = Category::get();
        $providers = Provider::get();
        $tags=Tag::all();
        return view('admin.product.edit', compact('product', 'categories', 'providers','tags'));
    }
    public function update(UpdateRequest $request, Product $product)
    {
        $product->my_update($request);    
        return redirect()->route('products.index');
    }
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }

    public function change_status(Product $product)
    {
        if ($product->status == 'ACTIVE') {
            $product->update(['status' => 'DEACTIVATED']);
            return redirect()->back();
        } else {
            $product->update(['status' => 'ACTIVE']);
            return redirect()->back();
        }
    }
    public function get_products_by_barcode(Request $request)
    {
        if ($request->ajax()) {
            $products = Product::where('code', $request->code)->firstOrFail();
            return response()->json($products);
        }
    }
    public function get_products_by_id(Request $request)
    {
        if ($request->ajax()) {
            $products = Product::findOrFail($request->product_id);
            return response()->json($products);
        }
    }
    public function print_barcode()
    {
        $products = Product::get();
        $pdf = PDF::loadView('admin.product.barcode', compact('products'));
        return $pdf->download('codigos_de_barras.pdf');
    }

    public function upload_image(Request $request,$id){
       
        $product = Product::findOrFail($id);
        if($request->hasFile('image')){
            $file=$request->file('image');
            $image_name = time().'_'.$file->getClientOriginalName();
            $file->move(public_path("/image"),$image_name);
            $urlimage='/image/'.$image_name;
            // dd($urlimage);
        }
        $product->images()->create([
            'url'=>$urlimage,
        ]);
        
    }
}
