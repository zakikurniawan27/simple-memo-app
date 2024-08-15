<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Memo App | Halaman Edit {{ $ubah->title }}</title>
</head>
<body class="oxfordBlue container-fluid">
    <header class="mb-5">
        <nav class="m-3 d-flex justify-content-end">
            <div class="row">
                <div class="col">
                    <button class="btn btn-outline-secondary">
                        <a href="">Login</a>
                    </button>
                </div>
            </div>
        </nav>
    </header>
    <main class="d-flex justify-content-center mt-5">
        <section>
            <div class="card spaceCadet text-center pb-1" style="width: 30rem; height: full">
                <div class="card-body">
                    <h5 class="card-title">Edit Memo {{ $ubah->title }}</h5>
                    <form action="{{ route('update', $ubah->id) }}" class="row row-cols-1 justify-content-center" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="col-10">
                            <label for="inputTitle" class="form-label">Title</label>
                            <input name="title" type="text" class="form-control" id="inputTitle" placeholder="Masukan Title" value="{{ $ubah->title }}">
                        </div>
                        @error('title')
                        <div>
                            {{ $message }}
                        </div>
                        @enderror
                        <div class="col-10">
                            <label for="inputContent" class="form-label">Content</label>
                            <textarea name="content" id="inputContent" cols="30" rows="5" class="form-control" placeholder="Masukan Content">{{ $ubah->content }}</textarea>
                        </div>
                        @error('content')
                        <div>
                            {{ $message }}
                        </div>
                        @enderror
                        <div class="col mt-2">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</body>
</html>