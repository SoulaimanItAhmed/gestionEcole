<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form action="{{route('admin.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        Image :<input type="file" name="image"><br>
        Titre :<input type="text" name="titre"><br>
        Contenu :<input type="text" name="contenu"><br>
        User Id :<input type="text" name="user_id">
        <button type="submit">Enregistrer</button>
    </form>
</body>

</html>
