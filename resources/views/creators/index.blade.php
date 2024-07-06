@extends('layouts.app')

@section('content')
<div class="container mt-5">

    <h1>Creators</h1>

    <a href="{{ route('creators.create') }}" class="btn btn-primary mb-4">Add Creator</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Speciality</th>
                <th>Actions</th>

            </tr>
        </thead>
        <tbody>
            @foreach($creators as $creator)
                <tr>
                    <td>{{ $creator->name }}</td>
                    <td>{{ ucfirst($creator->speciality) }}</td>
                    <td>
                        <a href="{{ route('creators.show', $creator->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('creators.edit', $creator->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('creators.destroy', $creator->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $creators->links() }}
</div>

@endsection