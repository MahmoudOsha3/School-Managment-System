<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\{Question , Degree , ReportDegreeQuizze } ;

class ShowQuestions extends Component
{
    public $quizze_id , $questions , $student_answer ,
            $numberQuestion = 0 , $total_questions ,
            $total_score_student = 0 ;

    public function render()
    {
        $questions = $this->showQuestion() ;
        $this->total_questions = $questions->count() ;
        return view('livewire.show-questions' , ['quizze_id' , 'questions']);
    }

    public function showQuestion()
    {
        $this->questions = Question::where('quizze_id' , $this->quizze_id )->get() ;
        return $this->questions ;
    }

    public function nextQuestion($question_id , $student_answer)
    {
        // $student_quizze_before = Degree::where(['student_id' => auth()->user()->id , 'quizze_id' => $quizze_id ])->first() ;
        $question = Question::where('id' , $question_id)->first() ;
        $score_student = 0 ;

        // check answer is correct or wrong
        if (strcmp( trim($student_answer) , $question->right_answer ) === 0)
        {
            $score_student += $question->score ;
        }
        else
        {
            $score_student += 0 ;
        }
        Degree::updateOrcreate(
            [
                'student_id' => auth()->user()->id ,
                'quizze_id' => $question->quizze_id,
                'question_id'=> $question_id,
            ]
            ,[
            'student_id' => auth()->user()->id ,
            'quizze_id' =>$question->quizze_id,
            'question_id' => $question_id,
            'score' => $score_student ,
            'abuse' => 1 ,
            'date' => date('y-m-d') ,
        ]);
        if($this->numberQuestion < $this->total_questions - 1 )
        {
            return $this->numberQuestion++ ;
        }
        // finish quizze
        else
        {
            $this->total_score_student = Degree::where(['student_id' => auth()->user()->id , 'quizze_id' => $question->quizze_id ])->sum('score');
            ReportDegreeQuizze::create([
                'student_id' => auth()->user()->id ,
                'quizze_id' =>  $question->quizze_id ,
                'score_student' => $this->total_score_student ,
                'score_quizze' => $question->where('quizze_id' , $question->quizze_id  )->sum('score') ,
            ]);
        }
    }

    public function backQuestion()
    {
        if($this->numberQuestion > 0 )
        {
            return $this->numberQuestion-- ;
        }
    }

}
