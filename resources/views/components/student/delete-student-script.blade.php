<script>
    function deleteStudent() {
        $("#student-table").on("click", ".btn-hapus", function() {
            const id = $(this).data("id");
            const nama = $(this).data("nama");

            const deleteModal = $("#delete-modal");
            deleteModal.find("#student-nama").text(nama);
            deleteModal.modal("show");

            deleteModal.find("#btn-confirm-delete").off("click").on("click", function() {
                $.ajax({
                    url: `${apiUrl}/${id}`,
                    method: "DELETE",
                    contentType: "application/json",
                    dataType: "json",
                    beforeSend: function() {
                        toggleButtonState(deleteModal.find("#btn-confirm-delete"), true);
                    },
                    success: function(data) {
                        loadDataStudent();
                        toggleButtonState(deleteModal.find("#btn-confirm-delete"), false);
                        deleteModal.modal("hide");
                    },
                    error: function(error) {
                        console.error("Error:", error);
                        toggleButtonState(deleteModal.find("#btn-confirm-delete"), false);
                    },
                });
            });
        });
    }
</script>
