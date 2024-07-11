@extends('layouts.admin')

@section('title')
    Profile Account | {{ Auth::user()->role }}
@endsection

@section('profil')
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
                            <div class="col-md-12">
                              <div class="card mb-4">
                                <h5 class="card-header">Profile Details</h5>
                                <!-- Account -->
                                <div class="card-body">
                                  <div class="d-flex align-items-start align-items-sm-center gap-4">
                                    <img
                                      src="../assets/img/avatars/1.png"
                                      alt="user-avatar"
                                      class="d-block rounded"
                                      height="100"
                                      width="100"
                                      id="uploadedAvatar"
                                    />
                                    {{-- <div class="button-wrapper">
                                      <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                        <span class="d-none d-sm-block">Upload new photo</span>
                                        <i class="bx bx-upload d-block d-sm-none"></i>
                                        <input
                                          type="file"
                                          id="upload"
                                          class="account-file-input"
                                          hidden
                                          accept="image/png, image/jpeg"
                                        />
                                      </label>
                                      <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                                        <i class="bx bx-reset d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Reset</span>
                                      </button>
            
                                      <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                                    </div> --}}
                                  </div>
                                </div>
                                <hr class="my-0" />
                                <div class="card-body">
                                  <form id="formAccountSettings" method="POST" action="{{route('profile.update')}}">
                                    @csrf
                                    <div class="row">
                                      
                                        <div class="mb-3 col-5">
                                          @foreach ($columnsSubset as $column)
                                          @if ($column === "prsnt_investasi" || $column === "jml_investasi")
                                            <label for="{{$column}}" class="form-label">{{$column}}</label>
                                            <input class="form-control" type="text" id="{{$column}}" name="{{$column}}" value="{{$query->$column}}" disabled/>
                                          @else
                                            <label for="{{$column}}" class="form-label">{{$column}}</label>
                                            <input class="form-control" type="text" id="{{$column}}" name="{{$column}}" value="{{$query->$column}}"/>
                                          @endif
                                          @endforeach
                                        </div>
                                      
                                    </div>
                                    <div class="mt-2">
                                      <button type="submit" class="btn btn-primary me-2">Save changes</button>
                                      <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                                    </div>
                                  </form>
                                </div>
                                <!-- /Account -->
                              </div>
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
