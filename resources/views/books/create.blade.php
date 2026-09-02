<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Register Books</title>
</head>
<body>  

    <h1>Register libros</h1>

    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <div>
            <label>Categoria:</label>
            <select name="category_id">
                <option value="">Selecciona una categoria</option>
                @foreach($categories as $category)
                    <option value="{{$category->category_id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <br>
        <div>
            <label>Autores:</label>
            <select name="author_id">
                <option value="">Selecciona un autor</option>
                @foreach($authors as $author)
                    <option value="{{$author->author_id}}">{{$author->name}}</option>
                @endforeach
            </select>
        </div>
        <br>
        <div>
            <label>Titulo:</label>
            <input type="text" name="title" required placeholder="Titulo del libro">
        </div>
        <br>
        <div>
            <label>Precio:</label>
            <input type="number" name="price" required placeholder="Precio del libro">
        </div>
        <br>
        <button type="submit">Registrar libro</button>
    </form>

</body>
</html>