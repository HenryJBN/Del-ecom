<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $PageTitle  = "All Categories";
        $categories = Category::orderBy('id', 'desc')->get();

        return view('admin.category.index', compact('categories', 'PageTitle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['PageTitle'] = "Create Category";

        return view('admin.category.create', $data);
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
            'name' => 'required',
            'description' => 'required',
            'upload' => 'mimes:jpeg,jpg,png,svg',
            'slug' => 'unique:categories|regex:/^[a-zA-Z0-9\s-]+$/',
        ];
        $customs = [
            'upload.mimes' => 'Icon Type is Invalid.',
            'slug.unique' => 'This slug has already been taken.',
            'slug.regex' => 'Slug Must Not Have Any Special Characters.',
        ];
        $validator = Validator::make($request->all(), $rules, $customs);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)->withInput();
        }
        //--- Validation Section Ends

        //Logic

        $category = Category::create([
            'name' => $request->name,
            'slug' => Category::str_slug($request->name),
            'description' => $request->description,
        ]);
// ADDING IMAGE TO MEDIA TABLE
        $category
            ->addMedia($request->upload)
            ->toMediaCollection('category');

        return redirect()->route('admin-cat-index')
            ->with('success', 'New Category Added Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['category'] = Category::findOrFail($id);
        $data['PageTitle'] = 'Edit ' . $data['category']->name;
        return view('admin.category.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request['upload']);
        //--- Validation Section
        $rules = [
            'name' => 'required',
            'slug' => 'unique:categories,slug,' . $id . '|regex:/^[a-zA-Z0-9\s-]+$/',
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
        $category = Category::findOrFail($id);

        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->description = $request->description;
        $category->update();


             if ($request->upload != null) {
                $category->clearMediaCollection('category');
                $category
                ->addMedia($request->upload)
                ->toMediaCollection('category');
             }

        return redirect()->route('admin-cat-index')
            ->with('success', 'Category Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $category = Category::findOrFail($request->id);
        if($category->subCategories->count()>0)
        {
        //--- Redirect Section
        $msg = 'Remove the subcategories first !';
        return response()->json(array(
            'success' => false,
            'data'   => $msg
        ));

        //--- Redirect Section Ends
        }


       $category->clearMediaCollection('category');
       $category->delete();
        //--- Redirect Section

        $msg = 'Category deleted Successfully !';
        return response()->json(array(
            'success' => true,
            'data'   => $msg
        ));

    }
}
