@extends('layouts.app')
@php
    $plugins = ['datatable', 'swal', 'select2'];
    $role_id = session('role_id');
@endphp

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
@section('contents')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if (rbacCheck('timeline', 2))
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
                                    <th>Nama Agenda</th>
                                    <th>Tanggal Pelaksanaan</th>
                                    <th>Dokumen</th>
                                    <th>Catatan</th>
                                    <th>Komisariat</th>
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
    <div id="modal-timeline" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-timelineLabel"
        aria-hidden="true">
        <form action="{{ route('timeline.store') }}" method="post" id="form-timeline" autocomplete="off"
            enctype="multipart/form-data">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title mt-0" id="modal-timelineLabel">Form timeline</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="nama_agenda">Nama Agenda</label>
                                    <input type="text" name="nama_agenda" id="nama_agenda" class="form-control"
                                        placeholder="Masukkan Nama Agenda" required>
                                    <div id="error-nama_agenda"></div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="tanggal_mulai">Tanggal Mulai</label>
                                    <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control"
                                        placeholder="Masukan Tanggal Mulai">
                                    <div id="error-tanggal_mulai"></div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="tanggal_selesai">Tanggal Selesai</label>
                                    <input type="date" name="tanggal_selesai" id="tanggal_selesai" class="form-control"
                                        placeholder="Masukan Tanggal Selesai">
                                    <div id="error-tanggal_selesai"></div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="dokumen">Dokumen <font color="red">*Uraian Kegiatan dan Proposal</font>
                                        </label>
                                    <input type="file" name="dokumen" id="dokumen" class="form-control"
                                        placeholder="Masukkan Nama dokumen">
                                    <div id="error-dokumen"></div>
                                </div>
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

    <!-- sample modal content -->
    <div id="modal-timeline-update" class="modal fade" tabindex="-1" role="dialog"
        aria-labelledby="modal-timeline-updateLabel" aria-hidden="true">
        <form action="{{ route('timeline.store') }}" method="post" id="form-timeline-update" autocomplete="off"  enctype="multipart/form-data">
            @method('POST')
            @csrf
            <input type="hidden" name="id" id="update-id">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title mt-0" id="modal-timeline-updateLabel">Form timeline</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="update-nama_agenda">Nama timeline</label>
                            <input type="text" name="nama_agenda" id="update-nama_agenda" class="form-control"
                                placeholder="Masukkan Nama Agenda" required>
                            <div id="error-update-nama_agenda"></div>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_mulai">Tanggal Mulai</label>
                            <input type="date" name="tanggal_mulai" id="update-tanggal_mulai" class="form-control"
                                placeholder="Masukan Tanggal Mulai">
                            <div id="error-tanggal_mulai"></div>
                        </div>

                        <div class="form-group">
                            <label for="tanggal_selesai">Tanggal Selesai</label>
                            <input type="date" name="tanggal_selesai" id="update-tanggal_selesai" class="form-control"
                                placeholder="Masukan Tanggal Selesai">
                            <div id="error-tanggal_selesai"></div>
                        </div>
                        <div class="form-group">
                            <label for="update-timeline">Dokumen</label><br>
                            <a href="#" id="lihat-timeline" target="_blank">Lihat Dokumen</a>
                            <input type="file" name="timeline" class="form-control" placeholder="Masukkan Dokumen">
                            <div id="error-update-timeline"></div>
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

    <div class="modal fade" id="modal-verif" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <form action="{{ route('timeline.verifikasiTimeline') }}" method="patch" id="form-timeline-verif" autocomplete="off"
            enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Lihat Dokumen</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="agendaId" name="agenda_id">
                        <iframe class="mb-3" src="" style="width: 100%; height: 500px;" id="fileFrame"></iframe>

                        @if ($role_id == 2)
                        <div>
                            Apakah Agenda ini Tervalidasi ?
                        </div>

                        <div class="mt-2">
                            <button type="button" class="btn btn-success mr-2 btn-verification" data-verif="2">Ya</button>
                            <button type="button" class="btn btn-danger btn-verification" data-verif="1">Tidak</button>
                        </div>

                        <div id="reasonInput" style="display: block;">
                            <input type="text" name="catatan" id="reason" class="form-control mt-2" placeholder="Catatan">
                        </div>
                        @else
                        <div id="reasonInput" style="display: none;">
                            <input type="text" name="catatan" id="reason" class="form-control mt-2" placeholder="Catatan">
                        </div>
                        @endif

                    </div>
                    <div class="modal-footer">
                        @if ($role_id == 2)
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Simpan</button>
                        @endif
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        var role_id = {{ session('role_id') }};
    </script>

    <script src="{{ asset('js/page/timeline/list.js?q=' . Str::random(5)) }}"></script>
@endpush

<script>
$(document).on('click', '.open-modal', function() {
    var fileUrl = $(this).data('file-url');
    $('#fileFrame').attr('src', fileUrl);
});
</script>
