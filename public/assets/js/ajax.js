
/**
 * The function `loadTable` retrieves data from a specified URL, updates the table head and body
 * based on the response, and handles errors if they occur.
 */
$(document).ready(function() {
    let globalDataType = [];
    console.log(globalDataType);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#dataType li a').on('click', function(event) {
        event.preventDefault(); // Mencegah aksi default dari <a>

        $('#dataType li a').removeClass('active');
        $(this).addClass('active');

        let dataValue = $(this).parent().attr('data-value');
        let dataType = JSON.parse(dataValue);
        globalDataType = dataType;
        console.log(dataType); // Debugging: Tampilkan objek dataType di konsol

        let url = '/admin/' + dataType.path + '/' + dataType.menu;

        function capitalizeFirstWord(string) {
            return string.charAt(0).toUpperCase() + string.slice(1);
        }
        let capitalizedTitle = capitalizeFirstWord(dataType.menu);
        $('#tableTitle').html(' ' + capitalizedTitle);

        // console.log(dataType);

        // $('#tableTitle').html(dataType.type.charAt(0).toUpperCase() + dataType.type.slice(1));
        $.ajax({
            url: url,
            method: 'GET',
            success: function(response) {
                console.log(response); // Debugging: Tampilkan seluruh respons di konsol

                // Update table head
                let thead = response.thead;
                let headRow = '';
                for (let i = 0; i < thead.length; i++) {
                    headRow += '<th>' + thead[i] + '</th>';

                }
                headRow += '<th>Actions</th>'
                $('#tableHead').html(headRow);

                // Update form fields for adding data
                let formFields = '';
                for (let i = 0; i < thead.length; i++) {
                    let fieldName = thead[i].toLowerCase();
                    formFields += `
                        <div class="mb-3">
                            <label for="${fieldName}" class="form-label">${thead[i]}</label>
                            <input type="text" class="form-control" id="${fieldName}" name="${fieldName}" required>
                        </div>
                    `;
                }
                $('#formFields').html(formFields);

                // Update table body
                let data = response.query;
                console.log(data);
                let bodyRows = '';
                for (let i = 0; i < data.length; i++) {
                    bodyRows += '<tr>';
                    for (let j = 0; j < thead.length; j++) {
                        let fieldName = thead[j].toLowerCase();
                        if (j == 0) {
                            bodyRows += '<td><strong>' + data[i][fieldName] +
                                '</strong></td>';
                        } else {
                            bodyRows += '<td>' + data[i][fieldName] + '</td>';
                        }
                    }
                    bodyRows += `
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                    data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item edit-button" href="javascript:void(0);" data-id="${data[i].id}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                    <a class="dropdown-item delete-button" href="javascript:void(0);" data-id="${data[i].id}"><i class="bx bx-trash me-1"></i> Delete</a>
                                </div>
                            </div>
                        </td>
                    `;
                    bodyRows += '</tr>';
                }
                $('#tableBody').html(bodyRows);
            },
            error: function(xhr, status, error) {
                console.error('Terjadi kesalahan:', error);
            }
        });
    });
    // Fungsi untuk memuat tabel setelah pembaruan data
    function loadTable(dataValue) {

        let activeType = $('#dataType li a.active');
        let dataResult = activeType.parent().attr('data-value');
        let dataType = JSON.parse(dataResult);
        globalDataType = dataType;
        url = '/admin/' + dataType.path + '/' + dataType.menu;

        $.ajax({
            url: url,
            method: 'GET',
            success: function(response) {
                // Update table head
                let thead = response.thead;
                let headRow = '';
                for (let i = 0; i < thead.length; i++) {
                    headRow += '<th>' + thead[i] + '</th>';
                }
                headRow += '<th>Actions</th>';
                $('#tableHead').html(headRow);

                // Update form fields for adding data
                let formFields = '';
                for (let i = 0; i < thead.length; i++) {
                    let fieldName = thead[i].toLowerCase();
                    formFields += `
                        <div class="mb-3">
                            <label for="${fieldName}" class="form-label">${thead[i]}</label>
                            <input type="text" class="form-control" id="${fieldName}" name="${fieldName}" required>
                        </div>
                    `;
                }
                $('#formFields').html(formFields);

                // Update table body
                let data = response.query;
                let bodyRows = '';
                for (let i = 0; i < data.length; i++) {
                    bodyRows += '<tr data-id="' + data[i].id + '">';
                    for (let j = 0; j < thead.length; j++) {
                        let fieldName = thead[j].toLowerCase();
                        if (j == 0) {
                            bodyRows += '<td><strong>' + data[i][fieldName] + '</strong></td>';
                        } else {
                            bodyRows += '<td>' + data[i][fieldName] + '</td>';
                        }
                    }
                    bodyRows += `
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item edit-button" href="javascript:void(0);" data-id="${data[i].id}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                    <a class="dropdown-item delete-button" href="javascript:void(0);" data-id="${data[i].id}"><i class="bx bx-trash me-1"></i> Delete</a>
                                </div>
                            </div>
                        </td>
                    `;
                    bodyRows += '</tr>';
                }
                $('#tableBody').html(bodyRows);
            },
            error: function(xhr, status, error) {
                console.error('Terjadi kesalahan:', error);
            }
        });
    }

    $('#menuLayanan a').on('click', function(event) {
        event.preventDefault();
        let activeType = $('#sidebar li.active');
        let dataResult = activeType.attr('data-value');
        let dataType = JSON.parse(dataResult);
        globalDataType = dataType;
        console.log(dataType);
    });

    // Show modal on button click
    $('#addDataButton').on('click', function() {

        // if (globalDataType.path == "menu") {
        //     $.ajax({
        //         url: '/admin/layanan/', // Ganti dengan URL yang sesuai dengan rute controller Anda
        //         method: 'GET', // Metode permintaan, bisa 'GET' atau 'POST' tergantung konfigurasi Anda
        //         success: function(response) {
        //             // Handle response dari controller di sini
        //             console.log(response); // Contoh: jika controller mengirimkan 'query', akses dengan response.query
        //             let thead = response.thead;
        //             let formFields = '';
        //             for (let i = 0; i < thead.length; i++) {
        //                 let fieldName = thead[i].toLowerCase();
        //                 formFields += `
        //                     <div class="mb-3">
        //                         <label for="${fieldName}" class="form-label">${thead[i]}</label>
        //                         <input type="text" class="form-control" id="${fieldName}" name="${fieldName}" required>
        //                     </div>
        //                 `;
        //             }
        //             $('#formFields').html(formFields);
        //             },
        //             error: function(xhr, status, error) {
        //                 console.error('Terjadi kesalahan:', error);
        //             }
        //         });
        // }
        $('#addDataModal').modal('show');
    });

    // Handle form submission for adding new data
    $('#addDataForm').on('submit', function(event) {
        event.preventDefault();

        let formData = $(this).serialize();
        let activeType = $('#dataType li a.active');
        let dataResult = activeType.parent().attr('data-value');
        let dataType = JSON.parse(dataResult);
        console.log(dataType);

        let url = '/admin/' + dataType.path + '/' + dataType.menu;

        $.ajax({
            url: url,
            method: 'POST',
            data: formData,
            success: function(response) {
                // Add new row to the table
                let newRow = '<tr>';
                for (let i = 0; i < response.thead.length; i++) {
                    let fieldName = response.thead[i].toLowerCase();
                    if (i == 0) {
                        newRow += '<td><strong>' + response.data[fieldName] + '</strong></td>';
                    } else {
                        newRow += '<td>' + response.data[fieldName] + '</td>';
                    }
                }
                newRow += `
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item edit-button" href="javascript:void(0);" data-id="${response.data.id}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                <a class="dropdown-item delete-button" href="javascript:void(0);" data-id="${response.data.id}"><i class="bx bx-trash me-1"></i> Delete</a>
                            </div>
                        </div>
                    </td>
                `;
                newRow += '</tr>';

                $('#tableBody').append(newRow);
                $('#addDataModal').modal('hide');
                $('#addDataForm')[0].reset();
            },
            error: function(xhr, status, error) {
                console.error('Terjadi kesalahan:', error);
                console.error('Terjadi kesalahan:', xhr);
                console.error('Terjadi kesalahan:', status);
            }
        });
    });

    $(document).on('click', '.edit-button', function() {
        let id = $(this).data('id');
        let activeType = $('#dataType li a.active');
        let dataResult = activeType.parent().attr('data-value');
        let dataType = JSON.parse(dataResult);

        $.ajax({
            url: '/admin/' + dataType.path + '/update/' + dataType.menu + '/' + id,
            method: 'GET',
            success: function(response) {
                let data = response.data;
                let thead = response.thead;

                $('#editDataForm').attr('data-id', id);
                $('#editDataForm').attr('data-type', dataType.type);

                let formFields = '';
                for (let i = 0; i < thead.length; i++) {
                    let fieldName = thead[i].toLowerCase();
                    formFields += `
                        <div class="mb-3">
                            <label for="edit_${fieldName}" class="form-label">${thead[i]}</label>
                            <input type="text" class="form-control" id="edit_${fieldName}" name="${fieldName}" value="${data[fieldName]}" required>
                        </div>
                    `;
                }
                $('#editFormFields').html(formFields);
                $('#editDataModal').modal('show');
            },
            error: function(xhr, status, error) {
                console.error('Terjadi kesalahan:', error);
            }
        });
    });

    // Menggunakan fungsi loadTable saat tombol disimpan
    $('#editDataForm').on('submit', function(event) {
        event.preventDefault();

        let id = $(this).attr('data-id');
        let formData = $(this).serialize();
        let activeType = $('#dataType li a.active');
        let dataResult = activeType.parent().attr('data-value');
        let dataType = JSON.parse(dataResult);

        $.ajax({
            url: '/admin/' + dataType.path + '/update/' + dataType.menu + '/' + id,
            method: 'PUT',
            data: formData,
            success: function(response) {
                loadTable();
                $('#editDataModal').modal('hide');
                $('#notificationMessage').text('Data berhasil diupdate!');
                $('#notificationModal').modal('show');
            },
            error: function(xhr, status, error) {
                if (xhr.status === 422) {
                    // Display validation errors
                    let errors = xhr.responseJSON.errors;
                    let errorMessages = '';
                    $.each(errors, function(key, messages) {
                        errorMessages += '<p>' + messages.join(', ') + '</p>';
                    });
                    alert('Validation errors:\n' + errorMessages);
                } else {
                    console.error('Terjadi kesalahan:', error);
                }
            }
        });
    });

    let deleteId; // Variable to store the id of the item to be deleted

    $(document).on('click', '.delete-button', function() {
        deleteId = $(this).data('id');
        $('#deleteConfirmationModal').modal('show');
    });

    $('#confirmDeleteButton').on('click', function() {
        let activeType = $('#dataType li a.active');
        let dataResult = activeType.parent().attr('data-value');
        let dataType = JSON.parse(dataResult);

        $.ajax({
            url: '/admin/' + dataType.path + '/delete/' + dataType.menu + '/' + deleteId,
            method: 'DELETE',
            success: function(response) {
                if (response.status === 'success') {
                    loadTable();
                    $('#notificationMessage').text('Data berhasil dihapus!');
                } else {
                    $('#notificationMessage').text('Gagal menghapus data.');
                }
                $('#notificationModal').modal('show');
                $('#deleteConfirmationModal').modal('hide');
            },
            error: function(xhr, status, error) {
                console.error('Terjadi kesalahan:', error);
            }
        });
    });

    // ... kode lain tetap sama ...
});
