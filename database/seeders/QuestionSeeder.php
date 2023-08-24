<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Question;
use App\Models\Answer;
class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $question1 = Question::create(['text' => '¿De qué color es la silla?']);
        Answer::create(['text' => 'Rojo', 'question_id' => $question1->id, 'is_correct' => false]);
        Answer::create(['text' => 'Verde', 'question_id' => $question1->id, 'is_correct' => true]);
        Answer::create(['text' => 'Azul', 'question_id' => $question1->id, 'is_correct' => false]);

    }
}
