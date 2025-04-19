@extends('layouts.app')

@section('content')
    <h1 class="mb-4 text-center">Data Pegawai</h1>
    @include('employee.add')
    @include('employee.edit')
    @include('employee.delete-confirm')
    @include('employee.email-confirm')
    <div class="row mt-3">
        <table class="table table-hover" id="employee-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Jabatan</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody id="employeeList">
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
    <x-employee.load-data-script />
    <x-employee.add-employee-script />
    <x-employee.edit-employee-script />
    <x-employee.delete-employee-script />
    <x-employee.form-validation-employee-script />
    <x-employee.send-email-employee-script />
    <script>
        // API endpoint for all function employee
        const apiUrl = '{{ url('api/pegawai') }}';

        // Initialization all function
        $(document).ready(function() {
            loadData();
            addEmployee();
            editEmployee();
            deleteEmployee();
            validateAddForm();
            validateEditForm();
            sendEmailEmployee();
        });
    </script>
@endpush
