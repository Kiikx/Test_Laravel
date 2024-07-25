@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <form action="{{ route('items.index') }}" method="GET" class="form-inline mb-4">
        <div class="form-group mr-2">
            <label for="type" class="mr-2">Filtrer par type :</label>
            <select name="type" id="type" class="form-control" onchange="this.form.submit()">
                <option value="">Tous</option>
                @foreach(App\Models\Item::TYPES as $type)
                <option value="{{ $type }}" {{ request('type') == $type ? 'selected' : '' }}>{{ ucfirst($type) }}</option>
                @endforeach
            </select>
        </div>
    </form>

    <h1 class="mb-4">Items</h1>
    <a href="{{ route('items.create') }}" class="btn btn-primary mb-4">Add item</a>

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

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Type</th>
                <th>Creators</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->description }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ ucfirst($item->type) }}</td>
                    <td>
                        @foreach($item->creators as $creator)
                            <a class="badge badge-secondary" href="/creators/{{ $creator->id }}">{{ $creator->name }}</a>
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('items.show', $item->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('items.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('items.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $items->links() }}
</div>


@endsection
 