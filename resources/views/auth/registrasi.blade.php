<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <title>Memo App | Registrasi</title>
</head>
<body class="oxfordBlue container">
    <main class="d-flex justify-content-center mt-5">
        <section>
            <div class="card spaceCadet text-center pb-2" style="width: 30rem; height: full">
                <div class="card-body">
                    <h5 class="card-title">Registrasi</h5>
                    <form action="{{ route('reg') }}" class="row row-cols-1 justify-content-center" method="POST">
                        @csrf
                        <div class="input-group col-9 mt-2 mb-3">
                            <span class="input-group-text material-symbols-outlined" id="person">person</span>
                            <input name="name" type="text" class="form-control" id="inputTitle" placeholder="Masukan Nama" value="{{ old('name') }}" aria-label="name" aria-describedby="name">
                        </div>
                        @error('name')
                        <div>
                            {{ $message }}
                        </div>
                        @enderror
                        <div class="input-group col-9 mb-3">
                            <span class="input-group-text material-symbols-outlined" id="mail">mail</span>
                            <input name="email" type="email" class="form-control" id="inputTitle" placeholder="Masukan Email" value="{{ old('email') }}" aria-label="email" aria-describedby="mail">
                        </div>
                        @error('email')
                        <div>
                            {{ $message }}
                        </div>
                        @enderror
                        <div class="input-group col-9 mb-1">
                            <span class="input-group-text material-symbols-outlined" id="pass">lock</span>
                            <input name="password" type="password" class="form-control" placeholder="Masukan Password" aria-label="password" aria-describedby="pass">
                        </div>
                        @error('password')
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
</body>
</html>