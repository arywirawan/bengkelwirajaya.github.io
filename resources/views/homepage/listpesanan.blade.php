@extends('layouts.index')
@section('title', 'Pesanan')
@section('content')
    <!-- Start Cart  -->
    <div class="cart-box-main">
        <div class="container">
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
            <div class="row mb-3">
                <div class="col">
                    Pembayaran dapat dilakukan ke :
                </div>
                <div class="col">
                    <img src="{{ asset('images/payment-icon/bca.png') }}" alt="" style="width: 60px">
                    No Rekening : 8735089xxx
                </div>
                <div class="col">
                    <img src="{{ asset('images/payment-icon/bni.png') }}" alt="" style="width: 60px">
                    No Rekening : 0105189xxx
                </div>
                <div class="col">
                    <img src="{{ asset('images/payment-icon/bpd.png') }}" alt="" style="height: 40px">
                    No Rekening : 0101212897xxx
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-main table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID Pesanan</th>
                                    <th>Produk</th>
                                    <th>Panjang</th>
                                    <th>Lebar</th>
                                    <th>Kuantitas</th>
                                    <th>Total Pembayaran</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list as $listkey => $item)
                                    <tr>
                                        <td class="name-pr">
                                            <a href="#">
                                                {{ $item->id }}
                                            </a>
                                        </td>
                                        <td class="name-pr">
                                            <a href="#">
                                                <?php
                                                foreach ($list[$listkey]->listpesanan as $listpesanankey => $value) {
                                                    echo $value->nama_produk;
                                                    echo '<hr>';
                                                }
                                                ?>
                                            </a>
                                        </td>
                                        <td class="price-pr">
                                            <p>
                                                <?php
                                                foreach ($list[$listkey]->listpesanan as $listpesanankey => $value) {
                                                    echo $value->panjang . ' mm';
                                                    echo '<hr>';
                                                }
                                                ?>
                                            </p>
                                        </td>
                                        <td class="price-pr">
                                            <p>
                                                <?php
                                                foreach ($list[$listkey]->listpesanan as $listpesanankey => $value) {
                                                    echo $value->lebar . ' mm';
                                                    echo '<hr>';
                                                }
                                                ?>
                                            </p>
                                        </td>
                                        <td class="price-pr">
                                            <p>
                                                <?php
                                                foreach ($list[$listkey]->listpesanan as $listpesanankey => $value) {
                                                    echo $value->kuantitas;
                                                    echo '<hr>';
                                                }
                                                ?>
                                            </p>
                                        </td>
                                        <td class="total-pr">
                                            <p><strong>
                                                    <center>Rp {{ $item->harga_total }}</center>
                                                </strong></p>
                                        </td>
                                        <td>
                                            <span>{{ $item->status }}</span>
                                        </td>
                                        <td>
                                            @if ($item->status == 'Belum Dibayar')
                                                <a type="button" class="btn btn-sm btn-success" data-toggle="modal"
                                                    data-target="#uploadModal{{ $item->id }}" href="#">
                                                    Bayar
                                                </a>
                                            @endif
                                            @if ($item->status !== 'Selesai')
                                                <a type="button" class="btn btn-sm btn-outline-warning" data-toggle="modal"
                                                    data-target="#selesaiModal{{ $item->id }}">Pesanan Diterima</a>
                                            @endif

                                        </td>
                                    </tr>
                                    <!-- Upload Modal -->
                                    <div class="modal fade" id="uploadModal{{ $item->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title" id="exampleModalLabel">Form Pembayaran
                                                    </h1>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('uploadbukti') }}" enctype="multipart/form-data"
                                                        method="POST">
                                                        @csrf
                                                        <div class="form-group">
                                                            <label for="nama_kategori">ID Pesanan</label>
                                                            <input type="text" name="pesanan_id" id="pesanan_id"
                                                                class="form-control" readonly value="{{ $item->id }}">
                                                        </div>
                                                        <input type="hidden" name="user_id" value="{{ $item->user_id }}">
                                                        <div class="form-group">
                                                            <label for="nama_kategori">Bank</label>
                                                            <select class="custom-select" id="inputGroupSelect01"
                                                                name="bank" required>
                                                                <option selected value="">Pilih Bank</option>
                                                                <option value="BCA">BCA - Norek: 8735089xxx </option>
                                                                <option value="BNI">BNI - Norek: 0105189xxx</option>
                                                                <option value="BPD">BPD - Norek: 0101212897xxx</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="deskripsi">Bukti Pembayaran</label>
                                                            <input type="file" name="bukti_upload" id="bukti_upload"
                                                                class="form-control">
                                                        </div>
                                                        <input type="hidden" name="status" value="Belum Terkonfirmasi">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-sm btn-primary">Upload</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- End Modal Upload --}}

                                    {{-- Pesanan Diterima Modal --}}
                                    <div class="modal fade" id="selesaiModal{{ $item->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title" id="exampleModalLabel">Pesanan Diterima
                                                    </h1>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ url('/listpesanan/selesai/' . $item->id) }}"
                                                        enctype="multipart/form-data" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        Apakah yakin menyelesaikan pesanan?
                                                        <input type="hidden" name="status" value="Selesai">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-sm btn-primary">Selesai</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- End Pesanan Diterima --}}
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Cart -->
@endsection
