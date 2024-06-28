<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Data Anime</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        body {
            margin: 40px;
        }
    </style>
</head>
<body>
    <form action="{{ route('anime.update', $anime->id) }}" method="POST">
        @csrf
        <label for="Title" class="form-label">Title:</label>
        <input type="text" id="Title" name="Title" class="form-control" value="{{ $anime->Title }}" required>
        <br>
        <label for="Author" class="form-label">Author:</label>
        <input type="text" id="Author" name="Author" class="form-control" value="{{ $anime->Author }}" required>
        <br>
        <label for="Eps" class="form-label">Eps:</label>
        <input type="number" id="Eps" name="Eps" class="form-control" value="{{ $anime->Eps }}" required>
        <br>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
