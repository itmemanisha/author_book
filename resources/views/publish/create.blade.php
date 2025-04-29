@extends('layouts.app')
@section('title', 'Create Author')
@section('content')
    <div class="card w-50 m-auto mt-5">
        <div class="card-body">
            @if(isset($publisher))
                <form action="{{ route('publishers.update',['id'=>$publisher->id]) }}" method="post">
                @csrf
                @method('PUT')
            @else
                <form action="{{ route('publishers.store') }}" method="post">
                    @csrf
            @endif
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $publisher->name ?? '') }}" >
                    @error('name')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                    <label for="about" class="form-label">About</label>
                    <input type="text" class="form-control" id="about" name="about" value="{{ old('about', $publisher->about ?? '') }}" >
                    @error('about')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection