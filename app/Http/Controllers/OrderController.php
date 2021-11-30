<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Http\Requests\OrderRequest;
use Illuminate\Support\Facades\DB;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::get();
        return view('admin.order.index', ['orders'=>$orders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('order.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = new Order();
        $order->total = $request->total;
        $order->user_id = $request->user_id;
        $order->payment = 'Cash';
        $order->save();
        $order_products = $request->products;
        $order_id = Order::all()->last()->id;
        // return response()->json($order_products[0]['id'], 200);
        foreach ($order_products as $prod) {
        DB::table('product_orders')->insert([
            ['product_id' => $prod['id'] , 'order_id' => $order_id , 'quantity' => $prod['quantity'] , 'total_price' => $prod['total_price'] , 'image_url' => $prod['image_url']]
        ]);
        }

        return response()->json($order, 200);
    }

    public function payOnline($user_id)
    {
        $order = Order::where('user_id',$user_id)->first();
        $order->payment = 'Online';
        $order->save();
        return response()->json($order, 200);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orders = Order::where('id',$id)->get();
        return view('admin.order.index', ['orders'=>$orders]);
    }

    public function filterStatus($statusValue)
    {
        $orders = Order::where('status',$statusValue)->get();
        return view('admin.order.index', ['orders'=>$orders]);
    }

    public function filterDate(Request $request)
    {
        $orders = Order::whereBetween('created_at', array($request->startDate, $request->endDate))->get();
        return view('admin.order.index', ['orders'=>$orders]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::find($id);

        if (!$order)
            return redirect()->back()->withErrors([ __('Entity Not Found') ]);

        return view('order.edit', ['order'=>$order]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OrderRequest $request, $id)
    {
        $order = Order::find($id);

        if (!$order)
            return redirect()->back()->withErrors([ __('Entity Not Found') ]);

        $order->update($request->only([
            'user_id',
            'karat_price',
            'total',
            'knet',
            'total_knet',
        ]));

        return redirect()->back()->with(['success' => __('Updated Successfully') ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::find($id);

        if (!$order)
            return redirect()->back()->withErrors([ __('Entity Not Found') ]);

        $order->delete();

        return redirect()->back()->with(['success' => __('Deleted Successfully') ]);
    }

    public function changeStatus($id,$statusValue)
    {
        $order = Order::find($id);
        $order->status = $statusValue;
        $order->save();
        return response()->json($order, 200);
    }
}
