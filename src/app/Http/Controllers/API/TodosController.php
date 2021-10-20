<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\TodosCollection;
use App\Models\todosList;
use Illuminate\Http\Request;

class TodosController extends Controller
{
    public function index(){
        $todos = todosList::get();
        return TodosCollection::collection($todos);
    }
    public function add(Request $request){
        $todo = new todosList;
        $todo->content = $request->content;
        $todo->checked = $request->checked;
        $todo->completed = $request->completed;
        $todo->created_at = now();
        $todo->updated_at =now();
        $todo->save();

        $todos = todosList::get();
        return TodosCollection::collection($todos);
    }
    public function remove(Request $request){
        $todo = todosList::find($request->id)->delete();
        $todos = todosList::get();
        return TodosCollection::collection($todos);
    }
    public function removeAll (Request $request){
        foreach ($request->params as $param){
            if($param['checked'] == 1){
                $todo = todosList::where('id', $param['id'])->delete();
            }
        }
        $todos = todosList::get();
        return TodosCollection::collection($todos);
    }
    public function doneAll(Request $request){
        foreach ($request->params as $param){
            if($param['checked'] == 1){
                $todo = todosList::where('id', $param['id'])->first();
                $todo->completed = 1;
                $todo->save();
            }
        }
        $todos = todosList::get();
        return TodosCollection::collection($todos);
    }
}
