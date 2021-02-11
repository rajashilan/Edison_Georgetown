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

    public function store(Request $request){

      DB::beginTransaction();

      $customerID = $request->session()->get('customer_id');

      $currentTime = Carbon::now('Asia/Kuala_Lumpur');

      try{

      $feedback = DB::insert('insert into customer_feedbacks (customer_id, f_q_id, rating, remarks, status, created_at) values (?, ?, ?, ?, ?, ?)',
      [$customerID, 1, $request->Q1, "", 1, $currentTime]);

      $feedback = DB::insert('insert into customer_feedbacks (customer_id, f_q_id, rating, remarks, status, created_at) values (?, ?, ?, ?, ?, ?)',
      [$customerID, 2, $request->Q2, "", 1, $currentTime]);

      $feedback = DB::insert('insert into customer_feedbacks (customer_id, f_q_id, rating, remarks, status, created_at) values (?, ?, ?, ?, ?, ?)',
      [$customerID, 3, $request->Q3, "", 1, $currentTime]);

      $feedback = DB::insert('insert into customer_feedbacks (customer_id, f_q_id, rating, remarks, status, created_at) values (?, ?, ?, ?, ?, ?)',
      [$customerID, 4, "", $request->Q4, 1, $currentTime]);

      $feedback = DB::insert('insert into customer_feedbacks (customer_id, f_q_id, rating, remarks, status, created_at) values (?, ?, ?, ?, ?, ?)',
      [$customerID, 5, "", $request->Q5, 1, $currentTime]);

      DB::commit();

      return redirect('/guest')->with('message', 'Thank you for your feedback!');

    } catch (\Exception $ex) {

      DB::rollback();

      return response()->json([
        'message' => __('Failed to submit survey. Reason: ') . $ex->getMessage()
      ], 400);

    }

    }

}
