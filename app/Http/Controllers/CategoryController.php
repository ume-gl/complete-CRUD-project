<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;

class CategoryController extends Controller
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
                $categories = Category::where('name', '=', $search)->paginate(5);
            }    
            else{
                $categories = Category::paginate(5);
            }
            $data=compact('categories','search');
            
        return view('categories.list')->with($data);
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
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
            'name' => 'required',
            'description' => 'required',
        ]);
    
    
        $categories = new Category;
        $categories->name = $request->input('name');
        $categories->description = $request->input('description');
        $categories->save();
        return redirect(route('categories.index'))->with('status', 'Category Added');
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
        $categories = Category::find($id);
        return view('categories.edit'  , ['categories'=>$categories ]);
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
            'name' => 'required',
            'description' => 'required',
        
          
        ]);
    
        $categories = Category::find($id);
        $categories->name = $request->input('name');
        $categories->description = $request->input('description');
        $categories->update();
        return redirect(route('categories.index'))->with('status', 'Category Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categorie = Category::find($id); 
        $categorie->delete(); 
        return redirect()->back()->with('status', 'Category Deleted');
    }
   
}
