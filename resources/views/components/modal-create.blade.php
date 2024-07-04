<!-- Modal for adding new data -->
<div class="modal fade" id="addDataModal" tabindex="-1" aria-labelledby="addDataModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="addDataForm">
                @csrf
                <div class="modal-header">
                    <span class="error" id="emailError"></span>
                    <h5 class="modal-title" id="addDataModalLabel">Tambah Data Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="formFields"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="store">Add Data</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    //button create event
    $('body').on('click', '#addDataButton', function() {
        let activeType = $('#dataType li a.active');
        let dataResult = activeType.parent().attr('data-value');
        let dataType = JSON.parse(dataResult);
        url = '/admin/' + dataType.path + '/' + dataType.menu;

        $.ajax({
            url: url,
            type: "GET",
            cache: false,
            success: function(response) {
                let columns = response.columnsSubset;
                let formFields = '';

                // Clear the form fields before adding new ones
                $('#formFields').html('');

                columns.forEach(column => {
                    let isDateField = column.toLowerCase() === 'tanggal'; // Misalnya, kolom tanggal bernama 'tanggal'
                    let isStatusField = column.toLowerCase() === 'status'; // Cek apakah kolom adalah status
                    if (isStatusField) {
                        formFields += `
                            <div class="mb-3">
                                <label for="${column}" class="form-label">${column}</label>
                                <select class="form-select" id="${column}" name="${column}" required>
                                    <option value="selesai">Selesai</option>
                                    <option value="proses">Proses</option>
                                    <option value="pending">Pending</option>
                                </select>
                                <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-${column}"></div>
                            </div>
                        `;
                    } else if (!isDateField) {
                        formFields += `
                            <div class="mb-3">
                                <label for="${column}" class="form-label">${column}</label>
                                <input type="text" class="form-control" id="${column}" name="${column}" required>
                                <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-${column}"></div>
                            </div>
                        `;
                    } else {
                        formFields += `
                            <div class="mb-3">
                                <label for="${column}" class="form-label">${column}</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="dateOption" id="manual-${column}" value="manual" checked>
                                    <label class="form-check-label" for="manual-${column}">
                                        Manual
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="dateOption" id="auto-${column}" value="auto">
                                    <label class="form-check-label" for="auto-${column}">
                                        Otomatis
                                    </label>
                                </div>
                                <input type="date" class="form-control" id="date-input-${column}" name="${column}" required>
                                <input type="hidden" class="form-control" id="date-auto-${column}" name="${column}" disabled>
                                <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-${column}"></div>
                            </div>
                        `;
                    }
                });

                $('#formFields').html(formFields);

                $('input[name="dateOption"]').on('change', function() {
                    let column = $(this).attr('id').split('-')[1];
                    if ($(this).val() === 'manual') {
                        $(`#date-input-${column}`).prop('disabled', false);
                        $(`#date-auto-${column}`).prop('disabled', true);
                    } else {
                        $(`#date-input-${column}`).prop('disabled', true);
                        $(`#date-auto-${column}`).prop('disabled', false);
                        // Mengisi otomatis tanggal dengan nilai saat ini
                        $(`#date-auto-${column}`).val(new Date().toISOString().split('T')[0]);
                    }
                });
            }

        })

        //open modal
        $('#addDataModal').modal('show');
    });

    //action create post
    $('#addDataForm').on('submit', function(e){
        e.preventDefault();
        
        let formData = $(this).serialize();
        //define variable
        // let title = $('#title').val();
        // let content = $('#content').val();
        let token = $("meta[name='csrf-token']").attr("content");

        let activeType = $('#dataType li a.active');
        let dataResult = activeType.parent().attr('data-value');
        let dataType = JSON.parse(dataResult);
        url = '/admin/' + dataType.path + '/' + dataType.menu;

        console.log(url);

        //ajax
        $.ajax({

            url: url,
            type: "POST",
            cache: false,
            data: formData,
            headers: {
                'X-CSRF-TOKEN': token // Include the CSRF token in the request headers
            },
            success: function(response) {

                let columns = response.columnsSubset;
                let data = response.query;

                //show success message
                Swal.fire({
                    type: 'success',
                    icon: 'success',
                    title: `${response.message}`,
                    showConfirmButton: false,
                    timer: 3000
                });

                //data post
                let body = '';
                    data.forEach(item => {
                        body += '<tr id="index_' + item.id + '" data-id="' + item.id + '">';
                        columns.forEach(column => {
                            body += '<td>' + item[column] + '</td>';
                        });
                        body += `
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
                        </tr>`;
                    });
                
                //append to table
                $('#tableBody').html(body);
                $('#addDataModal').modal('hide');
                $('#addDataForm')[0].reset();


            },
            error: function(error) {
                const errors = error.responseJSON.errors;
                let columns = error.responseJSON.columnsSubset;

                console.log(columns);

                columns.forEach(function(column) {
                    if (errors[column]) {
                        $(`#alert-${column}`).removeClass('d-none').addClass('d-block').html(errors[column][0]);
                    } else {
                        $(`#alert-${column}`).removeClass('d-block').addClass('d-none').html('');
                    }
                });

            }

        });

    });
</script>
