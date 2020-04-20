<?php

namespace App\Http\Controllers;

use App\Category;
use App\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['PageTitle'] = "All Categories";
        $PageTitle = "All SubCategory";
        $subcategories = SubCategory::orderBy('id', 'desc')->get();

        return view('admin.subcategory.index', compact('subcategories', 'PageTitle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['PageTitle'] = "Create SubCategory";

        $data['categories'] = Category::all();
        return view('admin.subcategory.create', $data);
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
            'slug' => 'unique:sub_categories|regex:/^[a-zA-Z0-9\s-]+$/',
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

        //Logic

        $subcategory = SubCategory::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'slug' => Category::str_slug($request->slug),
            'description' => $request->description,
        ]);
// ADDING IMAGE TO MEDIA TABLE
        $subcategory
            ->addMedia($request->upload)
            ->toMediaCollection('subcategory');

        //--- Redirect Section

        return redirect()->route('admin-subcat-index')
            ->with('success', 'New SubCategory Added Successfully.');
        //--- Redirect Section Ends
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $subCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $data['PageTitle'] = "Create SubCategory";
        $data['category'] = Category::all();
        $data['subcategory'] = Subcategory::findOrFail($id);

        return view('admin.subcategory.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
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
        $subcategory = SubCategory::findOrFail($id);

        $subcategory->category_id = $request->category_id;
        $subcategory->name = $request->name;
        $subcategory->slug = $request->slug;
        $subcategory->description = $request->description;
        $subcategory->update();

        if ($request->upload != null) {
            $subcategory->clearMediaCollection('subcategory');
            $subcategory
                ->addMedia($request->upload)
                ->toMediaCollection('subcategory');
        }

        return redirect()->route('admin-subcat-index')
            ->with('success', 'SubCategory Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        $subcategory = SubCategory::findOrFail($request->id);
        $subcategory->clearMediaCollection('subcategory');
        $subcategory->delete();
        //--- Redirect Section

        $msg = 'SubCategory deleted Successfully !';
        return response()->json(array(
            'success' => true,
            'data' => $msg,
        ));

    }

    //*** GET Request
    public function load($id)
    {
    $data['cat'] = SubCategory::where('category_id',$id)->get();
        echo json_encode($data);
        //return view('product.subCat', compact('cat'));
    }

}
