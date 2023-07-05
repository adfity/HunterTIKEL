@extends('layouts.front.app')
@section('body')

<link href="{{ asset('badmin/css/stcom.css') }}" rel="stylesheet" />
    <!-- Page content-->
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8">
                <!-- Post content-->
                <article>
                    <!-- Post header-->
                    <header class="mb-4">
                        <!-- Post title-->
                        <h1 class="fw-bolder mb-1">{{ $article->title }}</h1>
                        <!-- Post meta content-->
                        <div class="text-muted fst-italic mb-2">{{ date('d M Y', strtotime($article->created_at)) }}</div>
                        <!-- Post categories-->
                        <a class="badge bg-secondary text-decoration-none link-light" href="#">{{ $article->category->name }}</a>
                    </header>
                    <!-- Preview image figure-->
                    <figure class="mb-4"><img class="img-fluid rounded" src="{{ asset('storage/'.$article->file) }}" alt="" ></figure>
                    <!-- Post content-->
                <section class="mb-5">
                    <p class="fs-5 mb-4">{{ $article->content }}</p>
                </section>
                
                <div class="comments">
                    <h3>Komentar</h3>
                    
                @foreach($comments as $comment)
                    <div class="comment">
                        <h4>{{ $comment->name }}</h4>
                        <p>{{ $comment->content }}</p>
                    </div>
                @endforeach
                
                    
                    <form action="{{ route('comment.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Nama:</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Komentar:</label>
                            <textarea name="content" class="form-control"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Kirim Komentar</button>
                    </form>
                </div>
                </article>
            </div>
        </div>
    </div>
@endsection
