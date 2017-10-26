@extends('layouts.app')

@section('content')

    <h1> This is the contact page of the system</h1>

    @if(count($people))

        @foreach($people as $person)

            <ul>
                <li>{{$person}}</li>

            </ul>

        @endforeach



    @endif

    @endsection


@section('footer')

    <script>
    </script>

    @endsection