@extends('layouts.admin')

@section('title')
    Keanggotaan | Admin
@endsection

@section('keanggotaan')
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
                        <h4 class="fw-bold py-3 mb-4"> Table <div id="tableTitle" class="d-inline">Admin</div></h4>
                        <div class="card">
                            <h6 class="card-header">
                                <ul id="dataType" class="nav nav-pills mb-3" role="tablist">
                                    <li class="nav-item" data-value='{"path":"keanggotaan","menu":"admins"}'>
                                        <a class="nav-link active"  href="#" 
                                            aria-selected="true">
                                            Admin
                                        </a>
                                    </li>
                                    <li class="nav-item" data-value='{"path":"keanggotaan","menu":"investors"}'>
                                        <a class="nav-link"  href="#"
                                            aria-selected="false">
                                            Investor
                                        </a>
                                    </li>
                                    <li class="nav-item" data-value='{"path":"keanggotaan","menu":"owners"}'>
                                        <a class="nav-link" href="#" aria-selected="false">
                                            Owner
                                        </a>
                                    </li>
                                </ul>
                            </h6>
                            <div class="table-responsive text-nowrap" id="table-content">
                                <table class="table table-striped" id="dataTable">
                                    <thead id="tableHead">
                                        <tr >
                                            @foreach ($columnsSubset as $column)
                                                <th>{{$column}}</th>
                                            @endforeach
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0" id="tableBody">
                                        @foreach ($query as $item)
                                            <tr id="index_{{ $item->id }}" data-id="{{ $item->id }}">
                                                @foreach ($columnsSubset as $column)
                                                    <td>{{ $item->$column }}</td>
                                                @endforeach
                                                <td>
                                                    <div class="dropdown">
                                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                            <i class="bx bx-dots-vertical-rounded"></i>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item edit-button" href="javascript:void(0);" data-id="{{ $item->id }}">
                                                                <i class="bx bx-edit-alt me-1"></i> Edit
                                                            </a>
                                                            <a class="dropdown-item delete-button" href="javascript:void(0);" data-id="{{ $item->id }}">
                                                                <i class="bx bx-trash me-1"></i> Delete
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot class="">
                                        <tr>
                                            <th colspan="5">
                                                <a class="btn btn-outline-primary my-3" style="font-size:12px;"
                                                    href="#" id="addDataButton">
                                                    Tambah Data
                                                </a>
                                            </th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- / Content -->
                </div>
                <!-- Footer -->
                @include('components.footer')
                <!-- / Footer -->

                <div class="content-backdrop fade"></div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->
@endsection
