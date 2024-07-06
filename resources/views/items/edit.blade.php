@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h2>Edit Item</h2>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('items.update', $item->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $item->name) }}" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description">{{ old('description', $item->description) }}</textarea>
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{ old('price', $item->price) }}" required>
                </div>
                <div class="form-group">
                    <label for="type">Type</label>
                    <select class="form-control" id="type" name="type" required>
                        @foreach(['weapon', 'armor', 'magic'] as $type)
                            <option value="{{ $type }}" {{ old('type', $item->type) == $type ? 'selected' : '' }}>{{ ucfirst($type) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="creators">Creators</label>
                    <select multiple class="form-control" id="creators" name="creators[]">
                        @foreach($creators as $creator)
                            <option value="{{ $creator->id }}" {{ in_array($creator->id, $item->creators->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $creator->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Update Item</button>
                <a href="{{ route('items.index') }}" class="btn btn-secondary">Back to Items</a>
            </form>
        </div>
    </div>
</div>
@endsection