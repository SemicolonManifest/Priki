<?php

namespace App\Http\Controllers;

use App\Models\Practice;
use App\Policies\practiceEditionPolicy;
use Illuminate\Auth\Middleware\Authorize;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Policies;


class PracticesController extends Controller
{
    public function show($id):View|RedirectResponse
    {
        $practice = Practice::find($id);
        if(null == $practice || "PUB" != $practice->publicationState->slug ){
            return redirect()->route('home');
        }else{
            $error = false;
            if(session()->exists('error')) {
                $error = session('error');
                session()->forget('error');
            }
            return view("practice")->with(['practice' => $practice,'error'=>$error]);
        }

    }

    public function editTitle($id)
    {

        $practice = Practice::find($id);
        // TODO ajouter la vérification si modérateur ou proprio
        $oldTitle = $practice->title;
        if(strlen($_POST['newtitle']) >= 3 && strlen($_POST['newtitle']) <= 40)
        {
            if(0 == Practice::where('title', '=', $_POST['newtitle'])->get()->count())
            {
                $practice->title = $_POST['newtitle'];
                $practice->save();
            }else{
                session(['error'=> "Ce titre existe déjà !"]);
            }
        }else{
            session(['error'=> "Le titre doit être compris entre 3 et 40 caractères !"]);
        }

        return back();

    }
}
