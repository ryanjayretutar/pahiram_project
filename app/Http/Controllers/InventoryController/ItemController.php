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
use Auth;
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
        // $response['categories'] = $items->category;
        // return view('inventory.items.all_items', compact('items'));

        /*Fetch data from Items table with category, brand and itemDetail relationship*/
        $response = Item::with('category', 'brand', 'itemDetail')->get();
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

         if($detail->get('image_path'))
         {
          $image = $detail->get('image_path');
          $name = time().'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
          \Image::make($request->get('image_path'))->save(public_path('images/').$name);
         }

         $item = new Item;

         $date = ['added_date' => date('Y-m-d H:i:s')];
         $user_id = ['user_id' => Auth::id()];
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
        $item = Item::where('id', $id)->with('category', 'brand', 'itemDetail','user')->first();
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
    public function update(ProductStoreRequest $request,ItemDetailRequest $detail, Item $item)
    { 
         $validated = $request->validated();
         $details = $detail->validated();

         if($detail->get('image_path') && ($detail->get('image_path')))
         {
          $image = $detail->get('image_path');
          $name = time().'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
          \Image::make($detail->get('image_path'))->save(public_path('images/').$name);
         }
         else{
             $name = $detail->get('image_path');
         }
         $img = ['image_path' => $name];
         $item_detail = array_merge($details, $img);
         $item->update($validated);
         $item->itemDetail()->update($item_detail);;
         Session::flash('success','Item has been updated');
         return response()->json('Successfully Updated');
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

    public function search($search){

        $items =  Item::where('product_name', 'like','%' .  $search . '%')->with('category', 'brand', 'itemDetail')->get();
        return new PostCollection($items);
    }

}