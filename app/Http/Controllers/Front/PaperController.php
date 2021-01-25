<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Form;
use App\Models\Question;
use App\Models\Student;
use App\Models\Fraction;
use Exception;
use Carbon\Carbon;

class PaperController extends Controller
{


    public function show($url_name){
        $form = Form::where('url','=',$url_name)->first();
        $now_time = Carbon::now(); 
        $start_time = Carbon::parse($form->start_time);
        $end_time = Carbon::parse($form->end_time);
        if($start_time->gt($now_time) || $now_time->gt($end_time)){
            return redirect()->route('show.tip')->with('tip', '考试时间未开始或者考试时间已结束');
        }
        $question_id = explode(",",$form->question_id_value);
        for($i = 0; $i < count($question_id)-1 ; $i++){
            $question[$i] = Question::findOrFail($question_id[$i]);
        }
        
        return view('frontend.paper',['questions' => $question,'name' => $form->name]);
    }

    public function save(Request $request){
        try{
            $student_data = [
                'name' => $request->get('name'),
                'email' => $request->get('email'),
            ];
            $fraction = 0;   
            $form = Form::where('name','=',$request->get('form_name'))->first();
            $now_time = Carbon::now();
            $end_time = Carbon::parse($form->end_time);
            if($now_time->gt($end_time)){
                return redirect()->route('show.tip')->with('tip', '考试时间已结束,禁止提交');
            }
            $question_id = explode(",",$form->question_id_value);
            for($i = 0; $i < count($question_id)-1 ; $i++){
                $answer = Question::findOrFail($question_id[$i])->answer;
                switch($request->get($question_id[$i])){
                    case $answer->option_one:
                        $fraction += 5;
                        break;
                    case $answer->option_two:
                        $fraction += 3;
                        break;
                    case $answer->option_three:
                        $fraction += 1;
                        break;
                    case $answer->option_one:
                        $fraction += 0;
                        break;
                }
            }
            $student = Student::create($student_data);
            $fraction_data = [
                'student_id' => $student->id,
                'form_id' => $form->id,
                'fraction' => $fraction,
            ];
            Fraction::create($fraction_data);
            return redirect()->route('show.tip')->with('tip', '提交成功！');
        }catch(Exception $e){
            return redirect()->back()->with('tip', '网络异常,请重新提交！');
        }
        
    }
        

    public function tip(){
        return view('frontend.tip');
    }
}
