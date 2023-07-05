@extends('layouts.front.app')

@section('body')
<div class="container-lg">
    <div class="col-lg-8">
        <h1 class="my-4">Halaman Home
            <small>Artikel Terbaru</small>
        </h1>
        @foreach($articles as $article)
            <!-- Featured blog post-->
            <div class="card mb-4">
                <a href="#"><img class="card-img-top img-fluid" src="{{ asset('storage/'.$article->file) }}" alt="" /></a>
                <div class="card-body">
                    <div class="small text-muted">{{ date('d M Y',strtotime($article->created_at)) }}</div>
                    <h2 class="card-title">{{ $article->title }}</h2>
                    <p class="card-text">{{ Str::limit($article->content, 100) }}</p>
                    <a class="btn btn-primary" href="{{ route('article.detail',[$article->id,Str::slug($article->title)]) }}">Read more →</a>
                </div>
            </div>
        @endforeach
        {{ $articles->render() }}
    </div>
</div>
@endsection
