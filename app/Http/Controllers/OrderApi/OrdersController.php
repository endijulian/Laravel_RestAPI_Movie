<?php

namespace App\Http\Controllers\OrderApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Order;
use App\OrderDetail;
use Carbon\Carbon;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        DB::beginTransaction();
        try {
            //code...
            $customerId = $request->input('customerId');
            $orderDate = Carbon::parse($request->input('orderDate'))->toDateString();
            $cartMovies = $request->input('cartMovies');

            $order = New Order;
            $order->customer_id = $customerId;
            $order->order_date = $orderDate;
            $order->save();
            $lastOrderId = $order->id;

            for($i=0; $i<count($cartMovies); $i++){
                $order_detail = New OrderDetail;
                $order_detail->order_id = $lastOrderId;
                $order_detail->movie_id = $cartMovies[$i]['movieId'];
                $order_detail->quantity = $cartMovies[$i]['quantity'];
                $order_detail->save();
            }

            DB::commit();
            return response()->json($order, 200);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json($e, 401);
        }
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
    }
}
