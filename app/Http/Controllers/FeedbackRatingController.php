<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;

class FeedbackRatingController extends Controller
{
    public function create(Request $request){
      $questions = DB::select('select f_q_id, type, question from feedback_questions');

      return view('feedback-rating.form', [
        'questions' => $questions
      ]);
    }

}
