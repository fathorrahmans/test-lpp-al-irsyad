<script>
    function loadData(page = 1) {
        $.ajax({
            url: `${apiUrl}?page=${page}`,
            method: "GET",
            contentType: "application/json",
            dataType: "json",
            success: function(data) {
                const employeeList = $("#employeeList");
                employeeList.empty();

                $.each(data.data, function(index, pegawai) {
                    const offset = (data.pagination.current_page - 1) * data.pagination.per_page;
                    const tr = $("<tr>").html(`
                    <th>${offset + index + 1}</th>
                    <td>${pegawai.nama}</td>
                    <td>${pegawai.email}</td>
                    <td>${toCapitalize(pegawai.jabatan)}</td>
                    <td class="text-center">
                        <button type="button" class="btn btn-info btn-edit btn-sm" title="Edit Pegawai"
                            data-id="${pegawai.id}">
                            <i class="fa-solid fa-pen"></i>
                        </button>
                        <button type="button" class="btn btn-danger btn-hapus btn-sm" title="Hapus Pegawai"
                            data-id="${pegawai.id}" data-nama="${pegawai.nama}">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
                        <button type="button" class="btn btn-warning btn-email btn-sm" title="Kirim Email"
                            data-id="${pegawai.id}" data-nama="${pegawai.nama}">
                             <i class="fa-solid fa-envelope"></i>
                        </button>
                    </td>
                `);
                    employeeList.append(tr);
                });

                // Load Pagination
                renderPagination(data.pagination);
            },
            error: function(xhr, status, error) {
                console.error("Error:", error);
            },
        });
    }

    function renderPagination(pagination) {
        const wrapper = $("#pagination-wrapper");
        wrapper.empty();

        const {
            current_page,
            last_page
        } = pagination;

        let html = `<nav><ul class="pagination justify-content-center">`;

        // Prev Button
        if (current_page > 1) {
            html += `<li class="page-item">
                    <a class="page-link" href="#" data-page="${current_page - 1}">«</a>
                 </li>`;
        }

        // Page Button
        for (let i = 1; i <= last_page; i++) {
            html += `<li class="page-item ${i === current_page ? 'active' : ''}">
                    <a class="page-link" href="#" data-page="${i}">${i}</a>
                 </li>`;
        }

        // Next Button
        if (current_page < last_page) {
            html += `<li class="page-item">
                    <a class="page-link" href="#" data-page="${current_page + 1}">»</a>
                 </li>`;
        }

        html += `</ul></nav>`;
        wrapper.html(html);

        //
        $(".page-link").on("click", function(e) {
            e.preventDefault();
            const page = $(this).data("page");
            loadData(page);
        });
    }
</script>
