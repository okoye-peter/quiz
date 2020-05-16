<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>resize image</title>
</head>
<body>
    <form action="/change" method="post" enctype="multipart/form-data">
        <input type="file" name="pic">
        <input type="submit" value="resize">
        @csrf
    </form>
</body>
</html>