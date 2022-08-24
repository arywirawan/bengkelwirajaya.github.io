@extends('layouts.dashboard')
@section('title', 'Detil Bahan')
@section('content')
    <div class="container-fluid">
        <!-- table kategori -->
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Detil Bahan</h4>
                        <div class="card-tools">
                            <a href="{{ route('detilbahan.create') }}" class="btn btn-sm btn-primary">
                                Baru
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('detilbahan.index') }}" method="GET">
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
                                        <th>Produk</th>
                                        <th>Bahan</th>
                                        <th>Jumlah</th>
                                        <th>Biaya Bahan</th>
                                        <th>Total Harga</th>
                                        <th width="15%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $no = 1;
                                    ?>
                                    @foreach ($detilbahan as $detilkey => $item)
                                        @php
                                            echo $item->id;
                                        @endphp
                                        <tr>
                                            <td>
                                                {{ $no++ }}
                                            </td>
                                            <td>
                                                {{ $item->produk->nama_produk }}
                                            </td>
                                            <td>
                                                <?php
                                                // nama bahan
                                                foreach ($detilbahan[$detilkey]->bahan as $bahankey => $value) {
                                                    echo $value->nama_bahan;
                                                    echo '<hr>';
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                // jumlah
                                                foreach ($detilbahan[$detilkey]->bahan as $bahankey => $value) {
                                                    echo $value->jumlah;
                                                    echo '<hr>';
                                                }
                                                ?>
                                            </td>

                                            <td>
                                                <?php
                                                // biaya
                                                foreach ($detilbahan[$detilkey]->bahan as $bahankey => $value) {
                                                    echo $value->harga;
                                                    echo '<hr>';
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                // total
                                                foreach ($detilbahan[$detilkey]->bahan as $bahankey => $value) {
                                                    echo $value->harga * $value->jumlah;
                                                    echo '<hr>';
                                                }
                                                ?>
                                            </td>


                                            <td>
                                                <a href="{{ route('detilbahan.edit', $item->id) }}"
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
                                                        <h5 class="modal-title" id="exampleModalLabel">Deskripsi Kategori
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        {{ $item->deskripsi_kategori }}
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
                                                        <h5 class="modal-title" id="exampleModalLabel">Hapus Bahan
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
                                                        <form action="{{ route('detilbahan.destroy', $item->id) }}"
                                                            method="post" style="display:inline;">
                                                            @csrf
                                                            {{ method_field('delete') }}
                                                            <button type="submit" class="btn btn-sm btn-danger mb-2">
                                                                Hapus
                                                            </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- untuk menampilkan link page, tambahkan skrip di bawah ini -->
                            {{-- {{ $detilbahan->links() }} --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
