<script>
    function sendEmailEmployee() {
        $("#employee-table").on("click", ".btn-email", async function() {
            const id = $(this).data("id");

            const emailModal = $("#email-employee-modal");
            emailModal.modal("show");

            const dataEmployee = await getOneEmployee(id);
            emailModal.find('#email-confirm-nama').text(dataEmployee.nama);
            emailModal.find('#email-confirm-email').text(dataEmployee.email);
            emailModal.find('#email-confirm-jabatan').text(dataEmployee.jabatan);

            emailModal.find("#btn-confirm-email").off("click").on("click", function() {
                $.ajax({
                    url: `${apiUrl}/kirim-email/${id}`,
                    method: "POST",
                    contentType: "application/json",
                    dataType: "json",
                    beforeSend: function() {
                        toggleButtonState(emailModal.find("#btn-confirm-email"), true);
                    },
                    success: function(data) {
                        console.log('Sukses Kirim email', data)
                        toggleButtonState(emailModal.find("#btn-confirm-email"), false);
                        emailModal.modal("hide");
                    },
                    error: function(error) {
                        console.error("Error:", error);
                        toggleButtonState(emailModal.find("#btn-confirm-email"), false);
                    },
                });
            });
        });

        $("#email-employee-modal").on('hidden.bs.modal', function() {
            const emailModal = $("#email-employee-modal");
            emailModal.find('#email-confirm-nama').text('');
            emailModal.find('#email-confirm-email').text('');
            emailModal.find('#email-confirm-jabatan').text('');
        });
    }

    // Get One Employee for Detail
    function getOneEmployee(id) {
        return new Promise((resolve, reject) => {
            $.ajax({
                url: `${apiUrl}/${id}`,
                method: "GET",
                contentType: "application/json",
                dataType: "json",
                success: function(response) {
                    resolve(response.data);
                },
                error: function(xhr, status, error) {
                    reject(error);
                },
            });
        });
    }
</script>
