@extends('index', ['title' => 'Data-Masyarakat'])
@section('title', 'Home')

@section('isihalaman')
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Data masyarakat</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="/">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Data masyarakat
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
                    <h4 class="text-blue h4">Data masyarakat</h4>
                </div>
                <button id="export-pdf-masyarakat" class="btn btn-primary"
                    style="margin-left: 15px; margin-bottom: 10px">Export to
                    PDF</button>
                <div class="pb-20">
                    <table class="table hover data-table-export nowrap" id="myTable">
                        <thead>
                            <tr>
                                <th class="table-plus">NIK</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>telp</th>
                                <th class="datatable-nosort notexport">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($masyarakat as $index => $m)
                                <tr>
                                    <td class="table-plus">{{ $m->nik }}</td>
                                    <td>{{ $m->nama }}</td>
                                    <td>{{ $m->username }}</td>
                                    <td>{{ $m->telp }}</td>
                                    <td>
                                        <div class="table-actions">
                                            <a href="#" data-color="#265ed7" data-toggle="modal"
                                                style="margin-right: 10px" data-target="#editModal{{ $m->nik }}"
                                                type="button">
                                                <i class="icon-copy dw dw-edit2"></i>
                                            </a>
                                            <a href="#" data-color="#e95959"
                                                onclick="saDeleteWarning('{{ $m->nik }}')"><i
                                                    class="icon-copy dw dw-delete-3"></i>
                                            </a>

                                            <form action="/admin/masyarakat/{{ $m->nik }}" method="post"
                                                style="visibility:hidden">
                                                @csrf
                                                @method('DELETE')
                                                <button class="dropdown-item" id="delete{{ $m->nik }}"
                                                    type="submit">
                                                </button>
                                            </form>
                                            @push('custom-scripts')
                                                <script>
                                                    function saDeleteWarning(id) {
                                                        swal({
                                                            title: 'Are you sure?',
                                                            text: "You won't be able to revert this!",
                                                            type: 'warning',
                                                            showCancelButton: true,
                                                            confirmButtonText: 'Yes, delete it!',
                                                            cancelButtonText: 'No, cancel!',
                                                            confirmButtonClass: 'btn btn-success margin-5',
                                                            cancelButtonClass: 'btn btn-danger margin-5',
                                                            buttonsStyling: false
                                                        }).then((result) => {
                                                            if (result.value == true) {
                                                                document.getElementById(`delete${id}`).click();
                                                            } else if (result.dismiss === Swal.DismissReason.cancel) {}
                                                        })
                                                    };
                                                </script>
                                            @endpush
                                        </div>

                                    </td>
                                </tr>
                                <!-- Edit Modal -->
                                <div class="modal fade bs-example-modal-lg" id="editModal{{ $m->nik }}"
                                    tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myLargeModalLabel">
                                                    Edit Data
                                                </h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-hidden="true">
                                                    ×
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="/admin/masyarakat/{{ $m->nik }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group row">
                                                        <label class="col-sm-12 col-md-4 col-form-label">Nama
                                                            masyarakat</label>
                                                        <div class="col-sm-12 col-md-8">
                                                            <input class="form-control" type="text" name="nama"
                                                                value="{{ $m->nama }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-12 col-md-4 col-form-label">Username</label>
                                                        <div class="col-sm-12 col-md-8">
                                                            <input class="form-control" type="text" name="username"
                                                                value="{{ $m->username }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-12 col-md-4 col-form-label">Telp</label>
                                                        <div class="col-sm-12 col-md-8">
                                                            <input class="form-control" type="text" name="telp"
                                                                value="{{ $m->telp }}">
                                                        </div>
                                                    </div>
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
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endsection
