@extends('admin.layouts.main')

@section('title')
    Tentang
@endsection

@section('content')
<div class="card shadow">
    <div class="card-header">
        <h4 class="card-title">
            Data Tentang
        </h4>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form class="form-tentang" method="POST" enctype="multipart/form-data" action="/tentang/{{ $about->id }}">
                    @csrf
                    <div class="form-group">
                        <label>Judul Website</label>
                        <input type="text" class="form-control" name="title" placeholder="Judul Website" required value="{{ $about->title }}">
                    </div>
                    <img src="/uploads/{{ $about->logo }}" alt="" width="200">
                    <div class="form-group">
                        <label >Logo</label>
                        <input type="file" class="form-control" name="logo">
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea name="description" placeholder="Deskripsi" class="form-control" id="" cols="30" rows="10" required>{{ $about->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="address" placeholder="Alamat" class="form-control" id="" cols="30" rows="10" required>{{ $about->address }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Email" required value="{{ $about->email }}">
                    </div>
                    <div class="form-group">
                        <label>Telepon</label>
                        <input type="text" class="form-control" name="phone" placeholder="Telepon" required value="{{ $about->phone }}">
                    </div>
                    <div class="form-group">
                        <label>Atas Nama</label>
                        <input type="text" class="form-control" name="name_rek" placeholder="Atas Nama" required value="{{ $about->name_rek }}">
                    </div>
                    <div class="form-group">
                        <label>No Rekening</label>
                        <input type="text" class="form-control" name="no_rek" placeholder="No Rekening" required value="{{ $about->no_rek }}">
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    </div>
                </form>
            </div>
          </div>
    </div>
</div>
@endsection