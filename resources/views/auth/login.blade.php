@extends('layouts.app')

@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-md-4">
            <div class="card">
                @error('email')
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Gagal!</strong> {{ $message }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @enderror
                <form method="POST" action="{{ route('login.verify') }}">
                    @csrf
                    <div class="card-body">
                        <h5 class="card-title">Silahkan Login!</h5>
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
                        <button type="submit" class="btn btn-primary mb-3">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
