<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>tags</title>
</head>

<body>
    <form action="{{ route('tag.store') }}" method="POST">
        @csrf
        <label for="tagName">name of tag</label>
        <input type="text" name="name">
        <button type="submit">submit</button>
    </form>
    <a href="{{ route('tag.index') }}" class="btn btn-success">tag table</a>
</body>

</html>
