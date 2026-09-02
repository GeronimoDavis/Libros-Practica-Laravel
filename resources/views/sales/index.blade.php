<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sales</title>
</head>
<body> 

    <h1>Ventas del libro solicitado: {{$book->title}}</h1>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>quantity sold</th>
                <th>date of sale</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sales as $sale)
                <tr>
                    <td>{{$sale->quantity}}</td>
                    <td>{{$sale->sale_date}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>