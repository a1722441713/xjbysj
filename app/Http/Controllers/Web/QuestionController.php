<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;

class QuestionController extends Controller
{
    public function showAll(){
        $questions = Question::paginate(10);
        return view('backend.question',['data' => $questions]);
    }

    public function add(Request $request){
        $question_data = [
            'type_id' => 1,
            'text' => $request->get('question'),
            'answer_one' => $request->get('answer_one'),
            'answer_two' => $request->get('answer_two'),
            'answer_three' => $request->get('answer_three'),
            'answer_four' => $request->get('answer_four'),
        ];

        if($question = Question::create($question_data)){
            $answer_data = [
                'question_id' => $question->id,
                'option_one' => $request->get('option_one'),
                'option_two' => $request->get('option_two'),
                'option_three' => $request->get('option_three'),
                'option_four' => $request->get('option_four'),
            ];
            if(Answer::create($answer_data)){
                return redirect()->route('show.all.question');
            }
        }else{
            return redirect()->back();
        } 
    }

    public function search(Request $request){
        $question = $request->get('name');
        if($data = Question::where('text','like','%'.$question.'%')->paginate(10)){
            return view('backend.question',['data' => $data]);
        }
    }

    public function showUpdateForm($id){
        $question = Question::findOrFail($id);  
        return view('backend.setquestion',['data' => $question]);
    }

    public function del($id){
        $question = Question::findOrFail($id);
        if($question->delete()){
            return redirect()->route('show.all.question');
        }else{
            return redirect()->back();
        }
    }

}
