<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FeedbackRatingController extends Controller
{
    public function create(){
      return view('feedback-rating.form');
    }
}
