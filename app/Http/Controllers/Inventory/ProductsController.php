<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends Controller
{   
    /**
      * Display a listing of the resource.
      *
      * @return \Illuminate\Http\Response
    */
    function __construct()
    {
      
      $this->middleware('permission:product-list|product-create|product-edit|
      product-delete|product-print|product-import|product-export', ['only' => ['index','store']]);
      $this->middleware('permission:product-create', ['only' => ['create','store']]);
      $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
      $this->middleware('permission:product-delete', ['only' => ['destroy']]);
      $this->middleware('permission:product-print', ['only' => ['print']]);
      $this->middleware('permission:product-export', ['only' => ['export']]);
      $this->middleware('permission:product-import', ['only' => ['import']]);
      
    }
 
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $data = Product::when($request->search,function($query) use ($request){
             $query->where('name','LIKE',
             "%{$request->search}%");
         })->orderBy('created_at','DESC')->paginate(5);
         
         $data->appends($request->only('search'));
         
         return view('products.index',compact('data'))
         ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
       $delete = Product::find($id)->delete();
       return redirect()->route('products.index')
        ->with('success','Product deleted successfully');
    }
}
