<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\OrderDetail;
use App\Models\Order;
use App\Models\Product;
use Auth;
use DB;
use Illuminate\Support\Facades\Redirect;
use Cart;
use App\Repositories\Interfaces\OrderRepositoryInterface;
class OrderController extends Controller
{
    private $orderRepository;

    public function __construct(
        OrderRepositoryInterface $orderRepository
    )
    {
        $this->orderRepository = $orderRepository;
    }
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
        $result = $this->orderRepository->UserOrderProduct();

        if ($result === 'Order successfully') {
        return Redirect::route('show')->with('success', trans('message.success_order'));
        } else {
            return redirect()->route('show')->with('error', trans('message.ordererror'));
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.v
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orders = $this->orderRepository->showHistory($id);
        $totalprice = $this->orderRepository->showHistoryTotal($id);
        return view('pages.history', compact('orders', 'totalprice'));
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
