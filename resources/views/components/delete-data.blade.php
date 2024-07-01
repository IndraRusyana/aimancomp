<script>
    //button create post event
    $('body').on('click', '.delete-button', function () {

        let id = $(this).data('id');
        let token   = $("meta[name='csrf-token']").attr("content");

        let activeType = $('#dataType li a.active');
        let dataResult = activeType.parent().attr('data-value');
        let dataType = JSON.parse(dataResult);
        url = '/admin/' + dataType.path + '/' + dataType.menu + '/' + id;

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
                        $(`#index_${id}`).remove();
                    }
                });

                
            }
        })
        
    });
</script>