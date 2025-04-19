@extends('layouts.app')

@section('content')
    <h1 class="mb-4 text-center">Data Pegawai</h1>

    @include('employee.add')
    @include('employee.edit')

    <div class="row mt-3">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Jabatan</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if ($employees->isEmpty())
                    <td colspan="5" class="text-center">Tidak Ada Data Pegawai</td>
                @endif
                @foreach ($employees as $employee)
                    <tr>
                        <th>{{ ($employees->currentPage() - 1) * $employees->perPage() + $loop->iteration }}
                        </th>
                        <td>{{ $employee->nama }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ ucwords($employee->jabatan) }}</td>
                        <td class="text-center">
                            <button type="button" class="btn btn-info btn-edit btn-sm" title="Edit Pegawai"
                                data-bs-toggle="modal" data-bs-target="#pegawaiModal" data-id="{{ $employee->id }}"
                                data-nama="{{ $employee->nama }}" data-email="{{ $employee->email }}"
                                data-jabatan="{{ $employee->jabatan }}">
                                <i class="fa-solid fa-pen"></i>
                            </button>
                            <form action="{{ route('pegawai.destroy', $employee->id) }}" method="POST"
                                style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" title="Hapus Pegawai"
                                    onclick="return confirm('Yakin ingin menghapus?')">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </form>
                            <form action="{{ route('pegawai.email', $employee->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button class="btn btn-sm btn-warning" title="Kirim Email"
                                    onclick="return confirm('Yakin kirim email ke {{ $employee->email }}?')">
                                    <i class="fa-solid fa-envelope"></i>
                                </button>
                            </form>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{-- Pagination --}}
    <div class="d-flex justify-content-end mb-5">
        {{ $employees->onEachSide(0)->links('vendor.pagination.bootstrap-5') }}
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $('.btn-edit').on('click', function() {
                const id = $(this).data('id');
                const nama = $(this).data('nama');
                const email = $(this).data('email');
                const jabatan = $(this).data('jabatan');

                // Isi form modal edit pegawai
                $('#pegawaiModalEdit input[name="nama"]').val(nama);
                $('#pegawaiModalEdit input[name="email"]').val(email);
                $('#pegawaiModalEdit select[name="jabatan"]').val(jabatan);

                // Set action form ke route update pegawai
                $('#pegawaiModalEdit form').attr('action', `{{ url('pegawai') }}/${id}`);

                // Ganti method menjadi PUT
                $('#pegawaiModalEdit form').append('@method('PUT')');

                $('#pegawaiModalEdit').modal('show');
            });

            // Reset form saat modal ditutup
            $('#pegawaiModalEdit').on('hidden.bs.modal', function() {
                $(this).find('form')[0].reset();
                $(this).find('form').attr('action', '');
                $(this).find('form').find('input[name="_method"]').remove();
            });
        });
    </script>
@endpush
