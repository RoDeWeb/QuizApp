@extends('layouts.app')
@section('content')
    <form method="post" action="{{ route('quiz.store') }}">
        @csrf
        @foreach($questions as $question)
            <p>{{ $question->text }}</p>
            @foreach($question->answers as $answer)
                @if($question->multiple_answers)
                    <input type="checkbox" name="answers[{{ $question->id }}][]" value="{{ $answer->id }}"> {{ $answer->text }}<br>
                @else
                    <input type="radio" name="answers[{{ $question->id }}]" value="{{ $answer->id }}"> {{ $answer->text }}<br>
                @endif
            @endforeach
        @endforeach
        <button type="submit">Enviar respuestas</button>
    </form>
@endsection
