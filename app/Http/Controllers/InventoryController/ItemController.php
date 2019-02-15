<?php

namespace App\Http\Controllers\InventoryController;

use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ItemDetailRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\PostCollection;
use App\Category;
use App\Brand;
use App\Item;
use Session;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $items = Item::all();
        $response = Item::with('category', 'brand')->get();
        // $response['categories'] = $items->category;
        // return view('inventory.items.all_items', compact('items'));
        return new PostCollection($response);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $categories = Category::all();
        // $brands = Brand::all();
        // return view('inventory.items.items', compact('categories', 'brands'));
        $category = Category::all();
        $brand = Brand::all();

        // $category = (array) $category;
        // $brand = (array) $brand;
        // $category = collect(array("category" => $category));
        // $brand = collect(array("brand" => $brand));
        // $response = $category->merge($brand);
        // // dd($response);

        $collection = collect(["categories" => $category, "brands" => $brand ]);
        return new PostCollection($collection);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductStoreRequest $request, ItemDetailRequest $detail)
    {
         $val = array_merge( $request->validated(), $detail->validated());
         $validated = $request->validated();
         $details = $detail->validated();

         // echo dd($validated);
         $item = new Item;

         $date = ['added_date' => date('Y-m-d H:i:s')];
         $user_id = ['user_id' => 1];
         $new_item = array_merge($validated, $date);
         $item_detail = array_merge($details, $user_id);
         $image = $request->file('image_path');
        $image_name = time() . "." .$image->getClientOriginalExtension();
        $destination = "images/";
        $image->move($destination, $image_name);

         $new_item['image_path'] = $destination.$image_name;
         $item->create($new_item)->itemDetail()->create($item_detail);;
         Session::flash('success','New Item has been created');
         return response()->json('successfully added');
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
    public function edit(Item $item)
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('inventory.items.edit_item', compact('categories', 'brands', 'item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductStoreRequest $request, Item $item)
    {

        $validated = $request->validated();
         $item->update($validated);
         Session::flash('success','Item has been updated');
         return redirect(route('items.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $item->delete();
        Session::flash('success','Item has been deleted');
        return redirect(route('items.index'));
    }

     public function filter(ProductStoreRequest $request)
    {
        
        $item->delete();
        Session::flash('success','Item has been deleted');
        return redirect(route('items.index'));
    }

}