@extends('layouts.app')

@section('content')
<div class="container">

    @if($errors->all())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('admin.post.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}">
            @error('title')
                <p class="alert alert-danger mt-3">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" value="{{ old('description') }}">
             @error('description')
                <p class="alert alert-danger mt-3">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content">{{ old('content') }}</textarea>
             @error('content')
                <p class="alert alert-danger mt-3">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="select" class="mr-2">Select Category: </label>
            <select id="select" class="form-select" aria-label="Default select example" name="category_id">

                <option value="" selected>Select a category</option>

                @foreach ($categories as $category)
                    <option value="{{$category->id}}"
                        @if(old('category_id') == $category->id)
                            selected
                        @endif
                        >{{$category->category}}</option>
                @endforeach

            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
