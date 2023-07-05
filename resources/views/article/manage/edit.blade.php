@extends('layouts.front.app')
@section('body')

<div class="col-lg-8">
    <h1 class="mt-4">Ubah Artikel</h1>
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('article.update', ['article' => $article->id]) }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Kategori</label>
            <select class="form-control" name="category">
                <option value="">Pilih Kategori</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" @if($category->id == $article->category_id) selected @endif>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Judul</label>
            <input class="form-control" name="title" value="{{ old('title', $article->title) }}">
        </div>
        
        <div class="form-group">
            <label>Artikel</label>
            <textarea class="form-control" rows="4" name="content">{{ old('content', $article->content) }}</textarea>
        </div>  
        
        <div class="form-group">
            <label>File</label>
            <p><img src="{{ asset('storage/'.$article->file) }}" class="img-thumbnail" ></p>
            <input type="file" class="form-control" name="file" accept="image/*">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

@endsection
