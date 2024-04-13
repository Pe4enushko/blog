@extends('layouts.main')
@section('content')
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Content</th>
                <th scope="col">Category</th>
                <th scope="col">Tags</th>
                <th scope="col">Created at</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <th scope="row">{{ $post->id }}</th>
                    <td><a href="{{ route('post.show', $post->id) }}">{{ $post->title }}</a></td>
                    <td>{{ $post->content }}</td>
                    <td>{{ $post->category->title }}</td>
                    <td>
                        @foreach ($post->tags as $index => $tag)
                            @if ($index < $post->tags->count() - 1)
                                {{ $tag->title }},
                            @else
                                {{ $tag->title }}
                            @endif
                        @endforeach
                    </td>
                    <td>{{ $post->created_at }}</td>
                </tr>
            @endforeach

        </tbody>
    </table>
    <div>
        <a href="{{ route('post.create') }}"><button type="button" class="btn btn-success">Add post</button></a>
        <form action="{{ route('post.restore') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-success">Rollback posts</button>
        </form>
    </div>
@endsection
