@extends('layouts.app')
@section('title', 'Author')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header align-items-between">
                <h1>Books</h1>
                <div class="d-flex justify-content-end">
                    <a href="{{ url('books/create') }}" class="btn btn-primary">Add Book</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Book Code</th>
                                <th>Publisher</th>
                                <th>Publisher Year</th>
                                <th>Language</th>
                                <th>Copy</th>
                                <th>Pages</th>
                                <th>Description</th>
                                <th>Edition</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($books as $book)
                                <tr>
                                    <td>{{ $book->title ?? '-' }}</td>
                                    <td>{{ $book->code ?? '-' }}</td>
                                    <td>{{ $book->publish->name ?? '' }}</td>
                                    <td>{{ $book->published_year ?? '-' }}</td>
                                    <td>{{ $book->language ?? '-' }}</td>
                                    <td>{{ $book->copies ?? '-' }}</td>
                                    <td>{{ $book->pages ?? '-' }}</td>
                                    <td>{{ $book->description ?? '-' }}</td>
                                    <td>{{ $book->edition ?? '-' }}</td>
                                    <td>
                                        <a href="{{ url('books/'.$book->id.'/edit') }}" class="btn btn-warning ">Edit</a>
                                        <form action="{{ url('books', $book->id) }}" method="POST" style="display:inline;" class="deletebtn">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            @if($books->isEmpty())
                                <tr>
                                    <td colspan="10" class="text-center">No books found</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('.deletebtn').on('click', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.submit();
                    }
                });
            });
        });
    </script>
    
@endpush
