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
                        <div class="misc-wrapper">
                            <h2 class="mb-2 mx-2">Under Maintenance!</h2>
                            <p class="mb-4 mx-2">Sorry for the inconvenience but we're performing some maintenance at the moment</p>
                            <a href="index.html" class="btn btn-primary">Back to home</a>
                            <div class="mt-4">
                              <img
                                src="../assets/img/illustrations/girl-doing-yoga-light.png"
                                alt="girl-doing-yoga-light"
                                width="500"
                                class="img-fluid"
                                data-app-dark-img="illustrations/girl-doing-yoga-dark.png"
                                data-app-light-img="illustrations/girl-doing-yoga-light.png"
                              />
                            </div>
                          </div>
                    </div>
                    <!-- / Content -->

                    <!-- Footer -->
                    @include('components.footer')
                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>
    </div>
    <!-- / Layout wrapper -->
@endsection
