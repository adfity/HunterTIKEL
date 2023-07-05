@extends('layouts.front.app')
@section('body')

<div class="col-lg-8">
    <h1 class="mt-4">Manage Artikel</h1>
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('article.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Kategori</label>
            <select class="form-control" name="category">
                <option value="">Pilih Kategori</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Judul</label>
            <input type="text" class="form-control" name="title">
        </div>

        <div class="form-group">
            <label>Artikel</label>
            <textarea class="form-control" rows="4" name="content"> </textarea>
        </div>

        <div class="form-group">
            <label>File</label>
            <input type="file" class="form-control" name="file" accept="image/*">
        </div>

        <button type="submit" class="btn btn-primary">Create</button>

        </div>
    </form>
@endsection