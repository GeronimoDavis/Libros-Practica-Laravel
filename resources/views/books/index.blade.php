<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Transacciones - Gestor de Gastos</title>
</head>
<body>  

    <h1>Lista de Libros</h1>

    <a href="{{ route('books.store') }}">
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
                        <td>action</td>
                    </tr>
                @endforeach
        </tbody>
    </table>

</body>
</html>