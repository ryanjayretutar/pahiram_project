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

         if($request->get('image_path'))
         {
          $image = $request->get('image_path');
          $name = time().'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
          \Image::make($request->get('image_path'))->save(public_path('images/').$name);
         }

         $item = new Item;

         $date = ['added_date' => date('Y-m-d H:i:s')];
         $user_id = ['user_id' => 1];
         $img = ['image_path' => $name];
         $new = array_merge($validated, $date);
         $new_item = array_merge($new, $user_id);
         $item_detail = array_merge($details, $img);
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
    public function edit($id)
    {
        // $categories = Category::all();
        $item = Item::where('id', $id)->with('category', 'brand')->first();

        // $item_cb = collect(["category" => $item->category->category_name, "brand" => $item->brand->brand_name]);


        // return view('inventory.items.edit_item', compact('categories', 'brands', 'item'));
        $category = Category::all();
        $brand = Brand::all();
        $collection = collect(["categories" => $category, "brands" => $brand , "item" => $item]);
        return new PostCollection($collection);
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