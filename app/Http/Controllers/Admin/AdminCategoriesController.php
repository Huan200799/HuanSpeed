<?php

namespace App\Http\Controllers\Admin;
use App\Models\Categories;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\CategoriesRepositoryInterface;
class AdminCategoriesController extends Controller
{
    private $categoriesRepository;
    public function __construct(
        CategoriesRepositoryInterface $categoriesRepository
    )
    {
        $this->categoriesRepository = $categoriesRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catelist = Categories::all();
        return view('admin.categories.index', compact('catelist'));
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
        $this->categoriesRepository->createCategories($request->all());
        return redirect('admin/category')->with('success', trans('message.success_create_categories'));
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
        $catelist = Categories::all();
        $categories = $this->categoriesRepository->getCategories($id);
        return view('admin.categories.editcategories', compact('categories', 'catelist'));
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
        $update = $this->categoriesRepository->updateCategories($id, $request->all());

        if ($update === 'Update successfully') {
            return redirect('admin/category')->with('success', trans('message.success_update_categories'));
        } else {
            return redirect('admin/category')->with('error', trans('message.error_update_categories'));
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
            $this->categoriesRepository->deleteCategories($id);

            return redirect()->intended('admin/category')->with('success', trans('message.success_delete_categories'));

        } catch (Exception $e) {

            return back()->withErrors( __('message.xoa'));
        }
    }
}
