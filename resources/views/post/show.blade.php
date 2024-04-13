@extends('layouts.main')
@section('content')
    <div class="form-group">
        <p>{{ $post->title }}</p>
        <p>{{ $post->content }}</p>
        <a href="{{ route('post.edit', $post->id) }}"><button type="button" class="btn btn-success">Edit</button></a>
        <form action="{{ route('post.destroy', $post->id) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-success">Delete</button>
        </form>
    </div>
@endsection
