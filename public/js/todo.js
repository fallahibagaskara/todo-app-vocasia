$(function () {

    // add new todo ajax request
    $("#add_todo_form").submit(function (e) {
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
                    Swal.fire(
                        'Sukses!',
                        'Task berhasil ditambahkan!',
                        'success'
                    )
                    fetchAllTodos();
                }
                $("#add_todo_btn").text('Tambahkan');
                $("#add_todo_form")[0].reset();
                $("#addTodoModal").modal('hide');
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
                    Swal.fire(
                        'Sukses!',
                        'Task berhasil diubah!',
                        'success'
                    )
                    fetchAllTodos();
                }
                $("#edit_todo_btn").text('Submit');
                $("#edit_todo_form")[0].reset();
                $("#editTodoModal").modal('hide');
            }
        });
    });

    // delete todo ajax request
    $(document).on('click', '.deleteIcon', function (e) {
        e.preventDefault();
        let id = $(this).attr('id');
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
                            )
                            fetchAllTodos();
                        }
                        else {
                            Swal.fire(
                                'Gagal!',
                                'Task gagal dihapus.',
                                'error'
                            )
                            fetchAllTodos();
                        }
                    }
                });
            }
        })
    });

    // fetch all todo ajax request
    fetchAllTodos();

    function fetchAllTodos() {
        $.ajax({
            url: '/todo/fetchall',
            method: 'get',
            success: function (response) {
                $("#show_all_todo").html(response);
                $(".table").DataTable({
                    order: [0, 'desc'],
                });

            }
        });
    }
});

