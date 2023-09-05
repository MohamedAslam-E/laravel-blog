<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>

    </style>
</head>

<body>
    <nav class="navbar navbar-light bg-dark justify-content-between">
        <a class="navbar-brand text-white">Navbar</a>
    </nav>
    <section class="">
        {{-- <img width="500px" height="500px" src="{{ asset('images/planes.jpg') }}" alt="image"> --}}
        <p class="content">Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti delectus animi excepturi,
            debitis cumque error maiores assumenda saepe at velit aspernatur culpa facilis asperiores quis tenetur
            repudiandae aliquam adipisci quia.</p>
    </section>
    <div class="container">
        <a href="{{ route('category.create') }}" class="btn btn-success">add category</a>
        <a href="{{ route('tag.create') }}" class="btn btn-success">add tags</a>
        {{-- <a href="{{ route('post.index') }}" class="btn btn-success">posts</a> --}}
        <form action="{{ route('post.store') }}" method="POST">
            @csrf
            <div class="form-group col-6 container">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control">
            </div>
            <div class="form-group col-6 container">
                <label for="content">Description</label>
                <textarea name="description" class="form-control" rows="2"></textarea>
            </div>
            <div class="form-group col-6 container">
                <label for="exampleFormControlSelect1">Category</label>
                <select class="form-control" id="exampleFormControlSelect1" name="category_id">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-6 container">
                <label for="tagSelect">Tags</label>
                <select multiple class="form-control" id="tagSelect" name="tag_ids[]">
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit">submit</button>
        </form>
    </div>
</body>

</html>
