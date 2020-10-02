<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Suggest;
use App\Models\Comment;
use App\Models\Product;
use Auth;
use DB;
use Cart;
use App\Repositories\Interfaces\ProductRepositoryInterface;
class CartController extends Controller
{
    private $productRepository;
    public function __construct(
        ProductRepositoryInterface $productRepository
    )
    {
        $this->productRepository = $productRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product_cart = Cart::content();
        $total = Cart::total();
        return view('pages.cart', compact(['product_cart', 'total']));
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
        Cart::update($request->rowId, $request->qty);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = $this->productRepository->findProduct($id);
        $data['id'] = $id;
        $data['qty'] = 1;
        $data['name'] = $product->product_name;
        $data['price'] = $product->price;
        $data['options']['image'] = $product->product_img;
        $data['weight'] = $id;
        Cart::add($data);
        return redirect('cart');
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
        try {
        if($id == 'all'){
            Cart::destroy();
        }else
        {
            Cart::remove($id);
        }
        return back();
        } catch (Exception $exception) {

            return back()->withErrors( __('message.xoa'));
        }
    }
}
