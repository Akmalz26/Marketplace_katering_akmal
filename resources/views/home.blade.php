<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marketplace Katering</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .navbar-brand {
            font-weight: bold;
        }
        .carousel-item {
            height: 70vh;
            background: #777;
            color: white;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .carousel-caption {
            bottom: 200px;
        }
        .section-title {
            text-align: center;
            margin: 50px 0;
        }
        .menu-item img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Katering</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#order">Order</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#menu">Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                </li>
            </ul>
        </div>
    </nav>

    <div id="home" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#home" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#home" data-bs-slide-to="1"></li>
            <li data-bs-target="#home" data-bs-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="carousel-caption">
                    <h1>Selamat Datang di Marketplace Katering</h1>
                    <p>Pesan makanan favoritmu dengan mudah</p>
                </div>
            </div>
            <div class="carousel-item">
                <div class="carousel-caption">
                    <h1>Berbagai Menu Pilihan</h1>
                    <p>Nikmati berbagai menu katering yang lezat</p>
                </div>
            </div>
            <div class="carousel-item">
                <div class="carousel-caption">
                    <h1>Mudah dan Cepat</h1>
                    <p>Proses pemesanan yang cepat dan mudah</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#home" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </a>
        <a class="carousel-control-next" href="#home" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </a>
    </div>

    <div id="order" class="container">
        <div class="section-title">
            <h2>Order Sekarang</h2>
            <p>Pilih menu favoritmu dan pesan sekarang</p>
        </div>
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <form>
                    <div class="form-group">
                        <label for="location">Lokasi</label>
                        <input type="text" class="form-control" id="location" placeholder="Masukkan lokasi">
                    </div>
                    <div class="form-group">
                        <label for="food_type">Jenis Makanan</label>
                        <input type="text" class="form-control" id="food_type" placeholder="Masukkan jenis makanan">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Cari Katering</button>
                </form>
            </div>
        </div>
    </div>

    <div id="menu" class="container">
        <div class="section-title">
            <h2>Menu</h2>
            <p>Berbagai pilihan menu katering yang tersedia</p>
        </div>
        <div class="row">
        @foreach($menus as $menu)
            <div class="col-md-4">
                <div class="card menu-item">
                    <img src="{{ asset('storage/' . $menu->image) }}" alt="{{ $menu->name }}" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">{{ $menu->name }}</h5>
                        <p class="card-text">{{ $menu->price }}</p>
                        <a href="{{ route('customer.order', $menu->id) }}" class="btn btn-primary float-end">Beli</a>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>

    <footer class="bg-light text-center text-lg-start">
        <div class="container p-4">
            <div class="row">
                <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Marketplace Katering</h5>
                    <p>
                        Kami menyediakan layanan katering terbaik dengan berbagai pilihan menu yang dapat dipilih sesuai keinginan Anda.
                    </p>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Navigasi</h5>
                    <ul class="list-unstyled mb-0">
                        <li>
                            <a href="#home" class="text-dark">Home</a>
                        </li>
                        <li>
                            <a href="#order" class="text-dark">Order</a>
                        </li>
                        <li>
                            <a href="#menu" class="text-dark">Menu</a>
                        </li>
                        <li>
                            <a href="{{ route('login') }}" class="text-dark">Login</a>
                        </li>
                        <li>
                            <a href="{{ route('register') }}" class="text-dark">Register</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Kontak</h5>
                    <ul class="list-unstyled mb-0">
                        <li>
                            <p class="text-dark">Email: info@katering.com</p>
                        </li>
                        <li>
                            <p class="text-dark">Phone: +62 812 3456 7890</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2023 Marketplace Katering. All rights reserved.
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
