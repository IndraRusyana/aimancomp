<!-- Modal for adding new data -->
<div class="modal fade" id="addDataOutcomeModal" tabindex="-1" aria-labelledby="addDataOutcomeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="addDataOutcomeForm">
                @csrf
                <div class="modal-header">
                    <span class="error" id="emailError"></span>
                    <h5 class="modal-title" id="addDataOutcomeModalLabel">Tambah Pengeluaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="formFieldsOutcome"></div>
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
    $('body').on('click', '#addDataOutcomeButton', function() {
        url = '/admin/pengeluaran';

        $.ajax({
            url: url,
            type: "GET",
            cache: false,
            success: function(response) {
                let columns = response.columnsSubset;
                let formFieldsOutcome = '';

                // Clear the form fields before adding new ones
                $('#formFieldsOutcome').html('');

                columns.forEach(column => {
                    let isDateField = column.toLowerCase() === 'tanggal';
                    if (!isDateField) {
                        formFieldsOutcome += `
                            <div class="mb-3">
                                <label for="${column}" class="form-label">${column}</label>
                                <input type="text" class="form-control" id="${column}" name="${column}" required>
                                <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-${column}"></div>
                            </div>
                        `;
                    } else {
                        formFieldsOutcome += `
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
                $('#formFieldsOutcome').html(formFieldsOutcome);
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
        $('#addDataOutcomeModal').modal('show');
    });

    //action create post
    $('#addDataOutcomeForm').on('submit', function(e){
        e.preventDefault();
        
        let formData = $(this).serialize();
        let token = $("meta[name='csrf-token']").attr("content");
        url = '/admin/pengeluaran';
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
                console.log(columns);
                console.log(data);

                //show success message
                Swal.fire({
                    type: 'success',
                    icon: 'success',
                    title: `${response.message}`,
                    showConfirmButton: false,
                    timer: 1500
                });
                
                $('#addDataOutcomeModal').modal('hide');
                $('#addDataOutcomeForm')[0].reset();
                // Reload the page after the notification appears
                setTimeout(function() {
                    location.reload();
                }, 500); // Wait for 3000 milliseconds (3 seconds)

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
