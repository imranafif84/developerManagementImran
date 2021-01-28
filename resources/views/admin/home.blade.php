@extends('layouts.app')

@section('content')
    <div id="app2">
        <App 
            :user-name='@json(auth()->user()->name)' 
            :user-id='@json(auth()->user()->id)'
        ></App>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
@endsection
