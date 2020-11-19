<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Training;

class SearchController extends Controller
{
    public function index(Request $request){
        $query = Training::query();
        $search1 = $request->input('genre');
        $search2 = $request->input('number');
        $search3 = $request->input('difficulty');

         // プルダウンメニューで指定なし以外を選択した場合、$query->whereで選択した棋力と一致するカラムを取得します
        if ($request->has('genre') && $search1 != ('指定なし')) {
            $query->where('genre', $search1)->get();
        }

         // プルダウンメニューで指定なし以外を選択した場合、$query->whereで選択した好きな戦法と一致するカラムを取得します
        if ($request->has('number') && $search2 != ('指定なし')) {
            $query->where('number', $search2)->get();
        }

        // ユーザ名入力フォームで入力した文字列を含むカラムを取得します
        if ($request->has('difficulty') && $search3 != '') {
            $query->where('difficulty',$search3)->get();
        }
        $data = $query->paginate(10);
        return view('training.search',[
            'data' => $data
        ]);
    }
}
