<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        $PageTitle = "All Products";
        $products = Product::orderBy('id', 'desc')->get();

        return view('admin.product.index', compact('products', 'PageTitle'));
    }


    public function draft()
    {

        $PageTitle = "All Draft Products";
        $products = Product::where('status', 'draft')->orderBy('id', 'desc')->get();

        return view('admin.product.index', compact('products', 'PageTitle'));
    }


    public function available()
    {

        $PageTitle = "All Available Categories";
        $products = Product::where('status', 'available')->orderBy('id', 'desc')->get();

        return view('admin.product.index', compact('products', 'PageTitle'));
    }


    public function unavailable()
    {

        $PageTitle = "All Unavailable  Products";
        $products = Product::where('status', 'unavailable')->orderBy('id', 'desc')->get();

        return view('admin.product.index', compact('products', 'PageTitle'));
    }


    function new () {

        $PageTitle = "All New Products";
        $products = Product::where('status', 'new')->orderBy('id', 'desc')->get();

        return view('admin.product.index', compact('products', 'PageTitle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['PageTitle'] = "Create Product";
        $data['categories'] = Category::all();

        return view('admin.product.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //--- Validation Section
        $rules = [
            'sku' => 'min:8|unique:products',
            'slug' => 'unique:products|regex:/^[a-zA-Z0-9\s-]+$/',
            'description' => 'required',
            'category_id' => 'required',
            'name' => 'required',
            'price' => 'required',
            'status' => 'required',
            'featured_image' => 'mimes:jpeg,jpg,png,svg',

        ];
        $customs = [
            'slug.unique' => 'This slug has already been taken.',
            'slug.regex' => 'Slug Must Not Have Any Special Characters.',
        ];
        $validator = Validator::make($request->all(), $rules, $customs);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)->withInput();
        }
        //--- Validation Section Ends

        $products = $request->except(['featured_image', 'product_image']);
        $product_image = $request['product_image'];
        $featured_image = $request['featured_image'];

        $products = Product::Create([
            'user_id' => auth()->user() ? auth()->user()->id : null,
            'category_id' => $request->category_id,
            'sku' => $request->sku,
            'subcategory_id' => $request->subcategory_id ? $request->subcategory_id : null,
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'weight' => $request->weight ? $request->weight : null,
            'status' => $request->status,
            'color' => $request->color ? $request->color : null,
            'size' => $request->size ? $request->size : null,
            'model' => $request->model ? $request->model : null,
            'brand' => $request->brand ? $request->brand : null,
        ]);

        // ADDING IMAGE TO MEDIA TABLE
        $products
            ->addMedia($featured_image)
            ->toMediaCollection('featured_product');

        foreach ($request->file('product_image', []) as $key => $file) {
            $products
                ->addMedia($file)
                ->toMediaCollection('products');

        }

        // dd( $request->file('product_image', []));
        //--- Redirect Section

        return redirect()->route('admin-prod-index')
            ->with('success', 'New Product Added Successfully.');
        //--- Redirect Section Ends
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $data['categories'] = Category::all();
        $product = Product::findOrFail($id);
        $data['product'] = $product;
        $data['PageTitle'] = "Edit " . $product->name;

        return view('admin.product.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //--- Validation Section
        $rules = [
            'sku' => 'min:8|unique:products,sku,' . $id,
            'slug' => 'unique:products,slug,' . $id . '|regex:/^[a-zA-Z0-9\s-]+$/',
            'description' => 'required',
            'category_id' => 'required',
            'name' => 'required',
            'price' => 'required',
            'status' => 'required',
            'featured_image' => 'mimes:jpeg,jpg,png,svg',

        ];
        $customs = [
            'slug.unique' => 'This slug has already been taken.',
            'slug.regex' => 'Slug Must Not Have Any Special Characters.',
        ];
        $validator = Validator::make($request->all(), $rules, $customs);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)->withInput();
        }
        //--- Validation Section Ends

        //--- Logic Section
        $product = Product::findOrFail($id);

        $product->category_id = $request->category_id;
        $product->sku = $request->sku;
        $product->subcategory_id = $request->subcategory_id;
        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->weight = $request->weight;
        $product->status = $request->status;
        $product->color = $request->color;
        $product->model = $request->model;
        $product->brand = $request->brand;

        $product->update();

        if ($request->featured_image != null) {
            //delete the existing image
            $product->clearMediaCollection('featured_product');
            //add the new image
            $product
                ->addMedia($request->featured_image)
                ->toMediaCollection('featured_product');
        }
        if ($request->product_image != null) {
            //delete the existing image
            $product->clearMediaCollection('products');
            //add the new image
            foreach ($request->file('product_image', []) as $key => $file) {
                $product
                    ->addMedia($file)
                    ->toMediaCollection('products');

            }
        }

        return redirect()->route('admin-prod-index')
            ->with('success', 'Product Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $product = Product::findOrFail($request->id);


       $product->clearMediaCollection('featured_product');
       $product->clearMediaCollection('products');
       $product->delete();
        //--- Redirect Section

        $msg = 'Product deleted Successfully !';
        return response()->json(array(
            'success' => true,
            'data'   => $msg
        ));

    }
}
