<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Anime</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        body {
            margin: 40px;
        }
        .th, td {
            text_align: center;
        }
    </style>
</head>
<body>
    <form action="{{ route('logout') }}" method="post">
        @csrf
        <button class="btn btn-danger" type="submit">Logout</button>
    </form>
    <br>
    <h4>RESPONSI PPW - L0122009 - Akhras Athiyah</h4>
    <h4>Tabel Anime</h4>
    <table class="table" border="1px" style="padding: 5px">
        <thead class="table-dark">
            <th>No.</th>
            <th>Title</th>
            <th>Author</th>
            <th>Eps</th>
            <th>Edit</th>
            <th>Delete</th>
        </thead>
        <?php $i = 1;?>
        @foreach ($animedata as $key=>$value)
        <tr>
            <td>{{ $i }}</td>
            <td>{{ $value->Title }}</td>
            <td>{{ $value->Author }}</td>
            <td>{{ $value->Eps }}</td>
            <td><a href="{{ route('anime.edit', $value->id) }}">Edit</a></td>
            <td><a onclick="return confirm('Anda yakin akan menghapus data ini?')" href="{{ route('anime.delete', $value->id) }}">Delete</a></td>
        </tr>
        <?php $i++; ?>
        @endforeach
        <tr>
            <td colspan="6"><a href="{{ route('anime.create') }}">Create New</a></td>
        </tr>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
