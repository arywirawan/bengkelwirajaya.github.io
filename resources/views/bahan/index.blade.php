@extends('layouts.dashboard')
@section('title', 'Bahan Baku')
@section('content')
    <div class="container-fluid">
        <!-- table kategori -->
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Bahan Baku</h4>
                        <div class="card-tools">
                            <a href="{{ route('bahan.create') }}" class="btn btn-sm btn-primary">
                                Baru
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('bahan.index') }}" method="GET">
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
                                        <th>Ukuran</th>
                                        <th>Harga</th>
                                        <th>Stok</th>
                                        <th>User Input</th>
                                        <th width="15%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($bahan as $item)
                                        <tr>
                                            <td>
                                                {{ $item->id }}
                                            </td>
                                            <td>
                                                {{ $item->nama_bahan }}
                                            </td>
                                            <td>
                                                {{ $item->ukuran }}
                                            </td>
                                            <td>
                                                {{ $item->harga }}
                                            </td>
                                            <td>
                                                {{ $item->stok }}
                                            </td>
                                            <td>
                                                {{ $item->user->name }}
                                            </td>
                                            </td>
                                            <td>
                                                <a href="{{ route('bahan.edit', $item->id) }}"
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
                                                        <form action="{{ route('bahan.destroy', $item->id) }}"
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
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- untuk menampilkan link page, tambahkan skrip di bawah ini -->
                            {{ $bahan->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @foreach ($stoks as $stok)
        <?php
        if ($stok->stok <= 0) {
            echo "
                                                        <script>
                                                            alert('Tidak ada stok pada bahan $stok->nama_bahan, silahkan menambah stok');
                                                        </script>
                                                        ";
        } else {
            echo "
                                                        <script>
                                                            alert('Stok produk $stok->nama_bahan tinggal $stok->stok, silahkan menambah stok');
                                                        </script>
                                                        ";
        }
        
        ?>
    @endforeach

@endsection

{{-- <div class="container-fluid">
    <!-- table kategori -->
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <div class="pull-right mb-2">
                        <a class="btn btn-primary" id="tombol-tambah" href="{{ route('kategori.create') }}">Tambah
                            Kategori</a>
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
                    <table class="table table-bordered" id="ajax-crud-datatable"
                        style="table-layout: fixed; word-warp: break-word">
                        <thead class="thead-dark">
                            <tr>
                                <th style="width: 3% !important">No</th>
                                <th>Nama</th>
                                <th>Gambar</th>
                                <th>User Input</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
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
                                    <th>ID Kategori</th>
                                    <td><span id="kategori_id" value="" class="badge badge-success"></span></td>
                                </tr>
                                <tr>
                                    <th>Nama Kategori</th>
                                    <td><span id="nama_kategori"></span></td>
                                </tr>
                                <tr>
                                    <th>Deskripsi</th>
                                    <td><span id="deskripsi_kategori"></span></td>
                                </tr>
                            </thead>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}

{{-- Delete data --}}
{{-- <form method="POST" action="{{ route('kategori.destroy') }}">

    </form> --}}



{{-- @endsection --}}

{{-- Section AJax --}}
{{-- @section('ajax')
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
                url: "{{ route('kategori.index') }}",
                type: 'GET'
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'nama_kategori',
                    name: 'nama_kategori'
                },
                {
                    data: 'foto',
                    name: 'foto',
                    render: function(data, type, full, meta) {
                        return "<img src=\"/gambar/" + data + "\" height=\"100\"/>";
                    }

                },
                {
                    data: 'user',
                    name: 'user.name'
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
        var kategori_id = $(this).data('id');

        $.get('kategori/' + kategori_id,
            function(data) {
                $('#modelHeading').html("Detail Kategori");
                $('#ajaxModel').modal('show');
                $('#kategori_id').html(data.id);
                $('#nama_kategori').html(data.nama_kategori);
                $('#deskripsi_kategori').html(data.deskripsi_kategori);

            })
    });
</script> --}}
{{-- @endsection --}}

{{-- <div class="container-fluid">
    <!-- table kategori -->
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <div class="pull-right mb-2">
                        <a class="btn btn-primary" id="tombol-tambah" href="{{ route('kategori.create') }}">Tambah
                            Kategori</a>
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
                    <table class="table table-bordered" id="ajax-crud-datatable"
                        style="table-layout: fixed; word-warp: break-word">
                        <thead class="thead-dark">
                            <tr>
                                <th style="width: 3% !important">No</th>
                                <th>Nama</th>
                                <th>Gambar</th>
                                <th>User Input</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
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
                                    <th>ID Kategori</th>
                                    <td><span id="kategori_id" value="" class="badge badge-success"></span></td>
                                </tr>
                                <tr>
                                    <th>Nama Kategori</th>
                                    <td><span id="nama_kategori"></span></td>
                                </tr>
                                <tr>
                                    <th>Deskripsi</th>
                                    <td><span id="deskripsi_kategori"></span></td>
                                </tr>
                            </thead>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}

{{-- Delete data --}}
{{-- <form method="POST" action="{{ route('kategori.destroy') }}">

    </form> --}}



{{-- @endsection --}}

{{-- Section AJax --}}
{{-- @section('ajax')
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
                url: "{{ route('kategori.index') }}",
                type: 'GET'
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'nama_kategori',
                    name: 'nama_kategori'
                },
                {
                    data: 'foto',
                    name: 'foto',
                    render: function(data, type, full, meta) {
                        return "<img src=\"/gambar/" + data + "\" height=\"100\"/>";
                    }

                },
                {
                    data: 'user',
                    name: 'user.name'
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
        var kategori_id = $(this).data('id');

        $.get('kategori/' + kategori_id,
            function(data) {
                $('#modelHeading').html("Detail Kategori");
                $('#ajaxModel').modal('show');
                $('#kategori_id').html(data.id);
                $('#nama_kategori').html(data.nama_kategori);
                $('#deskripsi_kategori').html(data.deskripsi_kategori);

            })
    });
</script> --}}

{{-- <div class="container-fluid">
<!-- table kategori -->
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <div class="pull-right mb-2">
                    <a class="btn btn-primary" id="tombol-tambah" href="{{ route('bahan.create') }}">Tambah
                        Bahan Baku</a>
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
                <table class="table table-bordered" id="ajax-crud-datatable">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Bahan</th>
                            <th>Ukuran</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>User Input</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
</div> --}}


{{-- @endsection --}}

{{-- Section AJax --}}
{{-- @section('ajax')
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
                url: "{{ route('bahan.index') }}",
                type: 'GET'
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'nama_bahan',
                    name: 'nama_bahan'
                },
                {
                    data: 'ukuran',
                    name: 'ukuran'
                },
                {
                    data: 'harga',
                    name: 'harga'
                },
                {
                    data: 'stok',
                    name: 'stok'
                },
                {
                    data: 'user',
                    name: 'user.name'
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
    // $('body').on('click', '.showDetail', function() {
    //     var kategori_id = $(this).data('id');

    //     $.get('kategori/' + kategori_id,
    //         function(data) {
    //             $('#modelHeading').html("Detail Kategori");
    //             $('#ajaxModel').modal('show');
    //             $('#kategori_id').html(data.id);
    //             $('#kode_kategori').html(data.kode_kategori);
    //             $('#nama_kategori').html(data.nama_kategori);
    //             $('#deskripsi_kategori').html(data.deskripsi_kategori);

    //         })
    // });
</script> --}}
{{-- @endsection --}}
