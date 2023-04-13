@extends('index')
@section('title', 'Home')

@section('isihalaman')
    {{-- <div class="title pb-20">
        <h2 class="h3 mb-0">Data Pengaduan</h2>
    </div> --}}

    <div class="card-box pd-20 height-100-p mb-30">
        <div class="">
            {{-- <div class="col-md-4">
                <img src="{{ asset('vendors/images/banner-img.png') }}" alt="">
            </div> --}}
            <div class="">
                <h4 class="font-20 weight-500 mb-10 text-capitalize">
                    Welcome
                    <div class="weight-600 font-30 text-blue">{{ auth()->user()->nama }}</div>
                </h4>
                <p class="font-18" align="justify">
                    Selamat datang di website pengaduan masyarakat! Kami senang Anda telah mengunjungi situs kami dan ingin
                    menyampaikan keluhan atau masalah yang Anda hadapi. Kami berharap dengan adanya platform ini, kami dapat
                    membantu Anda menyelesaikan masalah atau setidaknya memberikan solusi yang memuaskan bagi Anda. Kami
                    akan bekerja keras untuk memastikan bahwa setiap pengaduan yang masuk akan ditangani dengan serius dan
                    responsif. Terima kasih atas kepercayaan Anda kepada kami dan jangan ragu untuk menghubungi kami jika
                    ada hal yang ingin Anda sampaikan.
                </p>
            </div>
        </div>
    </div>

    {{-- <div class="row">
        <div class="col-md-4 mb-20">
            <a href="#" class="card-box d-block mx-auto pd-20 text-secondary">
                <div class="img pb-30">
                    <img src="{{ asset('vendors/images/medicine-bro.svg') }}" alt="">
                </div>
                <div class="content">
                    <h3 class="h4">Services</h3>
                    <p class="max-width-200">
                        We provide superior health care in a compassionate maner
                    </p>
                </div>
            </a>
        </div>
        <div class="col-md-4 mb-20">
            <a href="#" class="card-box d-block mx-auto pd-20 text-secondary">
                <div class="img pb-30">
                    <img src="{{ asset('vendors/images/remedy-amico.svg') }}" alt="">
                </div>
                <div class="content">
                    <h3 class="h4">Medications</h3>
                    <p class="max-width-200">
                        Look for prescription and over-the-counter drug information.
                    </p>
                </div>
            </a>
        </div>
        <div class="col-md-4 mb-20">
            <a href="#" class="card-box d-block mx-auto pd-20 text-secondary">
                <div class="img pb-30">
                    <img src=" {{ asset('vendors/images/paper-map-cuate.svg') }}" alt="">
                </div>
                <div class="content">
                    <h3 class="h4">Locations</h3>
                    <p class="max-width-200">
                        Convenient locations when and where you need them.
                    </p>
                </div>
            </a>
        </div>
    </div> --}}
@endsection
