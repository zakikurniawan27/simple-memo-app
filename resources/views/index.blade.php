<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Memo App | Halaman Utama</title>
</head>
<body class="oxfordBlue container-fluid">
    <header>
        <nav class="m-3 d-flex justify-content-end">
            <div class="row">
                <div class="col">
                    @guest
                    <button class="btn btn-outline-secondary">
                        <a href="{{ route('login') }}">Login</a>
                    </button>
                    @else
                    <div class="dropdown">
                        <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <a href="{{ route('login') }}">{{ Auth::user()->name }}</a>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item text-dark" href="#">Detail</a></li>
                            <li>
                                <a class="dropdown-item text-dark" href="{{ route('logout') }}"  onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">Logout</a>
                                <form action="{{ route('logout') }}" id="logout-form" method="POST">@csrf</form>
                            </li>
                        </ul>
                    </div>
                    @endguest
                </div>
            </div>
        </nav>
    </header>
    <main class="d-flex flex-column justify-content-center">
        <section class="text-center m-5">
            <h1 class="beige fw-bolder">
                Memori App
            </h1>
            <div class="mt-5">
                <button class="btn fs-5 text-white btn-outline-secondary" type="link">
                    <a href="{{route('create', Auth::user()->id )}}" role="button"><span class="material-symbols-outlined">add</span> Create New Memo</a>
                </button>
            </div>
        </section>
        <section class="mt-3">
        @forelse($post as $pos)
        <div class="row row-cols-4">
            <div class="col">
                <div class="card spaceCadet" style="width: 18rem;">
                    <div class="card-body">
                        <form onsubmit="return confirm('Apakah Anda Yakin Menghapus Data Ini?')" action="{{ route('delete', $pos->id) }}" method="POST">
                            <h5 class="card-title">{{ $pos->title }}</h5>
                            <p class="card-text">{{ $pos->content }}</p>
                            <a href="{{ route('edit', $pos->id) }}" class="card-link btn btn-outline-secondary">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button class="card-link btn btn-outline-danger">   
                                hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="text-white text-center fs-4 fw-bold">
            Belum Tersedia
        </div>
        @endforelse
        </section>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>