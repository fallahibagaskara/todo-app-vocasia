setInterval(function() {
    $.ajax({
        url: '/overdue/check',
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            if (response.updated_tasks > 0) {
                var updatedTaskTitles = response.updated_task_titles;
                var titlesString = updatedTaskTitles.join(', ');
                Swal.fire({
                    title: "Info!",
                    text: "Task berikut telah menjadi overdue: " + titlesString,
                    confirmButtonColor: "#BA181B",
                    confirmButtonText: 'OK',
                    showCloseButton: true,
                    willClose: (dismiss) => {
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.reload();
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                    }
              });
            }
        },
        error: function(xhr, status, error) {
            console.error('Error checking overdue tasks:', error);
        }
    });
}, 30000);

$(function () {
    // edit overdue ajax request
    $(document).on('click', '.editOverdueIcon', function (e) {
        e.preventDefault();
        let id = $(this).attr('id');
        let csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        $.ajax({
            url: '/overdue/edit',
            method: 'get',
            data: {
                id: id,
                _token: csrf
            },
            success: function (response) {
                $("#title").val(response.title);
                $("#comment").val(response.comment);
                $("#time").val(response.clock);
                $("#date").val(response.date);
                $("#status").val(response.status);
                $("#todo_id").val(response.id);
            }
        });
    });

    // update overdue ajax request
    $("#edit_overdue_form").submit(function (e) {
        const editOverdueModal = new Modal(document.getElementById('editOverdueModal'))
        function closeEditModal() {
            editOverdueModal.hide()
            document.querySelector("body > div[modal-backdrop]")?.remove()
        }
        e.preventDefault();
        const fd = new FormData(this);
        $("#edit_overdue_btn").text('Mengubah...');
        $.ajax({
            url: '/overdue/update',
            method: 'post',
            data: fd,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function (response) {
                if (response.status == 200) {
                    closeEditModal()
                    Swal.fire({
                        title: 'Sukses!',
                        text: "Task berhasil diubah.",
                        confirmButtonColor: '#BA181B',
                    }).then((result) => {
                        location.reload();
                    });
                }
            }
        });
    });

    // delete overdue ajax request
    $(document).on('click', '#btn-delete-overdue', function (e) {
        e.preventDefault();
        let id = $(this).data('id');
        let csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        Swal.fire({
            title: 'Hapus task?',
            text: "Setelah dikonfirmasi, task ini akan dihapus dari database!",
            showCancelButton: true,
            cancelButtonText: "Batalkan",
            confirmButtonText: 'Ya, hapus!',
            cancelButtonColor: "#454141",
            confirmButtonColor: "#BA181B",
            showCancelButton: true,
            showCloseButton: true,
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '/overdue/delete',
                    method: 'delete',
                    data: {
                        id: id,
                        _token: csrf
                    },
                    success: function (response) {
                        if (response.status == 200) {
                            Swal.fire({
                                title: 'Sukses!',
                                text: "Task berhasil dihapus.",
                                confirmButtonColor: '#BA181B',
                                cancelButtonColor: '#454141',
                            }).then((result) => {
                                $(`#overdue-${id}`).remove();
                                location.reload();
                            });
                        }
                        else {
                            Swal.fire({
                                title: 'Gagal!',
                                text: "Task gagal dihapus.",
                                confirmButtonColor: '#BA181B',
                                cancelButtonColor: '#454141',
                            })
                        }
                    }
                });
            }
        })
    });
});
