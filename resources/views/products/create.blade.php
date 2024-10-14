<div>
    <!-- Nothing in life is to be feared, it is only to be understood. Now is the time to understand more, so that we may fear less. - Marie Curie -->
</div>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name='name'>
        <input type="text" name='description'>
        <input type="file" name='image'>
        <button type="submit">Submit</button>

    </form>
</body>
</html>