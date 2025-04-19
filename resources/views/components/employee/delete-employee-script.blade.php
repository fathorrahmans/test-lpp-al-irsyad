<script>
    function deleteEmployee() {
        $("#employee-table").on("click", ".btn-hapus", function() {
            const id = $(this).data("id");
            const nama = $(this).data("nama");

            const deleteModal = $("#delete-modal");
            deleteModal.find("#employee-nama").text(nama);
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
                        loadData();
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
