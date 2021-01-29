<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Customer;
use DB;
use Carbon\Carbon;

class FeedbackRatingController extends Controller
{
    public function create(Request $request){
      $questions = DB::select('select f_q_id, type, question from feedback_questions');

      return view('feedback-rating.form', [
        'questions' => $questions
      ]);
    }

<<<<<<< HEAD
    public function showChart(){

      $tempFrom = '';
      $tempTo = '';
      $from = '';
      $to = '';

      if(request()->has('fromDate') && request()->has('toDate')){
        $tempFrom = request()->get('fromDate');
        $tempTo = request()->get('toDate');

        $from = Carbon::createFromFormat('d/m/Y', $tempFrom)->format('Y/m/d') . " 00:00:00";
        $to = Carbon::createFromFormat('d/m/Y', $tempTo)->format('Y/m/d') . " 23:59:59";

        // dd($formatFromDate, $formatToDate);
      } else {
        $from = '';
        $to = '';
      }

      $Q1 = json_encode(DB::select(
        'call rating(?,?,?)',
        array($from, $to, 1)
      ));

      $Q2 = json_encode(DB::select(
        'call rating(?,?,?)',
        array($from, $to, 2)
      ));

      $Q3 = json_encode(DB::select(
        'call rating(?,?,?)',
        array($from, $to, 3)
      ));

      $Q4 = DB::select(
        'select feedback.*, customer.*
        from customer_feedbacks feedback
        inner join
        (select *
        from customers) customer
        on feedback.customer_id = customer.customer_id
        where feedback.f_q_id = ?
        and feedback.created_at between ? and ?',
        [4, $from, $to]
      );

      $Q5 = DB::select(
        'select feedback.*, customer.*
        from customer_feedbacks feedback
        inner join
        (select *
        from customers) customer
        on feedback.customer_id = customer.customer_id
        where feedback.f_q_id = ?
        and feedback.created_at between ? and ?',
        [5, $from, $to]
      );

      // dd($from, $to
      //dd($Q1, $Q2, $Q3, $Q4, $Q5);
      return view('chart', compact('Q1', 'Q2', 'Q3', 'Q4', 'Q5', 'tempFrom', 'tempTo'));
    }

=======
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
>>>>>>> 26c1710c7c0010ad3bf03897bb7dc7f24d01f77d
}
