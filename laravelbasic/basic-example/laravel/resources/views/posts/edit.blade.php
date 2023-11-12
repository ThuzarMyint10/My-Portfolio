@extends('layout')

@section('contact')
    <form method="POST" action="{{route('posts.update', ['post' => $post->id])}}">
        @csrf
        @method('PUT')
        @include('posts._form')
        <button type="submit" class="btn btn-success btn-block">Update</button>
    </form>

@endsection