@extends('admin.layouts.main')

@section('title', 'Data Produk')

@section('content')

    <div class="card shadow">
        {{-- <div class="container"> --}}
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title tengahkan">
                                Daftar Produk
                            </h6>
                        </div>

                        <div class="card-body">
                            <div class="d-flex mb-4">
                            <a href="#modal-form" class="btn btn-primary modal-tambah ">Tambah Data</a>
                            </div>
                                <table id="tbl_list" class="table table-bordered table-hover table-striped table-light" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Produk</th>
                                        <th>material</th>
                                        <th>size</th>
                                        <th>Rasa</th>
                                        <th>price</th>
                                        <th>Stock</th>
                                        <th>image</th>
                                        <th>Aksi</th>

                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        {{-- </div> --}}
    </div>

    <div class="modal fade" id="modal-form" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Form Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-kategori">
                                <div class="form-group">
                                    <label>Ukuran</label>
                                    <select name="size_id" id="size_id" class="form-control">
                                        @foreach ($sizes as $size)
                                            <option value="{{ $size->id }}">{{ $size->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Rasa</label>
                                    <select name="variant_id" id="variant_id" class="form-control">
                                        @foreach ($variants as $variant)
                                            <option value="{{ $variant->id }}">{{ $variant->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Nama Produk</label>
                                    <input type="text" class="form-control" name="product_name"
                                        placeholder="Nama Produk">
                                </div>
                                <div class="form-group">
                                    <label>Harga</label>
                                    <input type="number" class="form-control" name="price" placeholder="price">
                                </div>
                                <div class="form-group">
                                    <label>Bahan</label>
                                    <input type="text" class="form-control" name="material" placeholder="material">
                                </div>
                                <div class="form-group">
                                    <label>Stock</label>
                                    <input type="text" class="form-control" name="stock" placeholder="stock">
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <textarea name="description" placeholder="description" class="form-control" id="" cols="30" rows="10"
                                        required></textarea>
                                </div>
                                <div class="form-group">
                                    <label>image</label>
                                    <input type="file" class="form-control" name="image">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#tbl_list').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ url()->current() }}',
                columns: [{data: 'id', name: 'id'},
                    {data: 'product_name', name: 'product_name'},
                    {data: 'price', name: 'price'},
                    {data: 'stock', name: 'stock'},
                    {data: 'material', name: 'material'},
                    {data: 'size.name', name: 'size.name'},
                    {data: 'variant.name', name: 'variant.name'},
                    {
                        data: 'image',
                        name: 'image',
                        render: function(data, type, full, meta) {
                            // Assuming 'data' contains the URL of the image
                            // You can customize the image rendering here
                            // For example, create an <img> tag
                            return '<img src="/uploads/' + data +
                                '" alt="Image" width="50" height="50">';
                        }

                    },
                    {
                        data: 'id',
                        name: 'id',
                        render: function(data, type, full, meta) {
                            // Assuming 'data' contains the URL of the image
                            // You can customize the image rendering here
                            // For example, create an <img> tag
                            return '<td><a data-toggle="modal" href="#modal-form" data-id="' +
                                data +
                                '" class="btn btn-warning modal-ubah">Edit</a><a href="#" data-id="' +
                                data + '" class="btn btn-danger btn-hapus">Hapus</a></td>';
                        }
                    },

                ]
            });
        });

        
        $(document).on('click', '.btn-hapus', function() {
            const id = $(this).data('id')
            const token = localStorage.getItem('token')

            confirm_dialog = confirm('Apakah anda yakin?');

            if (confirm_dialog) {
                $.ajax({
                    url: '/api/products/' + id,
                    type: "DELETE",
                    headers: {
                        "Authorization": 'Bearer' + token
                    },
                    success: function(data) {
                        if (data.message == 'success') {
                            alert('Data berhasil dihapus')
                            location.reload();
                        }
                    }
                });
            }
        });


        $('.modal-tambah').click(function() {
            $('#modal-form').modal('show')
            $('input[name="name"]').val('')
            $('textarea[name="description"]').val('')

            $('.form-kategori').submit(function(e) {
                e.preventDefault()
                const token = localStorage.getItem('token')
                const frmdata = new FormData(this);

                $.ajax({
                    url: '/api/products',
                    type: 'POST',
                    data: frmdata,
                    cache: false,
                    contentType: false,
                    processData: false,
                    headers: {
                        "Authorization": 'Bearer' + token
                    },

                    success: function(data) {
                        if (data.success) {
                            alert('Data berhasil ditambah')
                            location.reload();
                        }
                    }
                })
            });
        });


        $(document).on('click', '.modal-ubah', function() {
            $('#modal-form').modal('show')
            const id = $(this).data('id');

            console.log(id);

            $.get('/api/products/' + id, function({
                data
            }) {
                $('select[name="size_id"]').val(data.size_id);
                $('select[name="variant_id"]').val(data.variant_id);
                $('input[name="product_name"]').val(data.product_name);
                $('input[name="price"]').val(data.price);
                $('input[name="material"]').val(data.material);
                $('input[name="stock"]').val(data.stock);
                $('input[name="Variant"]').val(data.Variant);
                $('textarea[name="description"]').val(data.description);
            })


            $('.form-kategori').submit(function(e) {
                e.preventDefault()
                const token = localStorage.getItem('token')
                const frmdata = new FormData(this);

                $.ajax({
                    url: `/api/products/${id}?_method=PUT`,
                    type: 'POST',
                    data: frmdata,
                    cache: false,
                    contentType: false,
                    processData: false,
                    headers: {
                        "Authorization": 'Bearer' + token
                    },

                    success: function(data) {
                        if (data.success) {
                            alert('Data berhasil diubah')
                            location.reload();
                        }
                    },

                    error: function(request, status, error) {
                        alert(request.responseText);
                    }
                })
            });

        })
    </script>
@endpush
