@extends('layouts.admin.main')
@section('content')

@if(Session::has('success'))
<div class="alert alert-success" role="alert">
    {{ Session::get('success*') }}
</div>
@endif

    <h1>PELER ONTAAAA</h1>
@endsection