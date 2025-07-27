<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index(){
        $todos = Todo::all();                       //allメソッド⇒todosテーブルを全て取得し、 $todosに格納
        return view('index',compact('todos'));      //view('index',['todos'=>$todos])と同じ意味。まとめてviewへ送るcompact
    }

    public function store(TodoRequest $request){
        $todo = $request->only(['content']);        //only()は配列で送られてきたrequestのうちのひとつを取り出すから['content']の形に
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
}
