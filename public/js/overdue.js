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
                        if (!dismiss.isConfirmed) {
                            checkbox.checked = false;
                        }
                    }
                }).then((result) => {
                location.reload();
              });
            }
        },
        error: function(xhr, status, error) {
            console.error('Error checking overdue tasks:', error);
        }
    });
}, 30000);
