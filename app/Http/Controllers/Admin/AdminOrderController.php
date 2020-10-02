<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\OrderDetail;
use App\Models\Order;
use App\Models\Comment;
use App\Models\Product;
use Auth;
use DB;
use App\Repositories\Interfaces\OrderRepositoryInterface;
use Mail;
use App\Mail\AdminAcceptOrder;
class AdminOrderController extends Controller
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
        $orders = $this->orderRepository->GetOrderProduct();
        return view('admin.order.listorder', compact(['orders']));
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
        try {
            $update = $this->orderRepository->updateOrderProduct($id, $request->all());
            if ($update === 'Send Mail Successfully') {
                return redirect('admin/productorder')->with('success', trans('message.success_edit_order'));
            }
            else
            {
                return redirect('admin/productorder')->with('success', trans('message.edit'));
            }
        } catch (Exception $e) {

            return back()->withErrors( __('message.edit'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($id != null){
            $this->orderRepository->DeleteOrderProduct($id);
            return redirect('admin/productorder')->with('success', trans('message.success_delete_order'));
        }
        else
        {
            return back()->withErrors( __('message.xoa'));
        }
    }

}
