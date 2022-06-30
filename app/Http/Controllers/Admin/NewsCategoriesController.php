<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsCategotires;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news_categories = NewsCategotires::orderBy('id', 'DESC')->paginate(10);
        return view('admin.news_categories.index')->with(['news_categories' => $news_categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ], [
            'name.required' => 'Tên không được để trống!',
        ]);
        DB::beginTransaction();
        try {
            $news_category = new NewsCategotires();
            $news_category->name = $request->name;
            $news_category->save();
            DB::commit();
            return redirect()->route('categories.index')->with(['success' => 'Thêm mới loại tin tức thành công!']);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with(['error' => 'Thêm mới loại tin tức không thành công']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news_categories = NewsCategotires::findOrFail($id);
        return view('admin.news_categories.edit')->with(['news_categories' => $news_categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required'
        ], [
            'name.required' => 'Tên không được để trống!',
        ]);
        DB::beginTransaction();
        try {
            $news_category = NewsCategotires::findOrFail($id);
            $news_category->name = $request->name;
            $news_category->save();
            DB::commit();
            return redirect()->route('categories.index')->with(['success' => 'Chỉnh sửa loại tin tức thành công!']);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with(['error' => 'Chỉnh sửa loại tin tức không thành công']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            NewsCategotires::destroy($id);
            return response()->json([
                'error' => false,
                'msg' => 'Xóa loại tin tức thành công!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => true,
                'msg' => 'Xóa loại tin tức không thành công!'
            ]);
        }
    }
}
