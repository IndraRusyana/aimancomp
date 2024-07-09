<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    <link rel="icon" type="image/x-icon" href="..\assets\img\icons\brands\aiman.png" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- CSS style from template -->
    <!-- Icons. Uncomment required icon fonts -->
    {{-- <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}" /> --}}
    {{-- <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'> --}}
    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/theme-default.css') }}"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}" />

    <!-- Page CSS -->
    <!-- Page -->

    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-auth.css') }}" />

    <!-- Helpers -->
    <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('assets/js/config.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
    @yield('content')

    <!-- Notification Modal -->
    {{-- <div class="modal fade" id="notificationModal" tabindex="-1" aria-labelledby="notificationModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="notificationModalLabel">Notification</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="notificationMessage">
                    <!-- Notification message will be displayed here -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- Delete Confirmation Modal -->
    {{-- <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="deleteConfirmationModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteConfirmationModalLabel">Konfirmasi Penghapusan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus data ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteButton">Hapus</button>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle" style="z-index:996"></div>

    @include('components.modal-create')
    @include('components.outcome-modal-create')
    @include('components.modal-edit')
    @include('components.outcome-modal-edit')
    @include('components.delete-data')
    @include('components.outcome-delete-data')

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show position-fixed" style="z-index: 1099; top: 20px; right: 20px;" role="alert">
            <strong>Error:</strong> Terdapat kesalahan dalam inputan Anda.
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show position-fixed" style="z-index: 1099; top: 20px; right: 20px;" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif


    <script>
        $('#dataType li a').on('click', function (event) {
            event.preventDefault();

            $('#dataType li a').removeClass('active');
            $(this).addClass('active');

            let dataValue = $(this).parent().attr('data-value');
            let dataType = JSON.parse(dataValue);
            
            let url = '/admin/' + dataType.path + '/' + dataType.menu;

            function capitalizeFirstWord(string) {
                return string.charAt(0).toUpperCase() + string.slice(1);
            }
            let capitalizedTitle = capitalizeFirstWord(dataType.menu);
            $('#tableTitle').html(' ' + capitalizedTitle);

            $.ajax({
                url: url,
                type: "Get",
                success: function(response) {

                    let columns = response.columnsSubset;
                    let data = response.query;

                    // Create table head
                    let head = '<tr id="tableHead">';
                    columns.forEach(column => {
                        head += '<th>' + column + '</th>';
                    });
                    @if(auth()->check())
                        @if(auth()->user()->isOwner())
                        head += '<th>Actions</th></tr>';
                    @endif
                    @endif
                    $('#tableHead').html(head);

                    // Create table body
                    let body = '';
                    let pagination = '';
                    data.forEach(item => {
                        body += '<tr id="index_' + item.id + '" data-id="' + item.id + '">';
                        columns.forEach(column => {
                            if (column.toLowerCase() === 'status') {
                                let statusClass = '';
                                if (item[column] === 'selesai') {
                                    statusClass = 'badge bg-label-success';
                                } else if (item[column] === 'proses') {
                                    statusClass = 'badge bg-label-warning';
                                } else if (item[column] === 'pending') {
                                    statusClass = 'badge bg-label-danger';
                                }
                                body += `
                                    <td>
                                        <span class="${statusClass}">${item[column]}</span>
                                    </td>`;
                            } else {
                                body += '<td>' + item[column] + '</td>';
                            }
                        });
                        body += `
                        @if(auth()->check())
                        @if(auth()->user()->isOwner())
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item edit-button" href="javascript:void(0);" data-id="${item.id}">
                                            <i class="bx bx-edit-alt me-1"></i> Edit
                                        </a>
                                        <a class="dropdown-item delete-button" href="javascript:void(0);" data-id="${item.id}">
                                            <i class="bx bx-trash me-1"></i> Delete
                                        </a>
                                    </div>
                                </div>
                            </td>
                            @endif
                        @endif
                        </tr>`;
                    });
                    $('#tableBody').html(body);
                },
                error: function(error) {
                    console.error('Terjadi kesalahan:', error);
                }
            })
            
        })

    </script>

    {{-- Javascript from template --}}
    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

    <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/ajax.js') }}"></script> --}}

    <!-- Page JS -->
    <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    {{-- <script async defer src="https://buttons.github.io/buttons.js')}}"></script> --}}
</body>

</html>
