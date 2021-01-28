<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Customer;
use DB;

class FeedbackRatingController extends Controller
{
    public function create(Request $request){
      $questions = DB::select('select f_q_id, type, question from feedback_questions');

      return view('feedback-rating.form', [
        'questions' => $questions
      ]);
    }

    public function store(Request $request){

      $questions = DB::select('select f_q_id, question from feedback_questions');

      $insert = DB::insert('insert into customer_feedbacks (customer_id, f_q_id, rating, remarks, status) values (?, ?, ?, ?, ?, ?)',
      [$custID, $request->f_q_id, $request->rating, $request->remarks, 1]);

      // $custID = DB::select('select customer_id from customers');// need to get customer_id
      $custID = Customer::findOrFail($customer_id);
      $fqID = $request->$questions->f_q_id;//need to get the question's id (f_q_id);
      $rating = $request->$questions->f_q_id;
      // $remarks = $request->$questions->f_q_id;
      $insert->remarks = $request->input($questions->f_q_id);

      $insert->save();

      dd($insert);
      return view('login-page');

    }
}
