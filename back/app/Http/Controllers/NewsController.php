<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Validator;

class NewsController extends Controller
{
    public function create(Request $request) {


        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'text' => 'required'
        ]);

        return response()->json(Input::all(), 200);
        if ($validator->passes()) {
            $newUser = new User();
            $newUser->name = Input::get('name');
            $newUser->email = Input::get('email');
            $newUser->password = Hash::make(Input::get('password'));
            $newUser->save();
            if (Input::get('isAdmin') === true) $newUser->assignRole('admin'); else $newUser->assignRole('customer');
            if (Input::get('sites') !== null && $newUser->id !== null && Input::get('isAdmin') === false) {
                $list = array_unique(Input::get('sites'));
                $data = [];
                foreach ($list as $item) {
                    array_push($data, ['user_id' => $newUser->id, 'site_id' => $item]);
                }
                UserSite::insert($data);
            }
            return response()->json($newUser->toArray(), 200);
        } else {
            return response()->json($validator->errors()->all(), 400);
        }
    }
}
