<script>
    //button create post event
    $('body').on('click', '.delete-outcome-button', function () {

        let id = $(this).data('id');
        let token   = $("meta[name='csrf-token']").attr("content");
        url = '/admin/pengeluaran/' + id;

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
                            timer: 1500
                        });

                        setTimeout(function() {
                            location.reload();
                        }, 500); // Wait for 3000 milliseconds (3 seconds)
                    }
                });

                
            }
        })
        
    });
</script>