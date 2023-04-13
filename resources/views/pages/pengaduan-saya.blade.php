@extends('index', ['title' => 'Pengaduan Saya'])
@section('title', 'Home')

@section('isihalaman')
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Pengaduan Saya</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="/home/masyarakat">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Pengaduan Saya
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right">
                        <button class="btn btn-primary " href="#" role="button" data-target="#addModal"
                            data-toggle="modal">
                            Tambah Pengaduan
                        </button>
                    </div>
                </div>
            </div>

            <!-- Export Datatable start -->
            <div class="card-box mb-30">
                <div class="pd-20">
                    <h4 class="text-blue h4">Pengaduan Saya</h4>
                </div>
                <div class="pb-20">
                    <table class="table hover data-tables nowrap">
                        <thead>
                            <tr>
                                <th class="table-plus">Judul Laporan</th>
                                <th class="none">Foto</th>
                                <th class="none">Isi Laporan</th>
                                <th class="none">Tgl Pengaduan</th>
                                <th class="none">Status</th>
                                <th class="datatable-nosort notexport">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pengaduan as $index => $m)
                                <tr>
                                    <td class="table-plus">{{ $m->judul_laporan }}</td>
                                    <td>
                                        <img src="{{ url('storage/images/' . $m->foto) }}" alt=""
                                            class="mb-30 text-center" height="100px" width="100px"
                                            style="  border: 5px solid #555;">
                                    </td>
                                    <td>{{ $m->isi_laporan }}</td>
                                    <td>{{ $m->tgl_pengaduan }}</td>
                                    <td>
                                        @if ($m->status == '0')
                                            Belum Terverifikasi
                                        @else
                                            {{ $m->status }}
                                        @endif
                                    </td>
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
                                                <a data-toggle="modal" class="dropdown-item"
                                                    data-target="#tanggapanModal{{ $m->id_pengaduan }}"><i
                                                        class="icon-copy fa fa-comment" aria-hidden="true"></i>Lihat
                                                    Tanggapan</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
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
                                                <img src="{{ url('storage/images/' . $m->foto) }}" alt=""
                                                    class="mb-30 text-center" height="200px" width="400px"
                                                    style="  border: 5px solid #555;">
                                                <p style="line-break: anywhere">{{ $m->isi_laporan }}</p>
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
                                {{-- Modal Tanggapan --}}
                                <div class="modal fade bs-example-modal-lg" id="tanggapanModal{{ $m->id_pengaduan }}"
                                    tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
                                            <div class="modal-body">
                                                <form>
                                                    <div class="form-group row">
                                                        <label class="col-sm-12 col-md-4 col-form-label ">Ditanggapi oleh</label>
                                                        <div class="col-sm-12 col-md-8">
                                                            <textarea class="form-control" readonly name="tanggapan" rows="1" style="height: auto">{{ $m->tanggapan->petugas->nama_petugas ?? '' }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-12 col-md-4 col-form-label ">Tanggapan</label>
                                                        <div class="col-sm-12 col-md-8">
                                                            <textarea class="form-control" readonly name="tanggapan" cols="30" rows="10">{{ $m->tanggapan->tanggapan ?? '' }}</textarea>
                                                        </div>
                                                    </div>
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
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- add Modal -->
            <div class="modal fade bs-example-modal-lg" id="addModal" tabindex="-1" role="dialog"
                aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myLargeModalLabel">
                                Tambah Pengaduan
                            </h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                ×
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="/home/masyarakat/pengaduan" enctype="multipart/form-data"
                                onsubmit="return validateForm()">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-4 col-form-label">Judul Laporan</label>
                                    <div class="col-sm-12 col-md-8">
                                        <input class="form-control" type="text" name="judul_laporan" required minlength="20" maxlength="40">
                                        <div class="text-danger" style="visibility: hidden" id="judul_error">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-4 col-form-label ">Isi Laporan</label>
                                    <div class="col-sm-12 col-md-8">
                                        <textarea class="form-control" name="isi_laporan" cols="30" rows="10" required minlength="100" maxlength="500"></textarea>
                                        <div class="text-danger" style="visibility: hidden" id="isiError">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-4 col-form-label ">foto</label>
                                    <div class="col-sm-12 col-md-8">
                                        {{-- <input type="file" class="custom-file-input">
                                        <label class="custom-file-label" style="margin: 0px 15px">Choose file</label> --}}
                                        <input class="form-control" type="file" id="formFile" name="foto"
                                            accept=".jpg, .png" required>
                                        <div class="text-danger" style="visibility: hidden" id="fileError">
                                        </div>
                                    </div>
                                </div>
                                @push('custom-scripts')
                                    <script>
                                        function validateForm() {
                                            var fileName = document.getElementById('formFile').value.toLowerCase();
                                            var size = document.getElementById("formFile").files[0].size;
                                            // console.log("ukuran" +   bytesToSize(size));
                                            if (!fileName.endsWith('.jpg') && !fileName.endsWith('.png')) {
                                                document.getElementById("fileError").innerHTML = "Harap masukan gambar bertipe .png atau .jpg"
                                                document.getElementById("fileError").style.visibility = "visible"
                                                return false
                                            } else if (size >= 2000000) {
                                                document.getElementById("fileError").innerHTML = "Ukuran gambar harus dibawah 2 mb"
                                                document.getElementById("fileError").style.visibility = "visible"
                                                return false;
                                            } else {
                                                document.getElementById("fileError").innerHTML = ""
                                                document.getElementById("fileError").style.visibility = "hidden"
                                                return true;
                                            }
                                        }

                                        // function bytesToSize(bytes) {
                                        //     var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
                                        //     if (bytes == 0) return 'n/a';
                                        //     var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
                                        //     if (i == 0) return bytes + ' ' + sizes[i];
                                        //     return (bytes / Math.pow(1024, i)).toFixed(1) + ' ' + sizes[i];
                                        // };
                                    </script>
                                @endpush
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                Close
                            </button>
                            <button type="submit" class="btn btn-primary">
                                Save changes
                            </button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        @endsection
