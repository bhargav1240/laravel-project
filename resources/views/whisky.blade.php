<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <form action="{{ url('whisky') }}" method="post">
        @csrf
        <input type="text" name="start_price" placeholder="starting price">
        <input type="text" name="end_price" placeholder="starting price">
        <select name="size" id="">
            @foreach ($data['sizes'] as $size)
                <option value="{{$size[0]->size}}">{{ $size[0]->size }} ml</option>    
            @endforeach
        </select>
        <button type="submit">submit</button>
    </form>
    
    @if ($data)
        <table>
            <tr>
                <th>Name</th>
                <th>Size</th>
                <th>Price</th>
            </tr>
            @foreach ($data['whiskies'] as $whisky)
                <tr>
                    <td>{{ $whisky->name }}</td>
                    <td>{{ $whisky->size }}</td>
                    <td>{{ $whisky->price }}</td>
                </tr>    
            @endforeach
        </table>
    @endif

</body>
</html>