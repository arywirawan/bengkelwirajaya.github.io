@extends('layouts.dashboard')
@section('title', 'Produk')
@section('content')
    <div class="container-fluid">
        <!-- table kategori -->
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Produk</h4>
                        <div class="card-tools">
                            <a href="{{ route('produk.create') }}" class="btn btn-sm btn-primary">
                                Baru
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('produk.index') }}" method="GET">
                            <div class="row">
                                <div class="col">
                                    <input type="text" value="{{ request('keyword') }}" name="keyword" id="keyword"
                                        class="form-control" placeholder="ketik keyword disini">
                                </div>
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-primary">
                                        Cari
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-body">
                        @if ($message = Session::get('success'))
                            <div class="container-fluid">
                                <div class="alert alert-success alert-dismissible fade show">
                                    <p>{{ $message }}</p>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th width="50px">ID</th>
                                        <th>Nama</th>
                                        <th>Gambar</th>
                                        <th>Harga</th>
                                        <th>Deskripsi</th>
                                        <th width="15%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($produk as $item)
                                        <tr>
                                            <td>
                                                {{ $item->id }}
                                            </td>
                                            <td>
                                                {{ $item->nama_produk }}
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <a type="button" class="" data-toggle="modal"
                                                        data-target="#showModal{{ $item->id }}"><img
                                                            src="{{ asset('gambar/' . $item->foto_produk) }}" alt=""
                                                            style="width:70px"></a>
                                                </div>
                                            </td>
                                            <td>
                                                {{ $item->harga_jasa }}
                                            </td>
                                            <td>
                                                <!-- Button trigger modal -->
                                                <a type="button" class="" data-toggle="modal"
                                                    data-target="#exampleModal{{ $item->id }}" href="#">
                                                    Klik link untuk lihat detail
                                                </a>
                                            </td>

                                            </td>
                                            <td>
                                                <a href="{{ route('produk.edit', $item->id) }}"
                                                    class="btn btn-sm btn-primary mr-2 mb-2"><i class="fas fa-edit"></i>
                                                    Edit
                                                </a>
                                                <a type="button" class="btn btn-sm btn-danger mr-2 mb-2"
                                                    data-toggle="modal" data-target="#deleteModal{{ $item->id }}"
                                                    href="#"><i class="fas fa-trash"></i>
                                                    Hapus
                                                </a>
                                            </td>
                                        </tr>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Deskripsi Produk
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        {!! $item->deskripsi !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Delete Modal -->
                                        <div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Hapus Produk
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Apakah Anda yakin menghapus data ini?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-sm btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <form action="{{ route('produk.destroy', $item->id) }}"
                                                            method="post" style="display:inline;">
                                                            @csrf
                                                            {{ method_field('delete') }}
                                                            <button type="submit" class="btn btn-sm btn-danger mb-2">
                                                                Hapus
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- End Delete Modal --}}
                                        {{-- Show Modal --}}
                                        <div class="modal fade" id="showModal{{ $item->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <button type="button" class="close text-light" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <img src="{{ asset('gambar/' . $item->foto_produk) }}" alt=""
                                                    style="width:500px">

                                            </div>
                                        </div>
                                        {{-- End Modal --}}
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- untuk menampilkan link page, tambahkan skrip di bawah ini -->
                            {{ $produk->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
