<?php

namespace App\Http\Controllers\InventoryController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Category;
use Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('inventory.categories.all_category', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inventory.categories.add_category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $validated = Validator::make($request->all(), [
           'category_name' => 'required|string|max:50',
        ]);
           if ($validated->fails()) {
                Session::flash('error', $validated->messages()->first());
                return redirect()->back()->withInput();
           }
         $category = new Category;
         $category->create(['category_name' => $request->category_name]);
         Session::flash('success','New Category has been created');
         return redirect(route('categories.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('inventory.categories.edit_category', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $validated = Validator::make($request->all(), [
           'category_name' => 'required|string|max:50',
        ]);
           if ($validated->fails()) {
                Session::flash('error', $validated->messages()->first());
                return redirect()->back()->withInput();
           }
         $category->update(['category_name' => $request->category_name]);
         Session::flash('success','Category has been updated');
         return redirect(route('categories.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
         * @return \Illuminate\Http\Response
         */
    public function destroy(Category $category)
    {
        $category->delete();
        Session::flash('success','Category has been deleted');
        return redirect(route('categories.index'));
    }
}
