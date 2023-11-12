@extends('layout')

@section('contact')
    <form method="POST" action="{{route('posts.store')}}">
        @csrf
        @include('posts._form')
        <button type="submit" class="btn btn-success btn-block">Create</button>
    </form>

@endsection