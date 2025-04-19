<script>
    function editStudent() {
        // Get One Student
        $("#student-table").off("click").on("click", ".btn-edit", function() {
            const id = $(this).data("id");
            $("#edit-student-modal").modal("show");
            $.ajax({
                url: `${apiUrl}/${id}`,
                method: "GET",
                contentType: "application/json", // format request
                dataType: "json", // expect response
                success: function(data) {
                    console.log("Berhasil Get One Siswa:", data.data);
                    const student = data.data;

                    const editForm = $("#edit-student-form");
                    editForm.find("#nama").val(student.nama);
                    editForm.find("#email").val(student.email);
                    editForm.find("#kelas").val(student.kelas);
                    editForm.attr("data-id", id);


                },
                error: function(xhr, status, error) {
                    console.error("Error:", error);
                },
            });
        });

        // Update (PUT) student
        $("#edit-student-form")
            .find("#btn-update")
            .off("click")
            .on("click", function(e) {
                e.preventDefault();

                const editForm = $("#edit-student-form");
                const nama = editForm.find("#nama").val();
                const email = editForm.find("#email").val();
                const kelas = editForm.find("#kelas").val();
                const id = editForm.attr("data-id");

                $.ajax({
                    url: `${apiUrl}/${id}`,
                    method: "PUT",
                    contentType: "application/json",
                    dataType: "json",
                    data: JSON.stringify({
                        nama: nama,
                        email: email,
                        kelas: kelas,
                    }),
                    beforeSend: function() {
                        toggleButtonState(editForm.find("#btn-update"), true);
                    },
                    success: function(data) {
                        console.log("Siswa berhasil diupdate:\n", data);
                        loadDataStudent();
                        toggleButtonState(editForm.find("#btn-update"), false);
                        $("#edit-student-modal").modal("hide");
                    },
                    error: function(xhr, status, error) {
                        console.error("Error:", error);
                        toggleButtonState(editForm.find("#btn-update"), false);
                    },
                });
            });

        // Reset Form Edit student
        $("#edit-student-modal").on("hidden.bs.modal", function() {
            $(this).find("#edit-student-form")[0].reset();
        });
    }
</script>
