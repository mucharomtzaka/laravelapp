<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Http\Controllers\Controller;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Transaction::query()->orderBy('created_at','DESC')->paginate(10);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //make validate
        $validate = \Validator::make($request->all(), [
              'factur'=>'required',
              'amount'=> 'required',
              'location'>'required',
              'type'=>'required',
              'description'=>'required'
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
        
        //input store from form transaction
        $input = [
              'factur' => $request['factur'],
              'amount' => $request['amount'],
              'location'=> $request['location'],
              'operator'=>$request['user']['name']
              ,'type' => $request['type_transaction'],
              'description' => $request['description'],
              'status' => 'OK'
          ];
        
        
        //check transaction factur exists
          $check = Transaction::where('factur',$request['factur'])->first();
          
          if($check != null){
            $respon = [
                'status' => 'error',
                'msg' => $request['factur'].' transaction is created Exist',
                'errors' => $check
            ];
          }else{
         //store data
            $store = Transaction::create($input);
            $respon = [
                'status' => 'success',
                'msg' => $request['type_transaction'].'  is successfull with factur'.$request['factur'],
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
        //find Transaction with param id
        $transaction = Transaction::find($id);
        if(is_null($transaction)){
           $respon = [
             'status' =>'error',
             'msg' =>'Transaction not found'
           ];
          return response()->json($respon, 200);
        }
        
        return response()->json([
          'status' =>'success',
          'msg' =>'Transaction at found',
          'data' => $transaction
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
        //make validation
        $validate = \Validator::make($request->all(), [
              'amount'=> 'required',
              'description'=>'required',
              'action'=>'required'
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
         // check Transaction with param id
          $transaction = Transaction::find($id);
          if(is_null($transaction)){
             $respon = [
               'status' =>'error',
               'msg' =>'Transaction not found'
             ];
             return response()->json($respon, 200);
           }
        
   
        //input store from form transaction
          $input = [
              'amount' => $request['amount'],
               'description' => $request['description'],
              'status' => $request['action']
          ];
          
          //update store
           $transaction->update($input);
           return response()->json([
          'status' =>'success',
          'msg' =>'Transaction at change',
          'data' => $transaction
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
        $delete = Transaction::find($id)->delete();
        return response()->json([
                  'status' => 'success',
                  'msg' =>'Transaction is remove successfull',
                  'errors' => null
              ],200);
    }
    
    /**
     * Search Transaction
     * @param $keyword
     * @return \Illuminate\Http\Response
    **/
    
    public function search($keyword){
      $transaction = Transaction::where('factur','LIKE','%'.$keyword.'%')->get();
      if(sizeof($transaction) > 0 ){
          return response()->json([
          'status' =>'success',
          'msg' => $keyword.' at found',
          'data' => $transaction
          ],200);
       }else{
          return response()->json([
          'status' =>'error',
          'msg' => $keyword.' not found',
          'data' => $transaction
          ],200);
       }
    }
    
}
