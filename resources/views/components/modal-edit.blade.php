<!-- Edit Data Modal -->
<div class="modal fade" id="editDataModal" tabindex="-1" aria-labelledby="editDataModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editDataModalLabel">Edit Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editDataForm">
                @csrf
                <div class="modal-body" id="editFormFields">
                    <!-- Dynamic form fields will be added here -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    //button create post event
    $('body').on('click', '.edit-button', function() {

        let id = $(this).data('id');
        let activeType = $('#dataType li a.active');
        let dataResult = activeType.parent().attr('data-value');
        let dataType = JSON.parse(dataResult);
        url = '/admin/' + dataType.path + '/' + dataType.menu + '/' + id;

        //fetch detail post with ajax
        $.ajax({
            url: url,
            type: "GET",
            cache: false,
            success: function(response) {
                console.log('ok');
                let data = response.data;
                let thead = response.thead;

                $('#editDataForm').attr('data-id', id);
                $('#editDataForm').attr('data-type', dataType.type);

                let formFields = '';
                for (let i = 0; i < thead.length; i++) {
                    let fieldName = thead[i].toLowerCase();
                    let isDateField = fieldName === 'tanggal'; // Misalnya, kolom tanggal bernama 'tanggal'
                    let isStatusField = fieldName === 'status'; // Cek apakah kolom adalah status

                    if (isStatusField) {
                        formFields += `
                            <div class="mb-3">
                                <label for="edit_${fieldName}" class="form-label">${thead[i]}</label>
                                <select class="form-select" id="edit_${fieldName}" name="${fieldName}" required>
                                    <option value="selesai" ${data[fieldName] === 'selesai' ? 'selected' : ''}>Selesai</option>
                                    <option value="proses" ${data[fieldName] === 'proses' ? 'selected' : ''}>Proses</option>
                                    <option value="pending" ${data[fieldName] === 'pending' ? 'selected' : ''}>Pending</option>
                                </select>
                            </div>
                        `;
                    } else if (isDateField) {
                        formFields += `
                            <div class="mb-3">
                                <label for="edit_${fieldName}" class="form-label">${thead[i]}</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="dateOption-${fieldName}" id="manual-${fieldName}" value="manual" ${!data[fieldName] ? 'checked' : ''}>
                                    <label class="form-check-label" for="manual-${fieldName}">
                                        Ubah
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="dateOption-${fieldName}" id="auto-${fieldName}" value="auto" ${data[fieldName] ? 'checked' : ''}>
                                    <label class="form-check-label" for="auto-${fieldName}">
                                        Tetap
                                    </label>
                                </div>
                                <input type="date" class="form-control" id="date-input-${fieldName}" name="${fieldName}" value="${data[fieldName] ? '' : data[fieldName]}" ${data[fieldName] ? 'disabled' : ''} required>
                                <input type="hidden" class="form-control" id="date-auto-${fieldName}" name="${fieldName}" value="${data[fieldName] ? data[fieldName] : ''}" ${!data[fieldName] ? 'disabled' : ''}>
                            </div>
                        `;
                    } else {
                        formFields += `
                            <div class="mb-3">
                                <label for="edit_${fieldName}" class="form-label">${thead[i]}</label>
                                <input type="text" class="form-control" id="edit_${fieldName}" name="${fieldName}" value="${data[fieldName]}" required>
                            </div>
                        `;
                    }
                }
                $('#editFormFields').html(formFields);
                // Tambahkan event listener untuk radio button date input manual dan otomatis
                thead.forEach(fieldName => {
                    let lowerFieldName = fieldName.toLowerCase();
                    let isDateField = lowerFieldName === 'tanggal';
                    if (isDateField) {
                        document.getElementById(`manual-${lowerFieldName}`).addEventListener('change', function() {
                            if (this.checked) {
                                document.getElementById(`date-input-${lowerFieldName}`).disabled = false;
                                document.getElementById(`date-auto-${lowerFieldName}`).disabled = true;
                            }
                        });

                        document.getElementById(`auto-${lowerFieldName}`).addEventListener('change', function() {
                            if (this.checked) {
                                document.getElementById(`date-input-${lowerFieldName}`).disabled = true;
                                document.getElementById(`date-auto-${lowerFieldName}`).disabled = false;
                                // Logic to auto-fill the date can be added here
                            }
                        });
                    }
                });

                $('#editDataModal').modal('show');
            }
        });
    });

    //action update post
    $('#editDataForm').on('submit', function(e) {
        e.preventDefault();

        //define variable
        let id = $(this).attr('data-id');
        let formData = $(this).serialize();
        let activeType = $('#dataType li a.active');
        let dataResult = activeType.parent().attr('data-value');
        let dataType = JSON.parse(dataResult);
        url = '/admin/' + dataType.path + '/' + dataType.menu + '/' + id;

        //ajax
        $.ajax({

            url: url,
            type: "PUT",
            cache: false,
            data: formData,
            success: function(response) {
                console.log('ok');

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

                //close modal
                $('#editDataModal').modal('hide');


            },
            error: function(error) {

                if (error.responseJSON.title[0]) {

                    //show alert
                    $('#alert-title-edit').removeClass('d-none');
                    $('#alert-title-edit').addClass('d-block');

                    //add message to alert
                    $('#alert-title-edit').html(error.responseJSON.title[0]);
                }

                if (error.responseJSON.content[0]) {

                    //show alert
                    $('#alert-content-edit').removeClass('d-none');
                    $('#alert-content-edit').addClass('d-block');

                    //add message to alert
                    $('#alert-content-edit').html(error.responseJSON.content[0]);
                }

            }

        });

    });
</script>
