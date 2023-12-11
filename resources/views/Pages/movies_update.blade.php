<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="post" action="{{route('movies.update', $movies->movieID)}}">
        @csrf
        @method('put')
        <input type="text" name="movieTitle" value="{{$movies->movieTitle}}">
        <input type="text" name="movieDescription" value="{{$movies->movieDescription}}">
        <input type="date" name="movieDate" value='{{$movies->movieDate}}'>
        <input type="text" name="movieGenre" value='{{$movies->movieGenre}}'>
        <input type="submit" name="submit" placeholder="submit">
    </form>



</body>

</html>