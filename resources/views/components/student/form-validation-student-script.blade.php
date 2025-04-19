<script>
    function validateAddForm() {
        $("#add-student-modal").on("shown.bs.modal", function() {
            function checkFormValidity() {
                const addForm = $("#add-student-form");
                const nama = addForm.find("#nama").val();
                const email = addForm.find("#email").val();
                const kelas = addForm.find("#kelas").val();

                if (nama && email && kelas) {
                    addForm.find("#btn-save").prop("disabled", false);
                } else {
                    addForm.find("#btn-save").prop("disabled", true);
                }
            }

            checkFormValidity();

            // Lihat perubahan di form field
            $("#add-student-form")
                .find("input, select")
                .on("input", function() {
                    checkFormValidity();
                });
        });
    }

    function validateEditForm() {
        $("#edit-student-modal").on("shown.bs.modal", function() {
            function checkFormValidity() {
                const editForm = $("#edit-student-form");
                const nama = editForm.find("#nama").val();
                const email = editForm.find("#email").val();
                const kelas = editForm.find("#kelas").val();
                const id = editForm.attr("data-id");

                if (nama && email && kelas && id) {
                    editForm.find("#btn-update").prop("disabled", false);
                } else {
                    editForm.find("#btn-update").prop("disabled", true);
                }
            }

            checkFormValidity();

            // Lihat perubahan di form field
            $("#edit-student-form")
                .find("input, select")
                .on("input", function() {
                    checkFormValidity();
                });
        });
    }
</script>
