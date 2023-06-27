<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route('register')}}" method="POST">
    @csrf
    name :<input type="text" name="name"><br><br>
    email :<input type="text" name="email"><br><br>
    password :<input type="text" name="password"><br><br>
    <button type="submit"> Register</button>
    </form>
</body>
</html>