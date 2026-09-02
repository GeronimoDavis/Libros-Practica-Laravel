<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Books</title>
</head>
<body>  

    <h1>Lista de Libros</h1>

    <a href="{{ route('books.create') }}">
        <button type="button">Nuevo Registro</button>
    </a>

    <br><br>

    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>Title</th>
                <th>price</th>
                <th>Author</th>
                <th>Category</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
                @foreach($books as $book)
                    <tr>
                        <td>{{$book->title}}</td>
                        <td>{{$book->price}}</td>
                        <td>{{$book->author->name}}</td>
                        <td>{{$book->category->name}}</td>
                        <td>
                            <a href="{{ route('sales.index', $book->book_id) }}">
                            <button type="button">Visualizar Ventas</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
        </tbody>
    </table>

</body>
</html>