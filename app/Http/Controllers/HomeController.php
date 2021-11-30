<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index($filterValue=5):View
    {
        return view("home")->with(['filterValue'=>$filterValue,'pageTitle'=>"Home"])
                                ->with('pageTitle','Home');
    }
}
