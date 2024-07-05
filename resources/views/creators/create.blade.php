<!DOCTYPE html>
<html>
<head>
    <title>Add Item</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h2>Create Creator</h2>
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

            <form action="{{ route('creators.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                </div>
                <div class="form-group">
                    <label for="speciality">Speciality</label>
                    <select class="form-control" id="speciality" name="speciality" required>
                        @foreach(['Blacksmith', 'Armorer', 'enchanter'] as $speciality)
                            <option value="{{ $speciality }}" {{ old('specliality') == $speciality ? 'selected' : '' }}>{{ ucfirst($speciality) }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Create Creator</button>
                <a href="{{ route('creators.index') }}" class="btn btn-secondary">Back to Creators</a>
            </form>
        </div>
    </div>
</div>