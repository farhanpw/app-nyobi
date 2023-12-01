@extends('layout.main')

@section('title', 'Abouts')

@section('container')
<section class="py-5">
    <div class="container px-2 my-5">
        <div class="text-center mb-5">
            <h1 class="fw-bolder">About Us</h1>
            <p class="lead fw-normal text-muted mb-0">Company Profile</p>
        </div>
    </div>
</section>
<!-- About section one-->
<section class="py-5 " id="scroll-target">
    <div class="container px-5 my-5">
        <div class="row gx-5 align-items-center">
            <div class="col-lg-6"><img class="img-fluid rounded mb-5 mb-lg-0" src="/uploads/{{ $about->logo }}" style="width: 500px; border: 2px solid grey;" alt="..." /></div>
            <div class="col-lg-6">
                <h2 class="fw-bolder">Nyobi ah</h2>
                <p class="lead fw-normal text-muted mb-0" style="text-align: justify">UMKM Nyobi.ah merupakan suatu usaha yang bergerak di bidang penjualan dan pembuatan makanan ringan yang berlokasi di Kota Tasikmalaya. UMKM Nyobi.ah menawarkan produk makanan ringan, berupa keripik tempe, basreng, dan makaroni. UMKM ini pertama kali didirikan oleh Ibu Pepy Permata Putri pada tanggal 15 Agustus 2021. Nyobi.ah awalnya hanya bergerak melalui postingan media sosial, seperti Instagram, dll. Pemilik usaha dibantu oleh pasangannya, yang mengelola kegiatan operasional UMKM Nyobi.ah.</p>
                <br>
                <br>
                <h3 class="fw-bolder">Visi</h3>
                <p class="lead fw-normal text-muted mb-0">Menyajikan cemilan berkualitas dengan rempah dan cita rasa khas Tasikmalaya.</p>
                <br>
                <h3 class="fw-bolder">Misi</h3>
                <p class="lead fw-normal text-muted mb-0">Mengenalkan cemilan lokal ke berbagai daerah indonesia maupun ke luar negeri.</p>
            </div>
        </div>
    </div>
</section>
@endsection