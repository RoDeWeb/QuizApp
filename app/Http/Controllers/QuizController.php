<?php
namespace App\Http\Controllers;
use App\Models\Question;
use App\Models\UserAnswer;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index()
    {
        $questions = Question::with('answers')->get();

        foreach ($questions as $question) {
            $question->multiple_answers = $question->answers->where('is_correct', 1)->count() > 1;
        }

        return view('quiz.index', compact('questions'));
    }

    public function store(Request $request)
    {
        $answers = $request->get('answers');

        foreach($answers as $questionId => $answerId) {
            // Comprobamos si $answerId es un array (para respuestas múltiples)
            if(is_array($answerId)) {
                foreach($answerId as $singleAnswerId) {
                    UserAnswer::create([
                        'user_id' => auth()->id(),
                        'answer_id' => $singleAnswerId
                    ]);
                }
            } else {
                UserAnswer::create([
                    'user_id' => auth()->id(),
                    'answer_id' => $answerId,
                ]);
            }
        }
        return redirect()->route('quiz.results');
    }

    public function results()
    {
        $userAnswers = auth()->user()->answers;
        $responses = [];

        foreach ($userAnswers as $userAnswer) {
            $question = $userAnswer->answer->question;
            $questionId = $question->id;

            $responses[] = [
                'id' => $questionId,
                'question' => $question->text,
                'chosen_answer' => $userAnswer->answer->text,
                'is_correct' => $userAnswer->answer->is_correct
            ];
        }
        return view('quiz.results', compact('responses'));
    }
}
