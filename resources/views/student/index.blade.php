@extends('layouts.app')

@section('content')
    <h1 class="mb-4 text-center">Data Siswa</h1>

    @include('student.add')
    @include('student.edit')
    @include('student.delete-confirm')

    <div class="row mt-3">
        <table class="table table-hover" id="student-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Kelas</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody id="student-list">
            </tbody>
        </table>
    </div>
    {{-- Pagination --}}
    <div class="d-flex justify-content-end mb-5" id="pagination-wrapper"></div>
@endsection
@push('styles')
    <style>
        .pagination .page-item.active .page-link {
            background-color: #007bff;
            border-color: #007bff;
        }

        .pagination .page-link {
            cursor: pointer;
        }
    </style>
@endpush

@push('script')
    <x-student.load-data-student-script />
    <x-student.add-student-script />
    <x-student.edit-student-script />
    <x-student.delete-student-script />
    <x-student.form-validation-student-script />
    <script>
        // API endpoint for all function student
        const apiUrl = '{{ url('api/siswa') }}';

        // Initialization all function
        $(document).ready(function() {
            loadDataStudent();
            addStudent();
            editStudent();
            deleteStudent();
            validateAddForm();
            validateEditForm();
        });
    </script>
@endpush
