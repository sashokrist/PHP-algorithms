@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Search') }}</div>

                    <div class="card-body">
                        @foreach($arr as $key => $value)
                           key: {{ $key }} value: {{ $value }} <br>
                        @endforeach
                        <form action="{{ route('search-result') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <input type="hidden" value="{{ json_encode($arr, true) }}" name="arr">
                                <label for="exampleInputEmail1">Number to search</label>
                                <input type="number" name="number" class="form-control" id="exampleInputEmail1"  placeholder="Enter number to search">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
