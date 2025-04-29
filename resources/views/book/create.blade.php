@extends('layouts.app')
@section('content')
    <div id="kt_app_content" class="app-content  pb-0 ">

        <div class="card mb-4 collapse  search-book-poster">
            <div class="card-header">
                <div class="card-title">
                   Book Poster
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <div class="card-title">
                   Add Book
                </div>
            </div>
            <div class="card-body">
                @if(isset($book))
                    <form action="{{ url('books/'.$book->id) }}" method="post">
                    @csrf
                    @method('PUT')
                @else
                    <form action="{{ url('books') }}" method="post">
                        @csrf
                @endif
                {{-- <form action="{{ url('books') }}" method="POST"> --}}
                    @csrf
                    <div class="row">
                        <div class="col-md-8">
                            {{-- book title --}}
                            <div class="form-group mb-3">
                                <label class="form-label mb-0" for="title">Book Title<span
                                        class="text-danger">*</span>
                                </label>
                                <input type="text" name="title" id="title"
                                    class="form-control @error('title') is-invalid @enderror" value="{{ old('title',  $book->title ?? '') }}"
                                    @error('title') autofocus @enderror placeholder="e.g. Java">
                                @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        {{-- book code --}}
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label class="form-label mb-0" for="code">Book Code (<code>for book
                                        issue</code>)<span class="text-danger">*</span>
                                </label>
                                <input type="text" name="code" id="code"
                                    class="form-control @error('code') is-invalid @enderror" value="{{ old('code', $book->code ?? '') }}"
                                    @error('code') autofocus @enderror placeholder="e.g. E73266">
                                @error('code')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        {{-- book author --}}
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label class="form-label mb-0" for="authors">Publisher <span class="text-danger">*</span></label>
                                <select name="publisher_id" id="publisher_id" class="form-control">
                                    <option value="">Select Publisher</option>
                                    @foreach ($publishs as $publisher)
                                        <option value="{{ $publisher->id }}"
                                            @if (old('publisher_id') == $publisher->id) selected @endif @if($publisher->id == ($book->publisher_id ?? '')) selected @endif>
                                            {{ $publisher->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('authors')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        {{--  published year --}}
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label class="form-label mb-0" for="published_year">Published Year<span
                                        class="text-danger">*</span></label>
                                <input type="text" name="published_year" id="published_year"
                                    class="form-control @error('published_year') is-invalid @enderror"
                                    value="{{ old('published_year', $book->published_year ?? '') }}" @error('published_year') autofocus @enderror>
                                @error('published_year')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        {{-- edition --}}
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label class="form-label mb-0" for="edition">Edition</label>
                                <input type="text" name="edition" id="edition"
                                    class="form-control @error('edition') is-invalid @enderror"
                                    value="{{ old('edition', $book->edition ?? '') }}" @error('edition') autofocus @enderror>
                                @error('edition')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            {{-- book language --}}
                            <div class="form-group mb-3">
                                <label class="form-label mb-0" for="language">Language<span
                                        class="text-danger">*</span></label>
                                <select class="form-control @error('language') is-invalid @enderror" name="language"
                                    id="language" @error('language') autofocus @enderror>
                                    <option value="en" @if (old('language') == 'en') selected @endif>
                                      English</option>
                                    <option value="hi" @if (old('language') == 'hi') selected @endif>
                                        Hindi</option>
                                </select>
                                @error('language')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            {{-- book copies --}}
                            <div class="form-group mb-3">
                                <label class="form-label mb-0" for="copies">Copies<span
                                        class="text-danger">*</span></label>
                                <input type="number" name="copies" id="copies"
                                    class="form-control @error('copies') is-invalid @enderror"
                                    value="{{ old('copies', $book->copies ?? '') }}" @error('copies') autofocus @enderror>
                                @error('copies')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        {{-- pages --}}
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label class="form-label mb-0" for="pages">Pages<span
                                        class="text-danger">*</span></label>
                                <input type="number" name="pages" id="pages"
                                    class="form-control @error('pages') is-invalid @enderror"
                                    value="{{ old('pages', $book->pages ?? '') }}" @error('pages') autofocus @enderror>
                                @error('pages')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    {{-- book description --}}
                    <div class="form-group mb-3">
                        <label class="form-label mb-0" for="description">Description</label>
                        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror"
                            @error('description') autofocus @enderror>{{ old('description', $book->description ?? '') }}</textarea>
                        @error('description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="form-group mb-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@push('scripts')
    <script>

        function getBookData(book) {
            let title = book.volumeInfo.title;
            let description = book.volumeInfo.description;
            let authors = book.volumeInfo.authors;
            let categories = book.volumeInfo.categories;
            let isbn = book.volumeInfo.industryIdentifiers;
            let publisher = book.volumeInfo.publisher;
            let published_year = book.volumeInfo.publishedDate;
            let pageCount = book.volumeInfo.pageCount;

            let imageLinks = book.volumeInfo.imageLinks.thumbnail;
            // put values in input fields
            $('#title').val(title);
            $('#description').val(description);
            $('#authors').val(authors.toString());
            $('#categories').val(categories.toString());
            $('#publisher').val(publisher);
            $('#published_year').val(published_year ? published_year.substring(0, 4) : '');
            $('#pages').val(pageCount);

        }
    </script>
@endpush
