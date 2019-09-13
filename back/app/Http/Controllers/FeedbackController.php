<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Support\Facades\Input;


class FeedbackController extends Controller
{
    public function saveUserFeedback()
    {
        try {
            $newFeedback = new Feedback();
            $newFeedback->name = Input::get('name');
            $newFeedback->email = Input::get('email');
            $newFeedback->text_user = Input::get('text_user');
            $newFeedback->is_show = false;
            $newFeedback->save();
            return response()->json(200);
        } catch (\Exception $e) {
            return response()->json('Ошибка сохранения нового отзывы', 500);
        }
    }

    public function saveAdminFeedback()
    {
        try {
            $findFeedback = Feedback::find(Input::get('id'));
            if ($findFeedback !== null) {
                $findFeedback->text_user = Input::get('text_user');
                $findFeedback->text_admin = Input::get('text_admin');
                $findFeedback->is_show = Input::get('is_show');
                $findFeedback->save();
                return response()->json(200);
            } else return response()->json('ID Not found', 404);
        } catch (\Exception $e) {
            return response()->json('ID Not found', 500);
        }
    }

    public function getUserFeedbacks() {
        return response()->json(Feedback::where('is_show', true)->orderByDesc('created_at')->get(), 200, ['Content-Type' => 'application/json; charset=UTF-8'], JSON_UNESCAPED_UNICODE);
    }

    public function getAdminFeedbacks()
    {
        return response()->json(Feedback::orderByDesc('created_at')->get(), 200, ['Content-Type' => 'application/json; charset=UTF-8'], JSON_UNESCAPED_UNICODE);
    }
}
