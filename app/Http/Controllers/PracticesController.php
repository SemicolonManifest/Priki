<?php

namespace App\Http\Controllers;

use App\Models\Practice;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;


class PracticesController extends Controller
{
    public function show($id):View|RedirectResponse
    {
        $practice = Practice::find($id);
        if(null == $practice || "PUB" != $practice->publicationState->slug ){
            return redirect()->route('home');
        }else{
            return view("practice")->with(['practice' => $practice]);
        }

    }
}
