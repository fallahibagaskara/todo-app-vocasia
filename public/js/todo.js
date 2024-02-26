// checkbox
document.addEventListener('DOMContentLoaded', function () {
    let checkboxes = document.querySelectorAll('.checkbox-todo');
    let csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    checkboxes.forEach(function (checkbox) {
        checkbox.addEventListener('change', function () {
            let id = checkbox.getAttribute('id').split('-')[3];
            if (checkbox.checked) {
                Swal.fire({
                    title: "Selesaikan task?",
                    text: "Setelah dikonfirmasi, task ini akan ditandai sebagai selesai!",
                    cancelButtonText: "Cancel",
                    confirmButtonText: "Selesai",
                    cancelButtonColor: "#BA181B",
                    confirmButtonColor: "#BA181B",
                    showCancelButton: true,
                    showCloseButton: true,
                    willClose: (dismiss) => {
                        if (!dismiss.isConfirmed) {
                            checkbox.checked = false;
                        }
                    }

                })
                .then((result) => {
                    if (result.isConfirmed) {
                        fetch(`/todo/mark/${id}`, {
                            method: 'PUT',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': csrf
                            },
                            body: JSON.stringify({ status: 'done' })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                Swal.fire({
                                        title: "Sukses!",
                                        text: "Task ditandai sebagai selesai!",
                                        confirmButtonColor: "#BA181B",
                                    }).then((result) => {
                                    location.reload();
                                  });
                            } else {
                                Swal.fire(
                                    'Gagal!',
                                    'Ada yang tidak beres!',
                                    'error'
                                ).then((result) => {
                                    location.reload();
                                  });
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            Swal.fire("Terjadi kesalahan saat memperbarui task!", {
                                icon: "error",
                            });
                        });
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        checkbox.checked = false;
                    }
                });
                } else {
                    Swal.fire({
                        title: "Kembalikan task?",
                        text: "Setelah dikonfirmasi, task ini akan ditandai sebagai belum selesai!",
                        cancelButtonText: "Cancel",
                        confirmButtonText: "Kembalikan",
                        cancelButtonColor: "#BA181B",
                        confirmButtonColor: "#BA181B",
                        showCancelButton: true,
                        showCloseButton: true,
                        willClose: (dismiss) => {
                            if (!dismiss.isConfirmed) {
                                checkbox.checked = true;
                            }}
                    })
                    .then((result) => {
                        if (result.isConfirmed) {
                            fetch(`/todo/mark/${id}`, {
                                method: 'PUT',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': csrf
                                },
                                body: JSON.stringify({ status: 'todo' })
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    Swal.fire({
                                        title: "Sukses!",
                                        text: "Task ditandai sebagai belum selesai!",
                                        confirmButtonColor: "#BA181B",
                                    }).then((result) => {
                                        location.reload();
                                    });
                                } else {
                                    Swal.fire(
                                        'Gagal!',
                                        'Ada yang tidak beres!',
                                    ).then((result) => {
                                        location.reload();
                                    });
                                }
                            })
                            .catch(error => {
                                console.error('Error:', error);
                                Swal.fire("Terjadi kesalahan saat memperbarui status task!", {
                                });
                            });
                        } else if (result.dismiss === Swal.DismissReason.cancel) {
                            checkbox.checked = true;
                        }
                    });
                }
            });
        });
    });

$(function () {
    // add new todo ajax request
    $("#add_todo_form").submit(function (e) {
        const addTodoModal = new Modal(document.getElementById('addTodoModal'))
        function closeModal() {
            addTodoModal.hide()
            document.querySelector("body > div[modal-backdrop]")?.remove()
        }
        e.preventDefault();
        const fd = new FormData(this);
        $("#add_todo_btn").text('Menambahkan...');
        $.ajax({
            url: '/todo/store',
            method: 'post',
            data: fd,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function (response) {
                if (response.status == 200) {
                    closeModal()
                    Swal.fire(
                        'Sukses!',
                        'Task berhasil ditambahkan!',
                        'success'
                    ).then((result) => {
                        location.reload();
                      });
                }
            }
        });
    });

     // edit todo ajax request
     $(document).on('click', '.editIcon', function (e) {
        e.preventDefault();
        let id = $(this).attr('id');
        let csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        $.ajax({
            url: '/todo/edit',
            method: 'get',
            data: {
                id: id,
                _token: csrf
            },
            success: function (response) {
                $("#title").val(response.title);
                $("#comment").val(response.comment);
                $("#clock").val(response.clock);
                $("#date").val(response.date);
                $("#status").val(response.status);
                $("#todo_id").val(response.id);
            }
        });
    });

    // update todo ajax request
    $("#edit_todo_form").submit(function (e) {
        const editTodoModal = new Modal(document.getElementById('editTodoModal'))
        function closeEditModal() {
            editTodoModal.hide()
            document.querySelector("body > div[modal-backdrop]")?.remove()
        }
        e.preventDefault();
        const fd = new FormData(this);
        $("#edit_todo_btn").text('Mengubah...');
        $.ajax({
            url: '/todo/update',
            method: 'post',
            data: fd,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function (response) {
                if (response.status == 200) {
                    closeEditModal()
                    Swal.fire(
                        'Sukses!',
                        'Task berhasil diubah!',
                        'success'
                    ).then((result) => {
                        location.reload();
                      });
                }
            }
        });
    });

    // delete todo ajax request
    $(document).on('click', '#btn-delete-todo', function (e) {
        e.preventDefault();
        let id = $(this).data('id');
        let csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '/todo/delete',
                    method: 'delete',
                    data: {
                        id: id,
                        _token: csrf
                    },
                    success: function (response) {
                        if (response.status == 200) {
                            Swal.fire(
                                'Sukses!',
                                'Task berhasil dihapus.',
                                'success'
                            ).then((result) => {
                                $(`#todo-${id}`).remove();
                                location.reload();
                              });
                        }
                        else {
                            Swal.fire(
                                'Gagal!',
                                'Task gagal dihapus.',
                                'error'
                            )
                        }
                    }
                });
            }
        })
    });
});

