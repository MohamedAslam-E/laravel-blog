<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>post</title>
</head>

<body>
    @foreach ($posts as $post)
    <div>
        <h2>{{ $post->title }}</h2>
        <p>{{ $post->description }}</p>
        <p>Category: {{ $post->category->name }}</p>
        <p>Tags:
            @foreach ($post->tags as $tag)
                {{ $tag->name }}
            @endforeach
        </p>
    </div>
    @endforeach
</body>

</html>
