@extends('layouts.index')
@section('title', 'Profil User')
@section('content')

    <section style="background-color: #eee;">
        <div class="container py-5">

            <div class="row">
                {{-- Sidebar Profile --}}
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src="{{ asset('storage/' . auth()->user()->image) }}" alt="avatar"
                                class="rounded-circle img-fluid" style="width: 150px;">
                            <h2 class="mt-3"><strong>{{ auth()->user()->name }}</strong></h2>
                            <h5 class="text mb-3">{{ auth()->user()->email }}</h5>
                            <div class="d-flex justify-content-center mb-2">
                                <button type="button" class="btn btn-outline-success" data-toggle="modal"
                                    data-target="#modalFoto">
                                    Ubah Foto Profil
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end sidebar profile --}}

                {{-- content profile --}}
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="text-muted mb-0"><strong>Nama</strong></p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ auth()->user()->name }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="text-muted mb-0"><strong>Email</strong></p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ auth()->user()->email }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="text-muted mb-0"><strong>Nomor Telepon</strong></p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ auth()->user()->notelp }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="text-muted mb-0"><strong>Alamat</strong></p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ auth()->user()->alamat }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col">
                                    <div class="d-flex flex-row-reverse">
                                        <button type="button" class="btn btn-outline-warning" data-toggle="modal"
                                            data-target="#modalData">
                                            Ubah Data
                                        </button>
                                        &nbsp; &nbsp;
                                        <a href="{{ url('/reset/akun/' . Crypt::encrypt(auth()->user()->email)) }}"
                                            type="button" class="btn btn-outline-secondary">Ubah Password</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end content profile --}}
            </div>
        </div>

        <!-- Modal Data -->
        <div class="modal fade" id="modalData" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="exampleModalLongTitle"><strong>Ubah Foto Profil</strong></h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('/profil/edit') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name" class="form-label">Nama </label>
                                <input type="text" name="name" class="form-control" id="name"
                                    value="{{ auth()->user()->name }}" required>
                            </div>
                            <div class="form-group">
                                <label for="email" class="form-label">Email </label>
                                <input type="email" name="email" class="form-control" id="email"
                                    value="{{ auth()->user()->email }}" required>
                            </div>
                            <div class="form-group">
                                <label for="notelp" class="form-label">No Telepon </label>
                                <input type="text" name="notelp" class="form-control" id="notelp"
                                    value="{{ auth()->user()->notelp }}" required>
                            </div>
                            <div class="form-group">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea class="form-control" id="alamat" name="alamat" rows="3" required>{{ auth()->user()->alamat }}
                                </textarea>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- end modal data --}}

        {{-- modal foto --}}
        <div class="modal fade" id="modalFoto" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="exampleModalLongTitle"><strong>Ubah Foto Profil</strong></h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('/profil/foto') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="image" class="form-label">Image Baru </label>
                                <input type="file" name="image"
                                    class="form-control @error('image') is-invalid @enderror" id="image" required>
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    Ukuran foto maksimal 5 MB.
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- end modal foto --}}

    </section>

@endsection
