<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Suggest;
use App\Models\Comment;
use App\Models\Product;
use Auth;
use DB;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Repositories\Interfaces\CommentRepositoryInterface;
use App\Repositories\Interfaces\ChildCommentRepositoryInterface;
class HomePageController extends Controller
{


    private $productRepository;
    private $commentRepository;
    private $childcommentRepository;
    public function __construct(
        ProductRepositoryInterface $productRepository,
        CommentRepositoryInterface $commentRepository,
        ChildCommentRepositoryInterface $childcommentRepository
    )
    {
        $this->productRepository = $productRepository;
        $this->commentRepository = $commentRepository;
        $this->childcommentRepository = $childcommentRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catelist = Categories::all();
        $ratingcomment = $this->commentRepository->GetComment();
        $prominents = $this->productRepository->getProductProminent();
        $notprominents = $this->productRepository->getProductNotProminent();
        return view('pages.home', compact(['prominents', 'notprominents', 'ratingcomment', 'catelist']));
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
        $search = $request->search;
        $search = str_replace(' ', '%', $search);
        $data['key'] = $search;
        $data['search'] = Product::where('product_name', 'like', '%'.$search.'%')->get();

        return view('pages.search',$data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $catelist = Categories::all();
            $products = $this->productRepository->product_detail($id);
            $comments = $this->productRepository->findCommentProduct($id);
            $childcomment = $this->childcommentRepository->getChildComment();
            $commentrating = $this->productRepository->AVGCommentProduct($id);
            $commentrating5 = $this->commentRepository->CommentRating5($id);
            $commentrating4 = $this->commentRepository->CommentRating4($id);
            $commentrating3 = $this->commentRepository->CommentRating3($id);
            $commentrating2 = $this->commentRepository->CommentRating2($id);
            $commentrating1 = $this->commentRepository->CommentRating1($id);
            return view('pages.details',
            compact(['products', 'comments', 'childcomment', 'commentrating', 'commentrating5', 'commentrating4', 'commentrating3', 'commentrating2', 'commentrating1', 'catelist']));
        } catch (Exception $e) {

            return back()->withErrors( __('message.edit'));
        }
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
