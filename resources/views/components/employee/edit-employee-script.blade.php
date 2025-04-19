<script>
    function editEmployee() {
        // Get One Employee
        $("#employee-table").off("click").on("click", ".btn-edit", function() {
            const id = $(this).data("id");
            $("#edit-employee-modal").modal("show");
            $.ajax({
                url: `${apiUrl}/${id}`,
                method: "GET",
                contentType: "application/json", // format request
                dataType: "json", // expect response
                success: function(data) {
                    console.log("Berhasil Get One Pegawai:", data.data);
                    const employee = data.data;
                    const nama = employee.nama;
                    const email = employee.email;
                    const jabatan = employee.jabatan;

                    const editForm = $("#edit-employee-form");
                    editForm.find("#nama").val(nama);
                    editForm.find("#email").val(email);
                    editForm.find("#jabatan").val(jabatan);
                    editForm.attr("data-id", id);


                },
                error: function(xhr, status, error) {
                    console.error("Error:", error);
                },
            });
        });

        // Update (PUT) Employee
        $("#edit-employee-form")
            .find("#btn-update")
            .off("click")
            .on("click", function(e) {
                e.preventDefault();

                const editForm = $("#edit-employee-form");
                const nama = editForm.find("#nama").val();
                const email = editForm.find("#email").val();
                const jabatan = editForm.find("#jabatan").val();
                const id = editForm.attr("data-id");

                $.ajax({
                    url: `${apiUrl}/${id}`,
                    method: "PUT",
                    contentType: "application/json",
                    dataType: "json",
                    data: JSON.stringify({
                        nama: nama,
                        email: email,
                        jabatan: jabatan,
                    }),
                    beforeSend: function() {
                        toggleButtonState(editForm.find("#btn-update"), true);
                    },
                    success: function(data) {
                        console.log("Pegawai berhasil diupdate:", data);
                        loadData();
                        toggleButtonState(editForm.find("#btn-update"), false);
                        $("#edit-employee-modal").modal("hide");
                    },
                    error: function(xhr, status, error) {
                        console.error("Error:", error);
                        toggleButtonState(editForm.find("#btn-update"), false);
                    },
                });
            });

        // Reset Form Edit Employee
        $("#edit-employee-modal").on("hidden.bs.modal", function() {
            $(this).find("#edit-employee-form")[0].reset();
        });
    }
</script>
