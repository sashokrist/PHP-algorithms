@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Numeric Array') }}</div>
                    <div class="card-body">
                        @foreach($array as $key => $item)
                            Array: {{ $item }} <br>
                           Position: {{ $key }} holds value: {{ $item }}<br>
                        @endforeach
                        <h2>associative array</h2>
                            @foreach($studentInfo as $key => $value)
                                 {{ $key.": ".$value}} <br>
                            @endforeach
                            <h2>Multi array</h2>
                            @foreach($players as $index => $playerInfo)
                                {{ "Info of player # ".($index+1) }} <br>
                                @foreach($playerInfo as $key => $value)
                                    {{ $key.": ".$value }} <br>
                                @endforeach
                                <br>
                            @endforeach
                            <h2>Bubble Sort</h2>
                            Before sort:    @foreach($arr as $item)
                               {{ $item }}
                            @endforeach <br>
                            Bubble Sorted: @foreach($bubbleSort as $sort)
                                {{ $sort }}
                            @endforeach <br>
                            Selection Sort: @foreach($selectionSort as $selection)
                                       {{ $selection }}
                            @endforeach <br>
                            Selection Sort DESC @foreach($selectionSortDesc as $desc)
                                       {{ $desc }}
                            @endforeach
                            <div class="card-header">{{ __('Algorithms') }}</div>
                        @foreach($books as $book)
                            {{ $book[0] }}{{ $book[1] }}{{ $book[2] }}
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
