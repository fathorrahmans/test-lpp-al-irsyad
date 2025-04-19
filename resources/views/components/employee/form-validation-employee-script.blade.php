<script>
    function validateAddForm() {
        $("#add-employee-modal").on("shown.bs.modal", function() {
            function checkFormValidity() {
                const addForm = $("#add-employee-form");
                const nama = addForm.find("#nama").val();
                const email = addForm.find("#email").val();
                const jabatan = addForm.find("#jabatan").val();

                if (nama && email && jabatan) {
                    addForm.find("#btn-save").prop("disabled", false);
                } else {
                    addForm.find("#btn-save").prop("disabled", true);
                }
            }

            checkFormValidity();

            // Lihat perubahan di form field
            $("#add-employee-form")
                .find("input, select")
                .on("input", function() {
                    checkFormValidity();
                });
        });
    }

    function validateEditForm() {
        $("#edit-employee-modal").on("shown.bs.modal", function() {
            function checkFormValidity() {
                const editForm = $("#edit-employee-form");
                const nama = editForm.find("#nama").val();
                const email = editForm.find("#email").val();
                const jabatan = editForm.find("#jabatan").val();
                const id = editForm.attr("data-id");

                if (nama && email && jabatan && id) {
                    editForm.find("#btn-update").prop("disabled", false);
                } else {
                    editForm.find("#btn-update").prop("disabled", true);
                }
            }

            checkFormValidity();

            // Lihat perubahan di form field
            $("#edit-employee-form")
                .find("input, select")
                .on("input", function() {
                    checkFormValidity();
                });
        });
    }
</script>
