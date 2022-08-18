@extends('layouts.index')
@section('title', 'Pesanan')
@section('content')
    <!-- Start Cart  -->
    <div class="cart-box-main">
        <div class="container">
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
                                <tr>
                                    <td class="name-pr">
                                        <a href="#">
                                            1
                                        </a>
                                    </td>
                                    <td class="name-pr">
                                        <a href="#">
                                            Teralis Jendela
                                        </a>
                                    </td>
                                    <td class="price-pr">
                                        <p>600 mm</p>
                                    </td>
                                    <td class="price-pr">
                                        <p>600 mm</p>
                                    </td>
                                    <td class="price-pr">
                                        <p>2</p>
                                    </td>
                                    <td class="total-pr">
                                        <p>Rp 2400000</p>
                                    </td>
                                    <td>
                                        <span class="badge badge-danger">Belum Dibayar</span>
                                    </td>
                                    <td>
                                        <a type="button" class="btn btn-sm btn-success" data-toggle="modal"
                                            data-target="#deleteModal1" href="#">
                                            Bayar
                                        </a>
                                        <a type="button" class="btn btn-sm btn-outline-warning">Pesanan Diterima</a>

                                    </td>
                                </tr>
                                <!-- Delete Modal -->
                                <div class="modal fade" id="deleteModal1" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Form Pembayaran
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form>

                                                    <div class="form-group">
                                                        <label for="nama_kategori">ID Pesanan</label>
                                                        <input type="text" name="id_pesanan" id="id_pesanan"
                                                            class="form-control" disabled value="1">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="deskripsi">Bukti Pembayaran</label>
                                                        <input type="file" name="bukti_upload" id="bukti_upload"
                                                            class="form-control">
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-sm btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-sm btn-primary"
                                                    data-dismiss="modal">Upload</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Cart -->
@endsection
