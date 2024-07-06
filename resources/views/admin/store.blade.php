@extends('layouts.admin')

@section('title')
    Manajemen Store || Admin
@endsection

@section('store')
    active
@endsection

@section('content')
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            @include('components.sidebar')
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                @include('components.navbar')

                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-fluid flex-grow-1 container-p-y">
                        <div class="row">
                            <div class="col">
                                <div class="card mb-4">
                                    <div class="row">
                                        <div class="col-8">
                                            <h5 class="card-header">Daftar barang di Store</h5>
                                        </div>
                                        <div class="col-4 d-flex justify-content-end align-items-center">
                                            <a class="btn btn-outline-primary my-3 me-1" href="/store" target="_blank">Lihat Situs</a>
                                            <a id="addSellButton" class="btn btn-outline-secondary my-3 ms-1 me-4" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#addDataSellModal">Jual Barang</a>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center" id="productsContainer">
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
                                                                <div class="col-10 mx-auto">
                                                                    <a class="btn btn-outline-dark mt-auto edit-sell-button" href="/admin/store/{{ $item->id }}">Edit</a>
                                                                    <a class="btn btn-outline-danger mt-auto delete-sell-button" href="javascript:void(0);" data-id="{{ $item->id }}">Delete</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- / Content -->

                    <!-- Footer -->
                    @include('components.footer')
                    <!-- / Footer -->
                    @include('components.sell-modal-create')

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>
    </div>
    <!-- / Layout wrapper -->

    <script>
        //button create post event
        $('body').on('click', '.delete-sell-button', function () {
    
            let id = $(this).data('id');
            let token   = $("meta[name='csrf-token']").attr("content");
            url = '/admin/store/' + id;
            console.log(url);
    
            Swal.fire({
                title: 'Apakah Kamu Yakin?',
                text: "ingin menghapus data ini!",
                icon: 'warning',
                showCancelButton: true,
                cancelButtonText: 'TIDAK',
                confirmButtonText: 'YA, HAPUS!'
            }).then((result) => {
                if (result.isConfirmed) {
    
                    console.log('test');
    
                    //fetch to delete data
                    $.ajax({
    
                        url: url,
                        type: "DELETE",
                        cache: false,
                        data: {
                            "_token": token
                        },
                        success:function(response){ 
    
                            //show success message
                            Swal.fire({
                                type: 'success',
                                icon: 'success',
                                title: `${response.message}`,
                                showConfirmButton: false,
                                timer: 3000
                            });
    
                            //remove post on table
                            $(`#sell_${id}`).remove();
                        }
                    });
    
                    
                }
            })
            
        });
    </script>
@endsection
