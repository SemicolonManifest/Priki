<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DomainPracticesController extends Controller
{
    public function index($domainSlug):View
    {

        if("all" != $domainSlug){
            $domain = Domain::where('slug',$domainSlug)->get();

            return view("domainPractices")->with(['pageTitle'=>"Domaine: ".$domain[0]->name])
                                                ->with(['domainSlug'=>$domain[0]->slug]);
        }else{
            return view("domainPractices")->with(['pageTitle'=>"Domaine: Tous"])
                                                ->with(['domainSlug'=>"all"]);
        }

    }
}
