@extends('layouts.front.app')
@section('body')

<div class="col-lg-8">
    <h1 class="mt-4">Manage Artikel</h1>
    <p class="lead"><a href="{{ route('article.create') }}">Tambah Artikel</a></p>
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <table class="table table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Judul</th>
                <th scope="col">Kategori</th>
                <th scope="col">Artikel</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        @foreach ($articles as $index => $article)
            <tr>
                <td scope="row">{{ $index+1 }}</td>
                <td scope="row"><a href="{{ route('article.detail',[$article->id,Str::slug($article->title)]) }}">{{ $article->title }}</a></td>
                <td scope="row"> {{ $article->category->name }}</td>
                <td scope="row">{{ Str::limit($article->content, 200) }}</td>
                <td scope="row"><a href="{{ route('article.edit',$article->id) }}">Edit</a></td>
                <td scope="row"><a href="{{ route('article.delete',$article->id) }}">Delete</a></td>
            </tr>
        @endforeach
    </table>
    {{ $articles->render() }}
</div>
@endsection

