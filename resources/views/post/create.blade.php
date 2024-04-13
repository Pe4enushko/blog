@extends('layouts.main')
@section('content')
    <form action="{{ route('post.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="Title">Title</label>
            <input type="text" class="form-control" id="Title" placeholder="Title..." name="title">
        </div>
        @error('title')
            <p class="text-danger">{{ $message }}</p>
        @enderror
        <div class="form-group">
            <label for="Content">Content</label>
            <textarea class="form-control" id="Content" rows="3" placeholder="Content..." name="content"></textarea>
        </div>
        @error('content')
            <p class="text-danger">{{ $message }}</p>
        @enderror
        <div class="form-group">
            <label for="Category">Category</label>
            <select class="form-control" id="Category" name="category_id">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="Tags">Tags</label>
            <select multiple class="form-control" id="Tags" name="tag_id[]">
                @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                @endforeach
            </select>
        </div>
        <input type="submit" class="form-control" value="Add">
    </form>
@endsection
