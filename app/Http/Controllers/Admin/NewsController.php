<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\NewsCategotires;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::paginate(12);
        return view('admin.news.index')->with(['news' => $news]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $news_categories = NewsCategotires::all();
        return view('admin.news.create')->with(['news_categories' => $news_categories]);
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
            'title' => 'required',
            'content' => 'required',
            'image' => 'required'
        ],[
            'title.required' => 'Tiêu đề không được để trống!',
            'content.required'=> 'Nội dung không được để trống!',
            'image.required'=> 'Vui lòng chọn hình ảnh!',
        ]);
        DB::beginTransaction();
        try {
            $news = new News();
            $news->title = $request['title'];
            $news->content = $request['content'];
            $avata = Storage::disk('public')->put('news', $request->file('image', 'public'));
            error_reporting($avata);
            $news->image = $avata;
            $news->news_category_id = $request['news_category_id'] ?? 1;
            $news->save();
            DB::commit();
            return redirect()->route('news.index')->with(['success' => 'Thêm mới tin tức thành công!']);
        } catch (\Exception $e) {
            dd($e);
            DB::rollBack();
            return redirect()->back()->with(['error', 'Thêm mới tin tức không thành công']);
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
        $news = News::findOrFail($id);
        $news_categories = NewsCategotires::all();
        return view('admin.news.edit')->with(['news' => $news, 'news_categories' => $news_categories]);
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
            'title' => 'required',
            'content' => 'required'
        ],[
            'title.required' => 'Tiêu đề không được để trống!',
            'content.required'=> 'Nội dung không được để trống!'
        ]);
        DB::beginTransaction();
        try {
            $news = News::findOrFail($id);
            if ($news->image) {
                Storage::delete($news['image']);
            }
            $news->title = $request['title'];
            $news->content = $request['content'];
            if ($request['image']) {
                $avata = Storage::disk('public')->put('news', $request->file('image', 'public'));
                error_reporting($avata);
                $news->image = $avata;
            }
            if ($request->status) {
                $news->status = true;
            }else{
                $news->status = false;
            }
            $news->news_category_id = $request['news_category_id'] ?? 1;
            $news->save();
            DB::commit();
            return redirect()->route('news.index')->with(['success' => 'Chỉnh sửa tin tức thành công!']);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with(['error', 'Chỉnh sửa tin tức không thành công!']);
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
            News::destroy($id);
            return response()->json([
                'error' => false,
                'msg' => 'Xóa tin tức thành công!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => true,
                'msg' => 'Xóa tin tức không thành công!'
            ]);
        }
    }
}
