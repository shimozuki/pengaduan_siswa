@extends('index', ['title' => 'Data-Petugas'])
@section('title', 'Home')

@section('isihalaman')
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Data Petugas</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="/">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Data Petugas
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right">
                        <button class="btn btn-primary " href="#" role="button" data-target="#addModal"
                            data-toggle="modal">
                            Tambah Data
                        </button>
                    </div>
                </div>
            </div>

            <!-- Export Datatable start -->
            <div class="card-box mb-30">
                <div class="pd-20">
                    <h4 class="text-blue h4">Data Petugas</h4>
                </div>
                <button id="export-pdf-petugas" class="btn btn-primary"
                    style="margin-left: 15px; margin-bottom: 10px">Export to
                    PDF</button>
                <div class="pb-20">
                    <table class="table hover data-table-export nowrap" id="myTable">
                        <thead>
                            <tr>
                                <th class="table-plus">Nama Petugas</th>
                                <th>Username</th>
                                <th>telp</th>
                                <th>level</th>
                                <th class="datatable-nosort notexport">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($petugas as $index => $p)
                                <tr>
                                    <td class="table-plus">{{ $p->nama_petugas }}</td>
                                    <td>{{ $p->username }}</td>
                                    <td>{{ $p->telp }}</td>
                                    <td>{{ $p->level }}</td>
                                    <td>
                                        <div class="table-actions">
                                            <a href="#" data-color="#265ed7" data-toggle="modal"
                                                style="margin-right: 10px" data-target="#editModal{{ $p->id_petugas }}"
                                                type="button">
                                                <i class="icon-copy dw dw-edit2"></i>
                                            </a>
                                            <a href="#" data-color="#e95959"
                                                onclick="saDeleteWarning('{{ $p->id_petugas }}')"><i
                                                    class="icon-copy dw dw-delete-3"></i>
                                            </a>

                                            <form action="/admin/petugas/{{ $p->id_petugas }}" method="post"
                                                style="visibility:hidden">
                                                @csrf
                                                @method('DELETE')
                                                <button class="dropdown-item" id="delete{{ $p->id_petugas }}"
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
                                <div class="modal fade bs-example-modal-lg" id="editModal{{ $p->id_petugas }}"
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
                                                <form method="POST" action="/admin/petugas/{{ $p->id_petugas }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group row">
                                                        <label class="col-sm-12 col-md-4 col-form-label">Nama
                                                            petugas</label>
                                                        <div class="col-sm-12 col-md-8">
                                                            <input class="form-control" type="text" name="nama_petugas"
                                                                value="{{ $p->nama_petugas }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-12 col-md-4 col-form-label">Username</label>
                                                        <div class="col-sm-12 col-md-8">
                                                            <input class="form-control" type="text" name="username"
                                                                value="{{ $p->username }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-12 col-md-4 col-form-label">Telp</label>
                                                        <div class="col-sm-12 col-md-8">
                                                            <input class="form-control" type="text" name="telp"
                                                                value="{{ $p->telp }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-12 col-md-4 col-form-label">Select</label>
                                                        <div class="col-sm-12 col-md-8">
                                                            <select class="custom-select col-12" name="level">
                                                                @foreach ($level as $l)
                                                                    @if ($p->level == $l)
                                                                        <option value="{{ $l }}" selected
                                                                            name="level">
                                                                            {{ $l }}</option>
                                                                    @else
                                                                        <option value="{{ $l }}" name="level">
                                                                            {{ $l }}</option>
                                                                    @endif
                                                                @endforeach
                                                            </select>
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

            <!-- add Modal -->
            <div class="modal fade bs-example-modal-lg" id="addModal" tabindex="-1" role="dialog"
                aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myLargeModalLabel">
                                Tambah Data
                            </h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                ×
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="/admin/petugas">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-4 col-form-label">Nama petugas</label>
                                    <div class="col-sm-12 col-md-8">
                                        <input class="form-control" type="text" name="nama_petugas" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-4 col-form-label">Username</label>
                                    <div class="col-sm-12 col-md-8">
                                        <input class="form-control" type="text" name="username" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-4 col-form-label">Password</label>
                                    <div class="col-sm-12 col-md-8">
                                        <input class="form-control" type="text" name="password" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-4 col-form-label">Telp</label>
                                    <div class="col-sm-12 col-md-8">
                                        <input class="form-control" type="text" name="telp" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-4 col-form-label">Select</label>
                                    <div class="col-sm-12 col-md-8">
                                        <select class="custom-select col-12" name="level">
                                            <option value="petugas" name="level">petugas</option>
                                            <option value="admin" name="level">admin</option>
                                        </select>
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
            @push('custom-scripts')
                <script>
                    function saLoginError() {
                        swal({
                            type: 'error',
                            title: 'username yang anda masukan sudah terdaftar!',
                            text: 'harap coba lagi',
                        })
                    };
                </script>
                @error('username')
                    <script>
                        saLoginError()
                    </script>
                @enderror
            @endpush
        @endsection
