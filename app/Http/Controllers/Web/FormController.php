<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Form;
use App\Models\Question;
use Illuminate\Support\Str;

class FormController extends Controller
{
    public function showAll(){
        $forms = Form::paginate(10);
        return view('backend.form',['data' => $forms]);
    }

    public function add(Request $request){
        $generate_number = $request->get('generate_number');
        $text = $this->random_question($generate_number);
        if($text == ""){
            return redirect()->route('show.all.form')->with('tip', '生成失败！    原因：题目库数量小于生成数量');
        }
        $form = [
            'name' => $request->get('name'),
            'url' => Str::random(18),
            'question_id_value' => $text,
            'start_time' => $request->get('start_time'),
            'end_time' => $request->get('end_time'),
        ];
        if(Form::create($form)){
            return redirect()->route('show.all.form');
        }else{
            return redirect()->back();
        }
        
    }


    // 随机题目
    public function random_question($generate_number){
        $text = '';
        // 定位
        $p = 0;
        $questions = Question::all();
        $question_number = $questions->count();
        if($question_number < $generate_number){
            return $text;
        }
        $multiple = floor($question_number / $generate_number);
        for($i = 0; $i < $generate_number; $i++){
            //步数
            $step = random_int(1,$multiple); 
            $p += $step;
            // question_id
            $question_id =  $questions[$p-1]->id;
            $text = $text.$question_id.',';
        }
        return $text;
    }
}
