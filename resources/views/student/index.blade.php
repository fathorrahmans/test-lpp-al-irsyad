@extends('layouts.app')

@section('content')
    <h1 class="mb-4 text-center">Data Siswa</h1>

    @include('student.add')
    @include('student.edit')

    <div class="row mt-3">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Kelas</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if ($students->isEmpty())
                    <td colspan="5" class="text-center">Tidak Ada Data Siswa</td>
                @endif
                @foreach ($students as $student)
                    <tr>
                        <th>{{ ($students->currentPage() - 1) * $students->perPage() + $loop->iteration }}
                        </th>
                        <td>{{ $student->nama }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ strtoupper($student->kelas) }}</td>
                        <td class="text-center">
                            <button type="button" class="btn btn-info btn-edit btn-sm" title="Edit Siswa"
                                data-bs-toggle="modal" data-bs-target="#siswaModal" data-id="{{ $student->id }}"
                                data-nama="{{ $student->nama }}" data-email="{{ $student->email }}"
                                data-kelas="{{ $student->kelas }}">
                                <i class="fa-solid fa-pen"></i>
                            </button>
                            <form action="{{ route('siswa.destroy', $student->id) }}" method="POST"
                                style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" title="Hapus Siswa"
                                    onclick="return confirm('Yakin ingin menghapus?')">
                                    <i class="fa-solid fa-trash-can"></i>
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
        {{ $students->onEachSide(0)->links('vendor.pagination.bootstrap-5') }}
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $('.btn-edit').on('click', function() {
                const id = $(this).data('id');
                const nama = $(this).data('nama');
                const email = $(this).data('email');
                const kelas = $(this).data('kelas');

                // Isi form modal edit siswa
                $('#siswaModalEdit input[name="nama"]').val(nama);
                $('#siswaModalEdit input[name="email"]').val(email);
                $('#siswaModalEdit select[name="kelas"]').val(kelas);

                // Set action form ke route update siswa
                $('#siswaModalEdit form').attr('action', `{{ url('siswa') }}/${id}`);

                // Ganti method menjadi PUT
                $('#siswaModalEdit form').append('@method('PUT')');

                $('#siswaModalEdit').modal('show');
            });

            // Reset form saat modal ditutup
            $('#siswaModalEdit').on('hidden.bs.modal', function() {
                $(this).find('form')[0].reset();
                $(this).find('form').attr('action', '');
                $(this).find('form').find('input[name="_method"]').remove();
            });
        });
    </script>
@endpush
