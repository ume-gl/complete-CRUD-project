<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $search=$request['search']??"";
        
        if($search != "")
            {
                $products = Product::where('title', '=', $search)->paginate(5)->with('categories');
            }    
            else{
                $products = Product::paginate(5);
            }
            $data=compact('products','search');
            
        return view('products.list')->with($data)->with('categories');
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data1 = Category::select('name','id')->get();
        return view('products.create',['data1'=> $data1]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
  
          
        ]);
        if($request->file('file')){
            $file= $request->file('file');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/Image'), $filename);
            $productmodel['file']= $filename;
                  
        }

        $productmodel = new Product;
        $productmodel->title = $request->title;
        $productmodel->description = $request->description;
        $productmodel->price = $request->price;
        $productmodel['file_path']= $filename;
        $productmodel->category_id= $request->category;
        $productmodel->save();
        return redirect(route('products.index'))->with('status', 'Product Added');
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

        $products = Product::find($id);
        $data1 = Category::select('name','id')->get();
        return view('products.edit',['products'=> $products, 'data1'=> $data1]);
     
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
        
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'category_id'=> 'required',
          
        ]); 
            // ensure the request has a file before we attempt anything else.
            // if($request->file('file')){
            //     $file= $request->file('file');
            //     $filename= date('YmdHi').$file->getClientOriginalName();
            //     $file-> move(public_path('public/Image'), $filename);
            //     $product['file']= $filename;
                      
            // }

        $product = Product::find($id);
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        // $product['file_path']= $filename;
        $product->save();
        return redirect(route('products.index'))->with('status', 'Product Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        Product::destroy($id);
        return redirect(route('products.index'))->with('status', 'Product Deleted');
    }
  
}
