<script>
    function addEmployee() {
        $("#add-employee-form")
            .find("#btn-save")
            .off("click")
            .on("click", function(e) {
                e.preventDefault();

                const addForm = $("#add-employee-form");
                const nama = addForm.find("#nama").val();
                const email = addForm.find("#email").val();
                const jabatan = addForm.find("#jabatan").val();

                $.ajax({
                    url: apiUrl,
                    method: "POST",
                    contentType: "application/json", // request with format JSON
                    dataType: "json", // expected response
                    data: JSON.stringify({
                        nama,
                        email,
                        jabatan,
                    }),
                    beforeSend: function() {
                        toggleButtonState(addForm.find("#btn-save"), true);
                    },
                    success: async function(data) {
                        console.log("Pegawai berhasil ditambahkan:", data);
                        await loadData();
                        toggleButtonState(addForm.find("#btn-save"), false);

                        // Reset Form & Hide
                        $("#add-employee-form")[0].reset();
                        $("#add-employee-modal").modal("hide");
                    },
                    error: function(xhr, status, error) {
                        console.error("Error:", error);
                        toggleButtonState(addForm.find("#btn-save"), false);
                    },
                });
            });
    }
</script>
