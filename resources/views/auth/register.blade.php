@extends('layouts.app')

@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-md-4">
            <div class="card">
                <form method="POST" action="{{ route('register.store') }}">
                    @csrf
                    <div class="card-body">
                        <h5 class="card-title">Registrasi!</h5>
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Masukkan Nama">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Masukkan Email">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Masukkan Password">
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password_confirmation"
                                name="password_confirmation" placeholder="Konfirmasi Password">
                        </div>
                        <button type="submit" class="btn btn-primary mb-3">Daftar</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
