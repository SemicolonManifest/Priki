<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DomainPracticesController extends Controller
{
    public function index($domainSlug):View
    {
        $practices=[];

        $domain = Domain::where('slug',$domainSlug)->get();

        if(isset($domain[0])) $practices = $domain[0]->practices;

        return view("domainPractices")->with(['practices'=>$practices]);
    }
}
