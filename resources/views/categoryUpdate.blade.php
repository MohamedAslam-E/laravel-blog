<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>category update</title>
</head>

<body>
    <form action="{{ route('category.update', $category->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <label for="categoryName">name</label>
        <input type="text" name="name" value="{{ $category->name }}">
        <button type="submit">update</button>
    </form>
    <a href="{{ route('category.indexx') }}">category table</a>
</body>

</html>
