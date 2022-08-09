@extends('layouts.dashboard')
@section('title', 'Pesanan')
@section('content')
    <div class="container-fluid">
        <!-- table kategori -->
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="pull-right mb-2">
                            <a class="btn btn-primary" id="tombol-tambah" href="{{ route('pesanan.create') }}">Tambah
                                Pesanan</a>
                        </div>
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
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="ajax-crud-datatable">
                                <thead class="thead-dark">
                                    <tr>
                                        <th style="width: 3% !important">No</th>
                                        <th>User</th>
                                        <th>Produk</th>
                                        <th>Kuantitas</th>
                                        <th>Harga Total</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="ajaxModel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modelHeading"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-bordered table-hover">

                                <thead>
                                    <tr>
                                        <th>ID Pesanan</th>
                                        <td><span id="pesanan_id" value="" class="badge badge-success"></span></td>
                                    </tr>
                                    <tr>
                                        <th>ID User</th>
                                        <td><span id="user_id"></span></td>
                                    </tr>
                                    <tr>
                                        <th>Id Produk</th>
                                        <td><span id="produk_id"></span></td>
                                    </tr>
                                    <tr>
                                        <th>Panjang</th>
                                        <td><span id="panjang"></span> cm</td>
                                    </tr>
                                    <tr>
                                        <th>Lebar</th>
                                        <td><span id="lebar"></span> cm</td>
                                    </tr>
                                    <tr>
                                        <th>Tebak</th>
                                        <td><span id="tebal"> </span> cm</td>
                                    </tr>
                                </thead>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Delete data --}}
    {{-- <form method="POST" action="{{ route('kategori.destroy') }}">

    </form> --}}



@endsection

{{-- Section AJax --}}
@section('ajax')
    <script type="text/javascript">
        $(document).ready(function() {
            //CSRF TOKEN PADA HEADER
            //Script ini wajib krn kita butuh csrf token setiap kali mengirim request post, patch, put dan delete ke server
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            //MULAI DATATABLE
            //script untuk memanggil data json dari server dan menampilkannya berupa datatable
            $('#ajax-crud-datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('pesanan.index') }}",
                    type: 'GET'
                },

                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'user',
                        name: 'user.name'
                    },
                    {
                        data: 'produk',
                        name: 'produk.name'
                    },
                    {
                        data: 'kuantitas',
                        name: 'kuantitas'
                    },
                    {
                        data: 'harga_total',
                        name: 'harga_total'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ],
                columnDefs: [{
                    targets: 0,
                    className: 'text-center',
                }, ],
                lengthMenu: [
                    [10, 25, 50, -1],
                    ['10', '25', '50', 'All']
                ],
            });
            // order: [
            //     [0, 'desc']
            // ]

        });
        $('body').on('click', '.showDetail', function() {
            var pesanan_id = $(this).data('id');

            $.get('pesanan/' + pesanan_id,
                function(data) {
                    $('#modelHeading').html("Detail Pesanan");
                    $('#ajaxModel').modal('show');
                    $('#pesanan_id').html(data.id);
                    $('#user_id').html(data.user.name);
                    $('#produk_id').html(data.produk.nama_produk);
                    $('#panjang').html(data.panjang);
                    $('#lebar').html(data.lebar);
                    $('#tebal').html(data.tebal);

                })
        });
    </script>
@endsection
