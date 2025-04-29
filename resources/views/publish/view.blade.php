@extends('layouts.app')
@section('title', 'publish')

@section('content')
    <div class="container">
        <div class="card mt-3">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h1>Publishs</h1>
                    <a href="{{ url('books/create') }}" class="btn btn-primary">Add Book</a>
                </div>
            </div>
            <div class="card-body">
                <h2>{{ $publish->name }}</h2>
                <p>{{ $publish->about }}</p>
            </div>
        </div>
    </div>
@endsection

