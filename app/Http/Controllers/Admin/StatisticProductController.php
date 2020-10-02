<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Order;
use DB;
use Carbon\Carbon;
use App\DateClass\Date;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Repositories\Interfaces\CommentRepositoryInterface;
use App\Repositories\Interfaces\StatisticProductRepositoryInterface;
use App\Repositories\Interfaces\CategoriesRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
class StatisticProductController extends Controller
{
    private $statisticRepository;
    private $productRepository;
    private $commentRepository;
    private $categoriesRepository;
    private $userRepository;
    public function __construct(
        ProductRepositoryInterface $productRepository,
        CommentRepositoryInterface $commentRepository,
        StatisticProductRepositoryInterface $statisticRepository,
        CategoriesRepositoryInterface $categoriesRepository,
        UserRepositoryInterface $userRepository
    )
    {
        $this->productRepository = $productRepository;
        $this->commentRepository = $commentRepository;
        $this->statisticRepository = $statisticRepository;
        $this->categoriesRepository = $categoriesRepository;
        $this->userRepository = $userRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->productRepository->getStatisticProduct();
        $comments = $this->commentRepository->GetComment();
        $categories = $this->categoriesRepository->CategoriesAll();
        $users = $this->userRepository->GetUser();
        $statistichours = $this->statisticRepository->getStatisticHours();
        $statisticday = $this->statisticRepository->getStatisticDay();
        $statisticweek = $this->statisticRepository->getStatisticWeek();


        $viewData = [
            'statistichours' => $statistichours,
            'statisticweek' => $statisticweek,
            'statisticday' => $statisticday,
            'comments' => $comments,
            'products' => $products,
            'categories' => $categories,
            'users' => $users,
        ];
        return view('admin.statistic.index', $viewData);
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
