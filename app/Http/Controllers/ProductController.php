<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('category')->get();
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.product.add', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = Validator::make($request->all(),[
            'name' => 'required|max:255',
            'description' => 'required',
            'meta_title' => 'required|max:255',
            'meta_description' => 'required',
            'category_id'=>'required',
            'photo'=>'required',
            'attributes'=>'required'
        ]);
        if($validatedData->fails()){
            $request->session()->flash('error', json_decode($validatedData->errors()));
        }
        $request['photo']->store('/images/products');
        $file_name = Carbon::now()->timestamp . '_' . $request['photo']->getClientOriginalName();
        $request['photo']->move(public_path() . '/images/products', $file_name);
        $validatedData['photo'] = $file_name;
        $show = Product::create($validatedData);

        $request->session()->flash('success', 'Product is successfully saved');
        $request->session()->flash('message-type', 'success');

        return response()->json(['status'=>'Hooray']);
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
        $categories = Category::all();
        $product = Product::with('category')->where('id',$id)->first();
        return view('admin.product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = Validator::make($request->all(),[
            'name' => 'required|max:255',
            'description' => 'required',
            'meta_title' => 'required|max:255',
            'meta_description' => 'required',
            'category_id'=>'required',
            'photo'=>'required',
            'attributes'=>'required'
        ]);
        if($validatedData->fails()){
            $request->session()->flash('error', json_decode($validatedData->errors()));
        }
        $data = $request->all();
//        dd($validatedData['photo']);
//        dd(gettype($request['photo']));
        if(gettype($request['photo']) == 'string') {
            $data['photo'] = $request['photo'];
        } else {
            $request['photo']->store('/images/products');
            $file_name = Carbon::now()->timestamp . '_' . $request['photo']->getClientOriginalName();
            $request['photo']->move(public_path() . '/images/products', $file_name);
            $data['photo'] = $file_name;
        }
//

//        $show = Product::create($validatedData);
        Product::whereId($id)->update([
            'name' => $data['name'],
            'description' => $data['description'],
            'meta_title' => $data['meta_title'],
            'meta_description' => $data['meta_description'],
            'category_id'=> $data['category_id'],
            'photo'=> $data['photo'],
            'attributes'=> $data['attributes']
        ]);

        $request->session()->flash('success', 'Product Data is successfully updated');
        $request->session()->flash('message-type', 'success');

        return response()->json(['status'=>'Hooray']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
        return back();
    }
}
