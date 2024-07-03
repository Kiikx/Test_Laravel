<!DOCTYPE html>
<html>
<head>
    <title>Items</title>
</head>
<body>
    
    <form action="{{ route('items.index') }}" method="GET">
        <label for="type">Filtrer par type :</label>
        <select name="type" id="type" onchange="this.form.submit()">
            <option value="">Tous</option>
            @foreach(App\Models\Item::TYPES as $type)
            <option value="{{ $type }}" {{ request('type') == $type ? 'selected' : '' }}>{{ ucfirst($type) }}</option>
            @endforeach
        </select>
    </form>


    <h1>Items</h1>
    <a href="{{ route('items.create') }}">Add item</a>

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
                <th>Description</th>
                <th>Price</th>
                <th>Type</th>
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
                        <a href="{{ route('items.show', $item->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('items.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('items.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>