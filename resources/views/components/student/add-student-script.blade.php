<script>
    function addStudent() {
        $("#add-student-form")
            .find("#btn-save")
            .off("click")
            .on("click", function(e) {
                e.preventDefault();

                const addForm = $("#add-student-form");
                const nama = addForm.find("#nama").val();
                const email = addForm.find("#email").val();
                const kelas = addForm.find("#kelas").val();

                $.ajax({
                    url: apiUrl,
                    method: "POST",
                    contentType: "application/json", // request with format JSON
                    dataType: "json", // expected response
                    data: JSON.stringify({
                        nama,
                        email,
                        kelas,
                    }),
                    beforeSend: function() {
                        toggleButtonState(addForm.find("#btn-save"), true);
                    },
                    success: async function(data) {
                        console.log("Siswa berhasil ditambahkan:", data);
                        await loadDataStudent();
                        toggleButtonState(addForm.find("#btn-save"), false);

                        // Reset Form & Hide
                        $("#add-student-form")[0].reset();
                        $("#add-student-modal").modal("hide");
                    },
                    error: function(xhr, status, error) {
                        console.error("Error:", error);
                        toggleButtonState(addForm.find("#btn-save"), false);
                    },
                });
            });
    }
</script>
