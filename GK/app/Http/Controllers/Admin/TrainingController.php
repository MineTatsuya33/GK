<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Training;
use App\History;
use Carbon\Carbon;

class TrainingController extends Controller
{
    //
    public function add()
    {
        return view('admin.training.create');
    }
    
     public function create(Request $request)
     {
      $this->validate($request, Training::$rules);
      $training = new Training;
      $form = $request->all();
      // フォームから送信されてきた_tokenを削除する
      unset($form['_token']);
      // データベースに保存する
      $training->fill($form);
      $training->save();
      
      return redirect('admin/training/create');
  } 
  
  public function index(Request $request)
  {
      $cond_title = $request->cond_title;
      if ($cond_title != '') {
          // 検索されたら検索結果を取得する
          $posts = Training::where('title', $cond_title)->get();
      } else {
          // それ以外はすべてのニュースを取得する
          $posts = Training::all();
      }
      return view('admin.training.index', ['posts' => $posts, 'cond_title' => $cond_title]);
  }
  
  public function edit(Request $request)
  {
      // News Modelからデータを取得する
      $training = Training::find($request->id);
      if (empty($training)) {
        abort(404);    
      }
      return view('admin.training.edit', ['training_form' => $training]);
  }


 public function update(Request $request)
  {
      $this->validate($request, Training::$rules);
        $training = Training::find($request->id);
        $training_form = $request->all();
        if ($request->remove == 'true') {
            $training_form['image_path'] = null;
        } elseif ($request->file('image')) {
            $path = $request->file('image')->store('public/image');
            $news_form['image_path'] = basename($path);
        } else {
            $news_form['image_path'] = $training->image_path;
        }

        unset($training_form['_token']);
        unset($training_form['image']);
        unset($training_form['remove']);
        $training->fill($news_form)->save();

        // 以下を追記
        $history = new History;
        $history->training_id = $training->id;
        $history->edited_at = Carbon::now();
        $history->save();

        return redirect('admin/training/');
  }
  
  public function delete(Request $request)
  {
      // 該当するNews Modelを取得
      $training = Training::find($request->id);
      // 削除する
      $training->delete();
      return redirect('admin/training/');
  }  

    
}
