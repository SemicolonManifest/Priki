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
            $error = false;
            if(isset($_SESSION['error'])) {
                $error = $_SESSION['error'];
                unset($_SESSION['error']);
            }
            return view("practice")->with(['practice' => $practice,'error'=>$error]);
        }

    }

    public function editTitle($id)
    {
        $practice = Practice::find($id);
        $oldTitle = $practice->title;
        if(strlen($_POST['newtitle']) >= 3 && strlen($_POST['newtitle']) <= 40)
        {
            if(0 == Practice::where('title', '=', $_POST['newtitle'])->get()->count())
            {
                $practice->title = $_POST['newtitle'];
                $practice->save();
            }else{
                $_SESSION['error'] = "Ce titre existe déjà !";
            }
        }else{
            $_SESSION['error'] = "Le titre doit être compris entre 3 et 40 caractères !";
        }

        return back();

    }
}
