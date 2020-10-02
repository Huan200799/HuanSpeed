<?php

namespace App\Http\Controllers;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Models\Suggest;
use Auth;
use DB;
use Illuminate\Support\Str;
use App\Repositories\Interfaces\SuggestUserRepositoryInterface;
use App\Http\Requests\UserSuggestRequest;
class SuggestUserController extends Controller
{
    private $suggestRepository;
    public function __construct(
        SuggestUserRepositoryInterface $suggestRepository
    )
    {
        $this->suggestRepository = $suggestRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catelist = Categories::all();
        return view('reviews.suggest', compact('catelist'));
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
    public function store(UserSuggestRequest $request)
    {
        $this->suggestRepository->createSuggestProduct($request->all());
        return redirect('suggest')->with('success', trans('message.success_create_suggest'));
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
