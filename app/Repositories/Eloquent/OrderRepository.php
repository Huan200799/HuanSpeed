<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Interfaces\OrderRepositoryInterface;
use Mockery\Exception;
use DB;
use App\Models\OrderDetail;
use App\Models\Order;
use App\Models\Product;
use Auth;
use Illuminate\Support\Facades\Redirect;
use Cart;
use Mail;
use App\Mail\AdminAcceptOrder;
use App\Jobs\SendMailOrderJob;
use App\Jobs\SendMailAcceptOrderJob;
class OrderRepository extends BaseRepository implements OrderRepositoryInterface
{
    public function getModel()
    {
        return Order::class;
    }

    public function GetOrderProduct(){
        $order = $this->model->with('user')->orderby('id', 'desc')->paginate(config('constraint.app.paginates'));
        return $order;
    }

    public function updateOrderProduct($id, array $data){
        DB::beginTransaction();
         try {
            $order = $this->model->find($id);
            $order->status = 'Begin Transport';
            $email = $data['email'];
            $order->save();
            SendMailAcceptOrderJob::dispatch($email);
            DB::commit();

            return 'Send Mail Successfully';
        } catch (Exception $exception) {
            DB::rollback();

            return 'Send Mail error';
        }

        return $result;
    }

    public function OrderProductId($id){
        $order = $this->model->find($id);
        return $order;
    }

    public function showHistory($id){
        $orders = DB::table('order')
        ->join('order_detail','order.id','=','order_detail.order_id')
        ->join('product','product.id','=','order_detail.product_id')
        ->where('user_id',$id)->orderby('order.id', 'desc')->paginate(config('constraint.app.paginates'));
        return $orders;
    }

    public function showHistoryTotal($id){
        $orders = DB::table('order')->where('user_id',$id)->sum('total_price');
        return $orders;
    }

    public function UserOrderProduct(){
        DB::beginTransaction();
        try {
        $data = Cart::content();
        $total = 0;
        $order = new Order();
        foreach ($data as $datum)
        {
            $total += ($datum->price * $datum->qty);
        };
        $order->user_id = Auth::id();
        $order->total_price = $total;
        $order->save();
        $orderdetail = new OrderDetail();
        foreach ($data as $datum)
        {
            $orderdetail->product_id = $datum->id;
            $orderdetail->order_id = $order->id;
            $orderdetail->order_product_name = $datum->name;
            $orderdetail->order_product_totalprice = ($datum->qty * $datum->price);
            $orderdetail->quantity = $datum->qty;
            $orderdetail->save();
            Cart::destroy();
            $orderdetail = new OrderDetail();
        };
        $order->user_id = Auth::id();
        $order->total_price = $total;
        $order->save();
        SendMailOrderJob::dispatch();
        DB::commit();
        return 'Order successfully';
        } catch (\Exception $e) {
            DB::rollback();

            return 'Order error';
        }
    }

    public function DeleteOrderProduct($id){
        $data = null;
        $result = $this->model->find($id);
        if ($result) {
            $data = $result->delete();

            return $data;
        }

        return $data;
    }
}
