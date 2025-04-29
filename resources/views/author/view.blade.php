@extends('layouts.app')
@section('title', 'Author')

@section('content')
    <div class="container">
        <div class="card mt-3">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h1>Authors</h1>
                <div class="d-flex justify-content-end w-100">
                    <a href="{{ route('publishers.create') }}" class="btn btn-primary me-3">Add Publish</a>
                    <a href="{{ url('books/create') }}" class="btn btn-primary">Add Book</a>
                </div>
            </div>
            <div class="card-body">
                <h2>{{ $author->name }}</h2>
                <p>{{ $author->about }}</p>
            </div>
        </div>
    </div>
@endsection

