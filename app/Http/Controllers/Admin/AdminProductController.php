<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Suggest;
use App\Models\Comment;
use App\Models\Product;
use Auth;
use DB;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Http\Requests\AddProductRequest;
use App\Http\Requests\EditProductRequest;
class AdminProductController extends Controller
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

        $products = $this->productRepository->getProduct();
        return view('admin.product.listproduct', compact(['products',]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $catelist = Categories::all();
        return view('admin.product.addproduct', compact('catelist'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddProductRequest $request)
    {
        $this->productRepository->createProduct($request->all());
        return redirect('admin/product')->with('success', trans('message.success_create_product'));
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
        try {
            $products = $this->productRepository->findProduct($id);
            $catelist = Categories::all();
            return view('admin.product.editproduct', compact(['products', 'catelist']));
        } catch (Exception $e) {

            return back()->withErrors( __('message.edit'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditProductRequest $request, $id)
    {
        try {
            $update = $this->productRepository->updateProduct($id, $request->all());

            return redirect()->intended('admin/product')->with('success', trans('message.success_edit_product'));;
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
        try {
            $this->productRepository->deleteProduct($id);

            return redirect()->intended('admin/product')->with('success', trans('message.success_delete_product'));

        } catch (Exception $e) {

            return back()->withErrors( __('message.xoa'));
        }
    }
}
