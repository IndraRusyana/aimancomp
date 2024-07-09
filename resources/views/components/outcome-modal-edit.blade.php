<!-- Edit Data Modal -->
<div class="modal fade" id="editDataOutcomeModal" tabindex="-1" aria-labelledby="editDataOutcomeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editDataOutcomeModalLabel">Edit Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editDataOutcomeForm">
                @csrf
                <div class="modal-body" id="editFormFieldsOutcome">
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
    $('body').on('click', '.edit-outcome-button', function() {

        let id = $(this).data('id');
        console.log(id);
        url = '/admin/pengeluaran/' + id;

        //fetch detail post with ajax
        $.ajax({
            url: url,
            type: "GET",
            cache: false,
            success: function(response) {
                let data = response.data;
                let thead = response.thead;
                $('#editDataOutcomeForm').attr('data-id', id);
                console.log(data);
                console.log(thead);

                let formFields = '';
                for (let i = 0; i < thead.length; i++) {
                    let fieldName = thead[i].toLowerCase();
                    let isDateField = fieldName === 'tanggal'; // Misalnya, kolom tanggal bernama 'tanggal'
                    if (isDateField) {
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
                $('#editFormFieldsOutcome').html(formFields);
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

                $('#editDataOutcomeModal').modal('show');
            }
        });
    });

    //action update post
    $('#editDataOutcomeForm').on('submit', function(e) {
        e.preventDefault();

        //define variable
        let id = $(this).attr('data-id');
        console.log(id);
        let formData = $(this).serialize();
        url = '/admin/pengeluaran/' + id;
        //ajax
        $.ajax({
            url: url,
            type: "PUT",
            cache: false,
            data: formData,
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

                let body = '';
                data.forEach(item => {
                    body += '<tr id="outcome_' + item.id + '" data-id="' + item.id + '">';
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
                                        <a class="dropdown-item edit-outcome-button" href="javascript:void(0);" data-id="${item.id}">
                                            <i class="bx bx-edit-alt me-1"></i> Edit
                                        </a>
                                        <a class="dropdown-item delete-outcome-button" href="javascript:void(0);" data-id="${item.id}">
                                            <i class="bx bx-trash me-1"></i> Delete
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>`;
                });

                //append to table
                $('#tableOutcomeBody').html(body);

                //close modal
                $('#editDataOutcomeModal').modal('hide');


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
