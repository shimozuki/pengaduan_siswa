@extends('index', ['title' => 'Data-Pengaduan'])
@section('title', 'Home')

@section('isihalaman')
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Data Pengaduan {{ $title }}</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="/">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Data Pengaduan {{ $title }}
                                </li>
                            </ol>
                        </nav>
                    </div>
                    {{-- <div class="col-md-6 col-sm-12 text-right">
                        <div class="dropdown">
                            <a class="btn btn-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                January 2018
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#">Export List</a>
                                <a class="dropdown-item" href="#">Policies</a>
                                <a class="dropdown-item" href="#">View Assets</a>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>

            <!-- Export Datatable start -->
            <div class="card-box mb-30">
                <div class="pd-20">
                    <h4 class="text-blue h4">Data Pengaduan {{ $title }}</h4>
                </div>
                @if (Auth::guard('petugass')->user()->level == 'admin')
                    <button id="export-pdf-pengaduan" class="btn btn-primary"
                        style="margin-left: 15px; margin-bottom: 10px">Export to
                        PDF</button>
                @endif
                <div class="pb-20">
                    <table class="table hover data-table-export nowrap" id="myTable">
                        <thead>
                            <tr>
                                <th class="table-plus">Judul Laporan</th>
                                <th class="none">Foto</th>
                                <th class="none">Isi Laporan</th>
                                <th class="none">Nama Pengadu</th>
                                <th class="none">Tgl Pengaduan</th>
                                <th class="datatable-nosort notexport all">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pengaduan as $index => $m)
                                <tr>
                                    <td class="table-plus">{{ $m->judul_laporan }}</td>
                                    <td>
                                        <img src="{{ $m->foto }}" alt="" class="mb-30 text-center"
                                            height="100px" width="100px" style="  border: 5px solid #555;">
                                    </td>
                                    <td>{{ $m->isi_laporan }}</td>
                                    <td>{{ $m->pengadu->nama }}</td>
                                    <td>{{ $m->tgl_pengaduan }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                                href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                                                <i class="dw dw-more"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"
                                                style="">
                                                <a href="#" data-toggle="modal" style="margin-right: 10px"
                                                    class="dropdown-item" data-target="#viewModal{{ $m->id_pengaduan }}"
                                                    type="button">
                                                    <i class="dw dw-eye"></i>View
                                                </a>
                                                @switch($title)
                                                    @case('Baru')
                                                        <form action="/pengaduan/verifikasi/{{ $m->id_pengaduan }}" method="POST">
                                                            @csrf
                                                            <button type="submit" class="dropdown-item btn-primary btn-block"><i
                                                                    class="icon-copy fa fa-check-circle"
                                                                    aria-hidden="true"></i>Verifikasi</button>
                                                        </form>
                                                    @break

                                                    @case('Terverifikasi')
                                                        <a href="#" data-toggle="modal" style="margin-right: 10px"
                                                            class="dropdown-item"
                                                            data-target="#tanggapanModal{{ $m->id_pengaduan }}" type="button">
                                                            <i class="icon-copy fa fa-comment" aria-hidden="true"></i>Beri
                                                            Tanggapan
                                                        </a>
                                                    @break

                                                    @case('Selesai')
                                                        <a href="#" data-toggle="modal" style="margin-right: 10px"
                                                            class="dropdown-item"
                                                            data-target="#tanggapanModal{{ $m->id_pengaduan }}" type="button">
                                                            <i class="icon-copy fa fa-comment" aria-hidden="true"></i>Lihat
                                                            Tanggapan
                                                        </a>
                                                    @break

                                                    @default
                                                @endswitch
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                {{-- Modal Vied Data --}}
                                <div class="modal fade bs-example-modal-lg" id="viewModal{{ $m->id_pengaduan }}"
                                    tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myLargeModalLabel">
                                                    {{ $m->judul_laporan }}
                                                </h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-hidden="true">
                                                    ×
                                                </button>
                                            </div>
                                            <div class="modal-body text-center font-18">
                                                <img src="{{ $m->foto }}" alt="" class="mb-30 text-center"
                                                    height="200px" width="400px" style="  border: 5px solid #555;">
                                                <p
                                                    style="    white-space: normal;
                                                overflow: auto;
                                                line-break: anywhere;">
                                                    {{ $m->isi_laporan }}

                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                    Close
                                                </button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                {{-- Modal Beri Tanggapan --}}
                                <div class="modal fade bs-example-modal-lg" id="tanggapanModal{{ $m->id_pengaduan }}"
                                    tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myLargeModalLabel">
                                                    Tanggapan
                                                </h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-hidden="true">
                                                    ×
                                                </button>
                                            </div>
                                            @if ($title == 'Selesai')
                                                <div class="modal-body">
                                                    <div class="form-group row">
                                                        <label class="col-sm-12 col-md-4 col-form-label">Tanggapan</label>
                                                        <div class="col-sm-12 col-md-8">
                                                            <textarea class="form-control" name="tanggapan" cols="30" rows="10" disabled>{{ $m->tanggapan->tanggapan }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">
                                                        Close
                                                    </button>
                                                @else
                                                    <div class="modal-body">
                                                        <form method="POST"
                                                            action="/pengaduan/tanggapan/{{ $m->id_pengaduan }}">
                                                            @csrf
                                                            <div class="form-group row">
                                                                <label
                                                                    class="col-sm-12 col-md-4 col-form-label">Tanggapan</label>
                                                                <div class="col-sm-12 col-md-8">
                                                                    <textarea class="form-control" name="tanggapan" cols="30" rows="10"></textarea>
                                                                </div>
                                                            </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">
                                                            Close
                                                        </button>
                                                        <button type="submit" class="btn btn-primary">
                                                            Save changes
                                                        </button>
                                                    </div>
                                                    </form>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div style="visibility:hidden " id="status">{{ $title }}</div>

        @endsection
