@extends('layouts.app')

@php
$plugins = ['datatable', 'swal', 'select2'];
@endphp

@section('contents')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                @if (rbacCheck('fakultas', 2))
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
                                <th>Perguruan Tinggi</th>
                                <th>Fakultas</th>
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
<div id="modal-fakultas" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-fakultasLabel"
    aria-hidden="true">
    <form action="{{ route('fakultas.store') }}" method="post" id="form-fakultas" autocomplete="off">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="modal-fakultasLabel">Form fakultas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="universitas">Nama Perguran Tinggi</label>
                        <select name="kampus_id" id="kampus_id" class="form-control" required>
                            <option value="">Pilih Perguruan Tinggi</option>
                                @foreach($universitas as $dt)
                                <option value="{{ $dt->id }}">{{ $dt->kampus }}</option>
                                @endforeach
                        </select>
                        <div id="error-fakultas"></div>
                    </div>
                    <div class="form-group">
                        <label for="fakultas">Nama fakultas</label>
                        <input type="text" name="fakultas" id="fakultas" class="form-control"
                            placeholder="Masukkan Nama fakultas" required>
                        <div id="error-fakultas"></div>
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
<div id="modal-fakultas-update" class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="modal-fakultas-updateLabel" aria-hidden="true">
    <form action="{{ route('fakultas.update') }}" method="post" id="form-fakultas-update" autocomplete="off">
        @method('PATCH')
        <input type="hidden" name="id" id="update-id">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="modal-fakultas-updateLabel">Form fakultas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="universitas">Nama Perguran Tinggi</label>
                        <select name="kampus_id" id="kampus_id" class="form-control" required>
                            <option value="">Pilih Perguruan Tinggi</option>
                                {{-- @foreach($universitas as $dt)
                                    <option value="{{ $dt->id }}" {{ $selectedId == $dt->id ? 'selected' : '' }}>{{ $dt->kampus }}</option>
                                @endforeach --}}
                        </select>
                        <div id="error-fakultas"></div>
                    </div>
                    <div class="form-group">
                        <label for="update-fakultas">Nama fakultas</label>
                        <input type="text" name="fakultas" id="update-fakultas" class="form-control"
                            placeholder="Masukkan Nama fakultas" required>
                        <div id="error-update-fakultas"></div>
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
<script src="{{ asset('js/page/referensi/fakultas.js?q='.Str::random(5)) }}"></script>
@endpush
