@extends('layouts.layout')

@section('content')
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                Pizzas Menu
            </div>
            @foreach ($pizzas as $pizza)
                <p>{{ $pizza['type'] }}-{{ $pizza['base'] }}-{{ $pizza['price'] }}</p>
            @endforeach
        </div>
    </div>
@endsection

