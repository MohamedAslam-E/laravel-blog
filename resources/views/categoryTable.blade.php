<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>category table</title>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($category as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td>
                        <a href="{{ route('category.edit', $item->id) }}" class="btn">edit</a>
                        <form action="{{ route('category.delete', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
