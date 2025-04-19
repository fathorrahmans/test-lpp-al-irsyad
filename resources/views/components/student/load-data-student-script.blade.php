<script>
    function loadDataStudent(page = 1) {
        $.ajax({
            url: `${apiUrl}?page=${page}`,
            method: "GET",
            contentType: "application/json",
            dataType: "json",
            success: function(data) {
                const studentList = $("#student-list");
                studentList.empty();

                $.each(data.data, function(index, student) {
                    const offset = (data.pagination.current_page - 1) * data.pagination.per_page;
                    const tr = $("<tr>").html(`
                    <th>${offset + index + 1}</th>
                    <td>${student.nama}</td>
                    <td>${student.email}</td>
                    <td>${toUpper(student.kelas)}</td>
                    <td class="text-center">
                        <button type="button" class="btn btn-info btn-edit btn-sm" title="Edit Siswa"
                            data-id="${student.id}">
                            <i class="fa-solid fa-pen"></i>
                        </button>
                        <button type="button" class="btn btn-danger btn-hapus btn-sm" title="Hapus Siswa"
                            data-id="${student.id}" data-nama="${student.nama}">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
                    </td>
                `);
                    studentList.append(tr);
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
            loadDataStudent(page);
        });
    }
</script>
