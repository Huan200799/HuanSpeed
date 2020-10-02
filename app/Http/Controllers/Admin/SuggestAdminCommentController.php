<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Repositories\Interfaces\SuggestUserRepositoryInterface;
use App\Models\Suggest;
class SuggestAdminCommentController extends Controller
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
        $suggests = $this->suggestRepository->getAllSuggest();
        return view('admin.suggest.index', compact('suggests'));
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
        try {
            $suggest = $this->suggestRepository->updateSuggestProduct($id, $request->all());

            return redirect()->intended('admin/suggests')->with('success', trans('message.success_edit_suggest'));;
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
            $this->suggestRepository->deleteSuggestProduct($id);

            return redirect()->intended('admin/suggests')->with('success', trans('message.success_delete_suggest'));

        } catch (Exception $e) {

            return back()->withErrors( __('message.xoa'));
        }
    }
}
