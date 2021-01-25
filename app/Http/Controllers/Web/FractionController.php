<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fraction;
use App\Models\Form;

class FractionController extends Controller
{
    public function showAll(){
        $data = Fraction::paginate(10);
        return view('backend.fraction',['data' => $data]);
    }

    public function search(Request $request){
        $form = $request->get('name');
        if($data = Form::where('name','like','%'.$form.'%')->first()->fraction){
            return view('backend.fraction',['data' => $data]);
        }
    }
}
