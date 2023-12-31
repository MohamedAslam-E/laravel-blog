<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>tag table</title>
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
            @foreach ($tags as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td>
                        <a href="{{ route('tag.edit', $item->id) }}" class="btn">edit</a>
                        <form action="{{ route('tag.destroy', $item->id) }}" method="POST">
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
