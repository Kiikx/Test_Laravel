<!DOCTYPE html>
<html>
<head>
    <title>Add Item</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Items</h1>
        <a href="{{ route('items.index') }}" class="btn btn-danger mb-4">Back to items</a>

        <div class="card">
            <div class="card-header">
                Add Item
            </div>
            <div class="card-body">
                <form action="{{ route('items.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea id="description" name="description" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="price">Price:</label>
                        <input type="number" id="price" name="price" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="type">Type:</label>
                        <select id="type" name="type" class="form-control" required>
                            <option value="weapon">Weapon</option>
                            <option value="armor">Armor</option>
                            <option value="magic">Magic</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-info">Add Item</button>
                </form>
            </div>
