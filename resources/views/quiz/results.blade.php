@extends('layouts.app')
@section('content')
    <div class="container">
        @foreach($responses as $response)
            <h3>Quiz:</h3>
            <p><strong>{{ $response['question'] }}</strong></p>
            <p>
                {{ $response['chosen_answer'] }}
                {{ $response['is_correct'] ? 'Correct' : 'Incorrect' }}
            </p>
            <hr>
        @endforeach
        <hr>
            <a href="{{ url('/quiz') }}" class="btn">Volver</a>
    </div>
@endsection
