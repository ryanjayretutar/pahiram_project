<?php

namespace App\Http\Controllers\InventoryController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Brand;
use Illuminate\Support\Facades\Validator;
use Session;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();
        return view('inventory.brands.brands', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inventory.brands.create_brand');

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
           'brand_name' => 'required|string|max:50',
        ]);
           if ($validated->fails()) {
                Session::flash('error', $validated->messages()->first());
                return redirect()->back()->withInput();
           }
         $brand = new Brand;
         $brand->create(['brand_name' => $request->brand_name]);
         Session::flash('success','New Brand has been created');
         return redirect(route('brands.index'));
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
    public function edit(Brand $brand)
    {
        return view('inventory.brands.edit_brand', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        $validated = Validator::make($request->all(), [
           'brand_name' => 'required|string|max:50',
        ]);
           if ($validated->fails()) {
                Session::flash('error', $validated->messages()->first());
                return redirect()->back()->withInput();
           }
         $brand->update(['brand_name' => $request->brand_name]);
         Session::flash('success','Brand has been updated');
         return redirect(route('brands.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();
        Session::flash('success','Brand has been deleted');
        return redirect(route('brands.index'));
    }
}
