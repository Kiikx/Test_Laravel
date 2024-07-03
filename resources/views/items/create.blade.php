<!DOCTYPE html>
<html>
<head>
    <title>Add Item</title>
</head>
<body>
    <h1>Add Item</h1>

    <form action="{{ route('items.store') }}" method="POST">
        @csrf
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="description">Description:</label>
        <textarea id="description" name="description"></textarea>

        <label for="price">Price:</label>
        <input type="number" id="price" name="price" required>

        <label for="type">Type:</label>
        <select id="type" name="type" required>
            <option value="weapon">Weapon</option>
            <option value="armor">Armor</option>
            <option value="magic">Magic</option>
        </select>

        <button type="submit">Add Item</button>
    </form>

    <a href="{{ route('items.index') }}">Back to items</a>
</body>
</html>