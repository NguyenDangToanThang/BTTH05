<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    //(phần h , g) Liệt kê các bài hát có tiêu đề hoặc tựa bài hát có chứa một trong các từ "yêu" , "thương" , "anh" , "em" 
    public function DS_BaiViet_Phan_H()
    {
        // ORM

        $articles = Article::select('ma_bviet', 'tieude', 'ten_bhat')
            ->where(function ($query) {
                $query->where('tieude', 'like', '%yêu%')
                    ->orWhere('tieude', 'like', '%thương%')
                    ->orWhere('tieude', 'like', '%anh%')
                    ->orWhere('tieude', 'like', '%em%');
            })
            ->orWhere(function ($query) {
                $query->where('ten_bhat', 'like', '%yêu%')
                    ->orWhere('ten_bhat', 'like', '%thương%')
                    ->orWhere('ten_bhat', 'like', '%anh%')
                    ->orWhere('ten_bhat', 'like', '%em%');
            })
            ->orderBy('ma_bviet', 'ASC')
            ->get();

        // Query Builder
        /*
        $articles = DB::table('baiviet')
            ->select('ma_bviet', 'tieude', 'ten_bhat')
            ->where(function ($query) {
                $query->where('tieude', 'like', '%yêu%')
                    ->orWhere('tieude', 'like', '%thương%')
                    ->orWhere('tieude', 'like', '%anh%')
                    ->orWhere('tieude', 'like', '%em%');
            })
            ->orWhere(function ($query) {
                $query->where('ten_bhat', 'like', '%yêu%')
                    ->orWhere('ten_bhat', 'like', '%thương%')
                    ->orWhere('ten_bhat', 'like', '%anh%')
                    ->orWhere('ten_bhat', 'like', '%em%');
            })
            ->orderBy('ma_bviet', 'ASC')
            ->get();
        */
        // Raw Query
        /*
        $articles = DB::select("SELECT ma_bviet , tieude , ten_bhat
        FROM baiviet 
        WHERE (tieude LIKE N'%yêu%' OR N'%thương%' OR N'%anh%' OR N'%em%') 
        OR (ten_bhat LIKE N'%yêu%' OR N'%thương%' OR N'%anh%' OR N'%em%') 
        ORDER BY ma_bviet ASC");
        */
    }
    //(phần i) Tạo vw_Music để hiển thị thông tin về danh sách bài viết theo tên thể loại và tên tác giả
    public function index()
    {
        // Eloquent ORM
        $articles = Article::select('ma_bviet', 'tacgia.ten_tgia', 'theloai.ten_tloai')
            ->join('tacgia', 'tacgia.ma_tgia', '=', 'baiviet.ma_tgia')
            ->join('theloai', 'theloai.ma_tloai', '=', 'baiviet.ma_tloai')
            ->orderBy('ma_bviet', 'ASC')
            ->get();
        //Query Builder
        /*
        $articles = DB::table('baiviet')
            ->select('baiviet.ma_bviet', 'tacgia.ten_tgia', 'theloai.ten_tloai')
            ->join('tacgia', 'tacgia.ma_tgia', '=', 'baiviet.ma_tgia')
            ->join('theloai', 'theloai.ma_tloai', '=', 'baiviet.ma_tloai')
            ->orderBy('baiviet.ma_bviet', 'ASC')
            ->get();
        */
        //Raw Query
        /*
        $articles = DB::select("SELECT ma_bviet , tacgia.ten_tgia , theloai.ten_tloai
        FROM baiviet 
        INNER JOIN tacgia ON tacgia.ma_tgia = baiviet.ma_tgia
        INNER JOIN theloai ON theloai.ma_tloai = baiviet.ma_tloai
        ORDER BY ma_bviet ASC");
        */
        // dd($articles);
        return view('article.vw_Music', compact('articles'));
    }
    //(phần j) tạo thủ tục có tên sp_DSBaiViet
    public function sp_DSBaiViet($category_name)
    {
        //Eloquent ORM

        $articles = Article::select('ma_bviet', 'tacgia.ten_tgia', 'theloai.ten_tloai')
            ->join('tacgia', 'tacgia.ma_tgia', '=', 'baiviet.ma_tgia')
            ->join('theloai', 'theloai.ma_tloai', '=', 'baiviet.ma_tloai')
            ->where('theloai.ten_tloai', 'LIKE', $category_name)
            ->orderBy('ma_bviet', 'ASC')
            ->get();

        //Query Builder
        /*
        $articles = DB::table('baiviet')
            ->select('baiviet.ma_bviet', 'tacgia.ten_tgia', 'theloai.ten_tloai')
            ->join('tacgia', 'tacgia.ma_tgia', '=', 'baiviet.ma_tgia')
            ->join('theloai', 'theloai.ma_tloai', '=', 'baiviet.ma_tloai')
            ->where('theloai.ten_tloai', 'LIKE', $category_name)
            ->orderBy('baiviet.ma_bviet', 'ASC')
            ->get();
        */
        //Raw Query
        /*
        $articles = DB::select("SELECT ma_bviet , tacgia.ten_tgia , theloai.ten_tloai
        FROM baiviet 
        INNER JOIN tacgia ON tacgia.ma_tgia = baiviet.ma_tgia
        INNER JOIN theloai ON theloai.ma_tloai = baiviet.ma_tloai
        WHERE theloai.ten_tloai LIKE '$category_name'
        ORDER BY ma_bviet ASC");
        */
        return $articles;
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
