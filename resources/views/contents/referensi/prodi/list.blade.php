@extends('layouts.app')

@php
$plugins = ['datatable', 'swal', 'select2'];
@endphp

@section('contents')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <div class="text-sm-right">
                            <button type="button"
                                class="btn btn-success btn-rounded waves-effect waves-light btn-tambah"><i
                                    class="bx bx-plus-circle mr-1"></i> Tambah</button>
                        </div>
                    </div>
                </div>
                <div class="table-responsive" data-pattern="priority-columns">
                    <table class="table table-striped" id="table-data" style="width: 100%;">
                        <thead>
                            <tr>
                                <th style="width: 5%;">#</th>
                                <th>Perguruan Tinggi</th>
                                <th>Fakultas</th>
                                <th>Program Studi</th>
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
<div id="modal-prodi" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-prodiLabel"
    aria-hidden="true">
    <form action="{{ route('prodi.store') }}" method="post" id="form-prodi" autocomplete="off">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="modal-prodiLabel">Form prodi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="universitas">Nama Perguran Tinggi</label>
                        <select name="kampus_id" id="kampus_id" class="form-control" required>
                            <option value="">Pilih Perguruan Tinggi</option>
                                @foreach($kampus as $dt)
                                <option value="{{ $dt->id }}">{{ $dt->kampus }}</option>
                                @endforeach
                        </select>
                        <div id="error-kampus"></div>
                    </div>
                    <div class="form-group">
                        <label for="universitas">Nama Fakultas</label>
                        <select name="fakultas_id" id="fakultas_id" class="form-control" required>
                            <option value="">Pilih Perguruan Tinggi</option>
                                @foreach($fakultas as $dt)
                                <option value="{{ $dt->id }}">{{ $dt->fakultas }}</option>
                                @endforeach
                        </select>
                        <div id="error-fakultas"></div>
                    </div>
                    <div class="form-group">
                        <label for="prodi">Nama prodi</label>
                        <input type="text" name="prodi" id="prodi" class="form-control"
                            placeholder="Masukkan Nama prodi" required>
                        <div id="error-prodi"></div>
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
<div id="modal-prodi-update" class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="modal-prodi-updateLabel" aria-hidden="true">
    <form action="{{ route('prodi.update') }}" method="post" id="form-prodi-update" autocomplete="off">
        @method('PATCH')
        <input type="hidden" name="id" id="update-id">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="modal-prodi-updateLabel">Form prodi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="update-prodi">Nama prodi</label>
                        <input type="text" name="prodi" id="update-prodi" class="form-control"
                            placeholder="Masukkan Nama prodi" required>
                        <div id="error-update-prodi"></div>
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
<script src="{{ asset('js/page/referensi/prodi.js?q='.Str::random(5)) }}"></script>
@endpush
