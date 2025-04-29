@extends('layouts.app')
@section('title', 'publish')

@section('content')
    <div class="container">
        <h1>Publishers</h1>
        <div class="d-flex justify-content-end">
            <a href="{{ route('publishers.create') }}" class="btn btn-primary">Add Publish</a>
        </div>
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
                    @foreach($publishers as $publish)
                        <tr>
                            <td>{{ $publish->name }}</td>
                            <td>{{ $publish->about ?? '-' }}</td>
                            <td>
                                <a href="{{ url('publishers/'.$publish->id) }}" class="btn btn-info">View</a>
                                <a href="{{ url('publishers/'.$publish->id.'/edit') }}" class="btn btn-warning ">Edit</a>
                                <form action="{{ url('publishers', $publish->id) }}" method="POST" style="display:inline;" class="deletebtn">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    @if($publishers->isEmpty())
                        <tr>
                            <td colspan="2" class="text-center">No publishers found</td>
                        </tr>
                    @endif
                </tbody>
            </table>
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
