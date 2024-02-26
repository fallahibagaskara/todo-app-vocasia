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
                // $("#add_todo_btn").text('Tambahkan');
                // $("#add_todo_form")[0].reset();
                // // $("#addTodoModal").modal('hide');
                // let todo = `<tr class="bg-white hover:bg-gray-50" id="index_${response.data.id}">
                //     <td class="w-4 p-4">
                //         <div class="flex items-center">
                //             <input id="checkbox-table-search-3" type="checkbox"
                //                 class="w-4 h-4 text-gray-600 bg-white border-2 border-gray-400 rounded focus:ring-red-500-800-800 focus:ring-2">
                //             <label for="checkbox-table-search-3" class="sr-only">checkbox</label>
                //         </div>
                //     </td>
                //     <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                //         <h5 class="mb-1 text-sm font-bold tracking-tight text-gray-900">
                //             ${response.data.title}</h5>
                //         <p class="mb-2 text-xs font-normal text-gray-700">${response.data.comment}</p>
                //         <div class="flex justify-start">
                //             <p class="mr-2 text-xs font-bold text-red-500">${response.data.clock} AM</p>
                //             <svg width="4" height="4" viewBox="0 0 4 4" fill="none"
                //                 xmlns="http://www.w3.org/2000/svg">
                //                 <circle cx="2" cy="2" r="2" fill="#737373" />
                //             </svg>
                //             <p class="ml-2 text-xs font-normal text-gray-700">${response.data.date}</p>
                //         </div>
                //     </th>
                //     <td class="flex items-center px-6 py-9">
                //         <a href="javascript:void(0)" id="btn-edit-todo"
                //             data-id="${response.data.id}" class="font-medium hover:underline">
                //             <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none"
                //                 xmlns="http://www.w3.org/2000/svg">
                //                 <path
                //                     d="M16.474 5.40807L18.592 7.52507L16.474 5.40807ZM17.836 3.54307L12.109 9.27007C11.8131 9.56557 11.6113 9.94205 11.529 10.3521L11 13.0001L13.648 12.4701C14.058 12.3881 14.434 12.1871 14.73 11.8911L20.457 6.16407C20.6291 5.99197 20.7656 5.78766 20.8588 5.56281C20.9519 5.33795 20.9998 5.09695 20.9998 4.85357C20.9998 4.61019 20.9519 4.36919 20.8588 4.14433C20.7656 3.91948 20.6291 3.71517 20.457 3.54307C20.2849 3.37097 20.0806 3.23446 19.8557 3.14132C19.6309 3.04818 19.3899 3.00024 19.1465 3.00024C18.9031 3.00024 18.6621 3.04818 18.4373 3.14132C18.2124 3.23446 18.0081 3.37097 17.836 3.54307V3.54307Z"
                //                     stroke="#737373" stroke-width="2" stroke-linecap="round"
                //                     stroke-linejoin="round" />
                //                 <path
                //                     d="M19 15V18C19 18.5304 18.7893 19.0391 18.4142 19.4142C18.0391 19.7893 17.5304 20 17 20H6C5.46957 20 4.96086 19.7893 4.58579 19.4142C4.21071 19.0391 4 18.5304 4 18V7C4 6.46957 4.21071 5.96086 4.58579 5.58579C4.96086 5.21071 5.46957 5 6 5H9"
                //                     stroke="#737373" stroke-width="2" stroke-linecap="round"
                //                     stroke-linejoin="round" />
                //             </svg>
                //         </a>
                //         <a href="javascript:void(0)" id="btn-delete-todo"
                //             data-id="${response.data.id}" class="font-medium hover:underline ms-3">
                //             <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none"
                //                 xmlns="http://www.w3.org/2000/svg">
                //                 <path
                //                     d="M12 1.75C12.8301 1.74995 13.6288 2.06755 14.2322 2.63767C14.8356 3.20779 15.198 3.98719 15.245 4.816L15.25 5H20.5C20.69 5.00006 20.8729 5.07224 21.0118 5.20197C21.1506 5.3317 21.2351 5.5093 21.248 5.69888C21.261 5.88846 21.2015 6.07589 21.0816 6.2233C20.9617 6.37071 20.7902 6.4671 20.602 6.493L20.5 6.5H19.704L18.424 19.52C18.3599 20.1691 18.0671 20.7743 17.598 21.2275C17.1289 21.6806 16.5139 21.9523 15.863 21.994L15.687 22H8.313C7.66046 22 7.02919 21.7679 6.53201 21.3453C6.03482 20.9227 5.70412 20.337 5.599 19.693L5.576 19.519L4.295 6.5H3.5C3.31876 6.49999 3.14366 6.43436 3.00707 6.31523C2.87048 6.19611 2.78165 6.03155 2.757 5.852L2.75 5.75C2.75001 5.56876 2.81564 5.39366 2.93477 5.25707C3.05389 5.12048 3.21845 5.03165 3.398 5.007L3.5 5H8.75C8.75 4.13805 9.09241 3.3114 9.7019 2.7019C10.3114 2.09241 11.138 1.75 12 1.75ZM18.197 6.5H5.802L7.069 19.372C7.09705 19.6592 7.22362 19.9279 7.42722 20.1324C7.63082 20.3369 7.89892 20.4647 8.186 20.494L8.313 20.5H15.687C16.287 20.5 16.796 20.075 16.912 19.498L16.932 19.372L18.196 6.5H18.197ZM13.75 9.25C13.9312 9.25001 14.1063 9.31564 14.2429 9.43477C14.3795 9.55389 14.4684 9.71845 14.493 9.898L14.5 10V17C14.4999 17.19 14.4278 17.3729 14.298 17.5118C14.1683 17.6506 13.9907 17.7351 13.8011 17.748C13.6115 17.761 13.4241 17.7015 13.2767 17.5816C13.1293 17.4617 13.0329 17.2902 13.007 17.102L13 17V10C13 9.80109 13.079 9.61032 13.2197 9.46967C13.3603 9.32902 13.5511 9.25 13.75 9.25ZM10.25 9.25C10.4312 9.25001 10.6063 9.31564 10.7429 9.43477C10.8795 9.55389 10.9684 9.71845 10.993 9.898L11 10V17C10.9999 17.19 10.9278 17.3729 10.798 17.5118C10.6683 17.6506 10.4907 17.7351 10.3011 17.748C10.1115 17.761 9.92411 17.7015 9.7767 17.5816C9.62929 17.4617 9.5329 17.2902 9.507 17.102L9.5 17V10C9.5 9.80109 9.57902 9.61032 9.71967 9.46967C9.86032 9.32902 10.0511 9.25 10.25 9.25ZM12 3.25C11.5608 3.25002 11.1377 3.41517 10.8146 3.71268C10.4915 4.01019 10.2921 4.4183 10.256 4.856L10.25 5H13.75C13.75 4.53587 13.5656 4.09075 13.2374 3.76256C12.9092 3.43437 12.4641 3.25 12 3.25Z"
                //                     fill="#737373" />
                //             </svg>
                //         </a>
                //     </td>
                // </tr>`;
                // $('#table-todos').prepend(todo);
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
                $("#edit_todo_btn").text('Submit');
                $("#edit_todo_form")[0].reset();
                // $("#editTodoModal").modal('hide');
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
                            // fetchAllTodos();
                        }
                        else {
                            Swal.fire(
                                'Gagal!',
                                'Task gagal dihapus.',
                                'error'
                            )
                            // fetchAllTodos();
                        }
                    }
                });
            }
        })
    });

    // fetch all todo ajax request
    // fetchAllTodos();

//     function fetchAllTodos() {
//         $.ajax({
//             url: '/todo/fetchall',
//             method: 'get',
//             success: function (response) {
//                 $("#show_all_todo").html(response);
//                 $(".table").DataTable({
//                     order: [0, 'desc'],
//                 });

//             }
//         });
//     }
});

