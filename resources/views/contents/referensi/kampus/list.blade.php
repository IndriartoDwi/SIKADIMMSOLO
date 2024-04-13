@extends('layouts.app')

@php
$plugins = ['datatable', 'swal', 'select2'];
@endphp

@section('contents')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                @if (rbacCheck('kampus', 2))
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
                                <th>Kampus</th>
                                <th>Aksi</th>
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
<div id="modal-kampus" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-kampusLabel"
    aria-hidden="true">
    <form action="{{ route('kampus.store') }}" method="post" id="form-kampus" autocomplete="off">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="modal-kampusLabel">Form kampus</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="kampus">Nama kampus</label>
                        <input type="text" name="kampus" id="kampus" class="form-control"
                            placeholder="Masukkan Nama kampus" required>
                        <div id="error-kampus"></div>
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
<div id="modal-kampus-update" class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="modal-kampus-updateLabel" aria-hidden="true">
    <form action="{{ route('kampus.update') }}" method="post" id="form-kampus-update" autocomplete="off">
        @method('PATCH')
        <input type="hidden" name="id" id="update-id">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="modal-kampus-updateLabel">Form kampus</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="update-kampus">Nama Kampus</label>
                        <input type="text" name="kampus" id="update-kampus" class="form-control"
                            placeholder="Masukkan Nama kampus" required>
                        <div id="error-update-kampus"></div>
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
<script src="{{ asset('js/page/referensi/kampus.js?q='.Str::random(5)) }}"></script>
@endpush
