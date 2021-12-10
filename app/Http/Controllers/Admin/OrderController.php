<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Order;
use App\Models\Status;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function index(Request $request)
    {
        $orders = $this->filter($request);
        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     */
    public function edit($id)
    {
        $order = $this->getOrder($id);
        $statuses = Status::all();
        return view('admin.orders.edit' ,compact('order','statuses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(Request $request, $id)
    {
        $order = $this->getOrder($id);

        $order->status_id = $request->status;

        $order->save();
        return redirect(route('admin.orders.index'));
    }

    public function archive($id)
    {
        $order = $this->getOrder($id);
        $order->is_archive = ($order->is_archive)
            ? 0 : 1;
        $order->save();
        $orders = Order::get();
        return redirect(route('admin.orders.index'));
    }

    private function getOrder($id)
    {
        if(!$order = Order::find($id)){
            return abort(404);
        }
        return $order;
    }

    private function filter($request)
    {
        $orders = Order::all();
        if($request->filter == 1){
            return $orders->where('is_archive', 0);
        }
        if($request->filter == 2) {
            return $orders->where('is_archive', 1);
        }
        return $orders;
    }

}
