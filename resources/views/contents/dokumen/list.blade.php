@extends('layouts.app')

@php
$plugins = ['datatable', 'swal', 'select2'];
$role_id = session('role_id');
@endphp

@section('contents')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                @if (rbacCheck('dokumen', 2))
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <div class="text-sm-right">
                            <button type="button"
                                class="btn btn-success btn-rounded waves-effect waves-light btn-tambah"><i
                                    class="bx bx-plus-circle mr-1"></i> Tambah</button>
                        </div>
                    </div>
                </div>
                @endif
                <div class="table-responsive" data-pattern="priority-columns">
                    <table class="table table-striped" id="table-data" style="width: 100%;">
                        <thead>
                            <tr>
                                <th style="width: 5%;">#</th>
                                <th>Nama Dokumen</th>
                                <th>Dokumen</th>
                                @if ($role_id !=3 )
                                    <th>Status Keaktifan</th>
                                    <th>Aksi</th>
                                @endif
                                <th></th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- sample modal content -->
<div id="modal-dokumen" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-dokumenLabel"
    aria-hidden="true">
    <form action="{{ route('dokumen.store') }}" method="post" id="form-dokumen" autocomplete="off" enctype="multipart/form-data" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="modal-dokumenLabel">Form dokumen</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama_dokumen">Nama dokumen</label>
                        <input type="text" name="nama_dokumen" id="nama_dokumen" class="form-control"
                            placeholder="Masukkan Nama dokumen" required>
                        <div id="error-nama_dokumen"></div>
                    </div>
                    <div class="form-group">
                        <label for="dokumen">Dokumen</label>
                        <input type="file" name="dokumen" id="dokumen" class="form-control"
                            placeholder="Masukkan Nama dokumen" required>
                        <div id="error-dokumen"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Simpan</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </form>
</div><!-- /.modal -->

<!-- sample modal content -->
<div id="modal-dokumen-update" class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="modal-dokumen-updateLabel" aria-hidden="true">
    <form action="{{ route('dokumen.store') }}" method="post" id="form-dokumen-update" autocomplete="off">
        @method('POST')
        <input type="hidden" name="id" id="update-id">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="modal-dokumen-updateLabel">Form dokumen</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="update-nama_dokumen">Nama dokumen</label>
                        <input type="text" name="nama_dokumen" id="update-nama_dokumen" class="form-control"
                            placeholder="Masukkan Nama dokumen" required>
                        <div id="error-update-nama_dokumen"></div>
                    </div>
                    <div class="form-group">
                        <label for="update-dokumen">Dokumen</label><br>
                        <a href="#" id="lihat-dokumen" target="_blank">Lihat Dokumen</a>
                        <input type="file" name="dokumen"  class="form-control" placeholder="Masukkan Dokumen" required>
                        <div id="error-update-dokumen"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Simpan</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </form>
</div><!-- /.modal -->

<!-- sample modal content -->
<div id="modal-update-role" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-update-roleLabel"
    aria-hidden="true">
    <form action="{{ route('dokumen.update.roles') }}" method="post" id="form-update-role" autocomplete="off">
        @method('PATCH')
        <input type="hidden" name="id" id="update-role-user-id">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="modal-update-roleLabel">Peran dokumen : <b class="user-name"></b>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            @foreach ($roles as $role)
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input checkbox-role" name="role_id[]"
                                        id="role-{{ $role->id }}" value="{{ $role->id }}">
                                    <label class="custom-control-label" for="role-{{ $role->id }}">{{ $role->name
                                        }}</label>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Simpan</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </form>
</div><!-- /.modal -->

@endsection

@push('scripts')
<script>
    var role_id = {{ session('role_id') }};
</script>

<script src="{{ asset('js/page/dokumen/list.js?q='.Str::random(5)) }}"></script>
@endpush
