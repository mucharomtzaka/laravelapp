<?php

namespace App\Http\Controllers\Api;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
      return Product::query()->orderBy('id','DESC')->paginate(10);
    }
    
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation Request
        
        $validate = \Validator::make($request->all(), [
              'name'=>'required',
              'price'=> 'required'
             ]);
             
        if($validate->fails()){
          $respon = [
                'status' => 'error',
                'msg' => 'Validator error',
                'errors' => $validate->errors(),
                'content' => null,
            ];
          return response()->json($respon, 200);
        }
        
         //input form store 
         $input = [
             'name' => $request['name'],
             'price'=> $request['price'],
             'description' => $request['description'],
             'slug' => Str::slug($request['name'])
          ];
          
          //check exits
          $check = Product::where('name',$input['name'])->first();
          if($check != null){
            $respon = [
                'status' => 'error',
                'msg' => $request['name'].' product is input Exist',
                'errors' => $check
            ];
          }else{
         //store data
            $store = Product::create($input);
            $respon = [
                'status' => 'success',
                'msg' => $request['name'].' product is input successfull',
                'errors' => null
            ];
         }
         
        return response()->json($respon, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //find product with param id
        $product = Product::find($id);
        if(is_null($product)){
           $respon = [
             'status' =>'error',
             'msg' =>'Product not found'
           ];
          return response()->json($respon, 200);
        }
        
        return response()->json([
          'status' =>'success',
          'msg' =>'Product at found',
          'data' => $product
          ],200);
        
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
        $validate = \Validator::make($request->all(), [
              'name'=>'required',
              'price'=> 'required'
             ]);
             
        if($validate->fails()){
          $respon = [
                'status' => 'error',
                'msg' => 'Validator error',
                'errors' => $validate->errors(),
                'content' => null,
            ];
          return response()->json($respon, 200);
        }
        
         //input form store 
         $input = [
             'name' => $request['name'],
             'price'=> $request['price'],
             'description' => $request['description'],
             'slug' => Str::slug($request['name'])
          ];
          
          $product = Product::find($id);
          if(is_null($product)){
           $respon = [
             'status' =>'error',
             'msg' =>'Product not found'
           ];
             return response()->json($respon, 200);
           }
           
           //update store
           $product->update($input);
           return response()->json([
          'status' =>'success',
          'msg' =>'Product at found',
          'data' => $product
          ],200);
          
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
        return response()->json([
                  'status' => 'success',
                  'msg' =>'Product is remove successfull',
                  'errors' => null
              ],200);
    }
    
    /**
     * Remove all store data product 
     * @return \Illuminate\Http\Response
    **/
    public function truncate(){
      $delall = Product::query()->truncate();
      return response()->json([
                  'status' => 'success',
                  'msg' =>'Product is remove successfull',
                  'errors' => null
              ],200);
    }
    
    /**
     * Search Product
     * @param $keyword
     * @return \Illuminate\Http\Response
    **/
    
    public function search($keyword){
      $product = Product::where('name','LIKE','%'.$keyword.'%')->get();
      if(sizeof($product) > 0 ){
          return response()->json([
          'status' =>'success',
          'msg' =>'Product at found',
          'data' => $product
          ],200);
       }else{
          return response()->json([
          'status' =>'error',
          'msg' =>'Product not found',
          'data' => $product
          ],200);
       }
    }
    
}
