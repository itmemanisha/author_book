@extends('layouts.app')
@section('title', 'Author')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h1>Authors</h1>
                <div class="d-flex justify-content-end">
                    <a href="{{ url('authors/create') }}" class="btn btn-primary">Add Author</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>About</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($authors as $author)
                                <tr>
                                    <td>{{ $author->name }}</td>
                                    <td>{{ $author->about ?? '-' }}</td>
                                    <td>
                                        <a href="{{ url('authors/'.$author->id) }}" class="btn btn-info">View</a>
                                        <a href="{{ url('authors/'.$author->id.'/edit') }}" class="btn btn-warning ">Edit</a>
                                        <form action="{{ url('authors', $author->id) }}" method="POST" style="display:inline;" class="deletebtn">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            @if($authors->isEmpty())
                                <tr>
                                    <td colspan="2" class="text-center">No authors found</td>
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
