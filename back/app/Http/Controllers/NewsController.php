<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Validator;

class NewsController extends Controller
{
    public function index()
    {
        return response()->json(News::orderByDesc('created_at')->get(), 200, ['Content-Type' => 'application/json; charset=UTF-8'], JSON_UNESCAPED_UNICODE);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'text' => 'required'
        ]);
        if ($validator->passes()) {
            $findNews = News::find(Input::get('id'));
            if ($findNews !== null) {
                $findNews->title = Input::get('title');
                $findNews->image = Input::get('image');
                $findNews->text = Input::get('text');
                $findNews->save();
                return response()->json(200);
            } else return response()->json('ID Not found', 404);
        } else {
            return response()->json($validator->errors()->all(), 400);
        }
    }

    public function delete($id)
    {
        $news = News::find($id);
        if ($news !== null) {
            News::destroy($id);
            return response()->json(200);
        } else {
            return response()->json('ID not found', 404);
        }
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'text' => 'required'
        ]);
//        return response()->json(Input::all(), 200);
        if ($validator->passes()) {
            $newNews = new News();
            $newNews->title = Input::get('title');
            $newNews->image = Input::get('image');
            $newNews->text = Input::get('text');
            $newNews->save();

            return response()->json(200);
        } else {
            return response()->json($validator->errors()->all(), 400);
        }
    }
}
