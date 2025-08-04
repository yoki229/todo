<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use Illuminate\Http\Request;
use App\Models\Todo;
use App\Models\Category;

class TodoController extends Controller
{
    public function index(){
        $todos = Todo::with('category')->get();
        $categories = Category::all();
        return view('index',compact('todos','categories'));
    }

    public function store(TodoRequest $request){
        $todo = $request->only(['content','category_id']);
        Todo::create($todo);                        //Todoモデルに沿って、データベースに新しいデータを登録（保存）
        return redirect('/')->with('message','Todoを作成しました');
    }

    public function update(TodoRequest $request){
        $todo = $request->only(['content']);
        Todo::find($request->id)->update($todo); //idを主キーとしてTodoを探す⇒更新

        return redirect('/')->with('message','Todoを更新しました');
    }

    public function destroy(Request $request){
        Todo::find($request->id)->delete();        ////idを主キーとしてTodoを探す⇒削除
        return redirect('/')->with('message','Todoを削除しました');
    }

    //ローカルスコープを使ったTodo検索
    public function search(Request $request){
        $todos = Todo::with('category')                 //Todoモデルから、すべてのToDoと、レーション先の category（カテゴリ情報）も一緒に読み込む
            ->CategorySearch($request->category_id)     //scopeの部分を抜いたメソッド名。category_idで検索
            ->KeywordSearch($request->keyword)          //scopeの部分を抜いたメソッド名。keywordで検索
            ->get();                                    //全てを入手
        $categories = Category::all();                  //カテゴリのセレクトボックスにあるすべてのカテゴリデータを取得

        return view('index',compact('todos', 'categories'));
    }
}
