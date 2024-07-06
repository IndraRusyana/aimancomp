<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Store Homepage - Aiman Comp</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('assets/css/store-styles.css')}}" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="/store">
                    <img src="{{asset('assets\img\icons\brands\aiman.png')}}" alt="" srcset="" width="40">
                    Aiman Comp
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            </div>
        </nav>
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">
                        
                        Aiman Comp
                    </h1>
                    <p class="lead fw-normal text-white-50 mb-0">#trustno1</p>
                </div>
            </div>
        </header>
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    @foreach ($query as $item)
                        <div id="sell_{{$item->id}}" class="col mb-5">
                            <div class="card h-100">
                                <!-- Product image-->
                                <img class="card-img-top"
                                    src="{{ asset('storage/'.$item->gambar)}}"
                                    alt="..." height="300" width="450"/>
                                <!-- Product details-->
                                <div class="card-body p-4">
                                    <div class="text-justify">
                                        <!-- Product name-->
                                        <h5 class="fw-bolder">{{$item->nama_barang}}</h5>
                                        <h6 class="fw-bolder">@formatRupiah($item->harga)</h6>
                                        <!-- Product price-->
                                        {{$item->deskripsi}}
                                    </div>
                                </div>
                                <!-- Product actions-->
                                <div class="card-footer pt-0 border-top-0 bg-transparent">
                                    <div class="row">
                                        <div class="col-4 mx-auto">
                                            <a class="btn btn-outline-success mt-auto edit-sell-button" href="/admin/store/{{ $item->id }}">Beli</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Aiman Comp 2024</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
