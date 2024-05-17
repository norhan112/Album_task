@extends('layout.app')

@section('content')
<div class="jumbotron text-center">
    <h1>Welcome to the Album Dashboard</h1>
    <p class="lead">Manage your albums easily and efficiently.</p>
    <a href="{{ route('albums.index') }}" class="btn btn-primary btn-lg">View Albums</a>
    <a href="{{ route('albums.create') }}" class="btn btn-success btn-lg">Create New Album</a>
</div>
@endsection
