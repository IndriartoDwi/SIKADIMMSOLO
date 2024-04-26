@extends('layouts.app')

@php
$plugins = ['datatable', 'swal', 'select2'];
@endphp

@push('style')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
@endpush

@section('contents')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                @if (rbacCheck('kader', 2))
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
                                <th>Data Diri Kader</th>
                                <th>Data Komisariat</th>
                                <th>Perkaderan Utama</th>
                                <th>Perkaderan Khusus</th>
                                <th>Foto</th>
                                <th>Aksi</th>
                                <th></th>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- sample modal content -->
<div id="modal-kader" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-kaderLabel"  aria-hidden="true" data-backdrop="static" data-keyboard="false"
    aria-hidden="true">
    <form action="{{ route('kader.store') }}" method="post" id="form-kader" autocomplete="off">
        <div class="modal-dialog modal-dialog-popup modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="modal-kaderLabel">Form Kader</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <h5 >Data Diri Kader</h5>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="nama_lengkap">Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control"
                                    placeholder="Masukkan Nama Lengkap" required>
                                <div id="error-nama_lengkap"></div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="no_hp">No Hp</label>
                                <input type="text" name="no_hp" id="no_hp" class="form-control"
                                    placeholder="Masukkan No Hp" required
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                <div id="error-no_hp"></div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control"
                                    placeholder="Masukkan Email" required>
                                <div id="error-email"></div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="sosial_media">Sosial Media</label>
                                <input type="text" name="sosial_media" id="sosial_media" class="form-control"
                                    placeholder="Masukkan Sosial Media" required>
                                <div id="error-sosial_media"></div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="nia">Nomor Induk Anggota<font color="red"> *jika ada</font></label>
                                <input type="text" name="nia" id="nia"
                                    class="form-control" placeholder="Masukan Nomor Induk Anggota" required>
                                <div id="error-nia"></div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                                    <option value="" selected>--- Pilih Jenis Kelamin ---</option>
                                    <option value="Pria">Pria</option>
                                    <option value="Wanita">Wanita</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>Agama</label>
                                <select class="form-control" name="agama" id="agama">
                                    <option value="" selected>--- Pilih Agama ---</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen Protestan">Kristen Protestan</option>
                                    <option value="Katolik">Katolik</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Buddha">Buddha</option>
                                    <option value="Kong Hu Cu">Kong Hu Cu</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>Kebangsaan</label>
                                <select class="form-control" name="kebangsaan" id="kebangsaan">
                                    <option value="" selected>--- Pilih Kebangsaan ---</option>
                                    <option value="WNI">WNI</option>
                                    <option value="WNA">WNA</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="status_menikah" id="status_menikah">
                                    <option value="" selected>--- Pilih Status ---</option>
                                    <option value="Menikah">Menikah</option>
                                    <option value="Belum Menikah">Belum Menikah</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="tempat_lahir">Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" id="tempat_lahir"
                                    class="form-control" placeholder="Masukan Tempat Lahir">
                                <div id="error-tempat_lahir"></div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                                    class="form-control" placeholder="Masukan Tanggal Lahir">
                                <div id="error-tanggal_lahir"></div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="domisili">Domisili</label>
                                <textarea type="text" name="domisili" id="domisili"
                                    class="form-control" placeholder="Masukan Domisili"></textarea>
                                <div id="error-domisili"></div>
                            </div>
                            <hr>
                        </div>

                        <div class="col-lg-12">
                            <h5 >Data PC dan Komisariat</h5>
                            <hr>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="pc">Pimpimnan Cabang</label>
                                <select class="form-control" name="pc" id="pc">
                                    <option value="" selected>--- Pilih Pimpimnan Cabang ---</option>
                                    @foreach ($cabang as $dt )
                                        <option value="{{$dt->cabang}}">{{$dt->cabang}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="komisariat">Pimpinan Komisariat</label>
                                <select class="form-control" name="komisariat" id="komisariat">
                                    <option value="" selected>--- Pilih Pimpinan Komisariat ---</option>
                                    @foreach ($komisariat as $dt )
                                        <option value="{{$dt->komisariat}}">{{$dt->komisariat}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="universitas">Perguruan Tinggi</label>
                                <select class="form-control" name="universitas" id="universitas" onchange="get_fakultas(this)">
                                    <option value="" selected>--- Pilih Perguruan Tinggi ---</option>
                                    @foreach ($kampus as $dt )
                                        <option value="{{$dt->id}}">{{$dt->kampus}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="fakultas">Fakultas</label>
                                <select class="form-control select2" name="fakultas" id="fakultas" onchange="get_prodi(this)">
                                    <option value="" selected>--- Pilih Fakultas ---</option>
                                    @foreach ($fakultas as $dt )
                                        <option value="{{$dt->fakultas}}">{{$dt->fakultas}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="prodi">Program Studi</label>
                                <select class="form-control select2" name="prodi" id="prodi">
                                    <option value="" selected>--- Pilih Program Studi ---</option>
                                    @foreach ($prodi as $dt )
                                        <option value="{{$dt->prodi}}">{{$dt->prodi}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-7">
                                <div class="col-lg-12">
                                    <hr>
                                    <h5> Riwayat Pendidikan</h5>
                                    <hr>
                                </div>

                                <div class="container">
                                    <div class="container-pendidikan">
                                        <div class="row g-3 repeater-pendidikan mb-1">
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="jenjang_sekolah">Jenjang Sekolah</label>
                                                    <select class="form-control" name="jenjang_sekolah[]" id="jenjang_sekolah">
                                                        <option value="" selected>--- Pilih Jenjang Sekolah ---</option>
                                                        <option value="SD">Sekolah Dasar</option>
                                                        <option value="SMP">Sekolah Menengah Pertama</option>
                                                        <option value="SMA">Sekolah Menengah Atas</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="nama_sekolah">Nama Sekolah</label>
                                                    <input type="text" class="form-control" name="nama_sekolah[]" placeholder="Masukan Nama Sekolah">
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <label for="tahun_lulus">Tahun lulus</label>
                                                    <input type="text" class="form-control" name="tahun_lulus[]" placeholder="Tahun Lulus">
                                                </div>
                                            </div>
                                            <div class="col-lg-1">
                                                <button type="button" class="btn btn-primary repeater-add-btn-pendidikan" style="margin-top:70%">Add</button>
                                                <button class="btn btn-danger repeater-remove-btn-pendidikan d-none">Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="col-lg-12">
                                    <hr>
                                    <h5> Pendidikan Terakhir</h5>
                                    <hr>
                                </div>
                                <div class="container">
                                    <div class="container-terakhir">
                                        <div class="row g-3 repeater-terakhir mb-1">
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <label for="pendidikan_terakhir">Pendidikan Terakhir</label>
                                                    <select class="form-control" name="pendidikan_terakhir[]" id="pendidikan_terakhir">
                                                        <option value="" selected>--- Pilih Pendidikan Terakhir ---</option>
                                                        <option value="Diploma">Diploma</option>
                                                        <option value="Sarjana">Sarjana</option>
                                                        <option value="Megister">Megister</option>
                                                        <option value="Doktor">Doktor</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="status_pendidikan_terakhir">Status</label>
                                                    <select class="form-control" name="status_pendidikan_terakhir[]" id="status_pendidikan_terakhir">
                                                        <option value="" selected>--- Pilih Status ---</option>
                                                        <option value="Aktif">Aktif</option>
                                                        <option value="Tidak Aktif">Tidak Aktif</option>
                                                        <option value="Cuti">Cuti</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <button type="button" class="btn btn-primary repeater-add-btn-terakhir" style="margin-top:50%">Add</button>
                                                <button class="btn btn-danger repeater-remove-btn-terakhir d-none">Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="col-lg-12">
                                    <hr>
                                    <h5>Pengalaman Organisasi di IMM</h5>
                                    <hr>
                                </div>

                                <div class="container">
                                    <div class="container-posisi">
                                        <div class="row g-3 repeater-posisi mb-1">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="posisi_jabatan">Posisi/Jabatan</label>
                                                    <input type="text" class="form-control" name="posisi_jabatan[]" placeholder="Posisi">
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <label for="mulai_organisasi">Mulai</label>
                                                    <input type="date" class="form-control" name="mulai_organisasi[]" placeholder="Posisi">
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <label for="selesai_organisasi">Selesi</label>
                                                    <input type="date" class="form-control" name="selesai_organisasi[]" placeholder="Posisi">
                                                </div>
                                            </div>
                                            <div class="col-lg-1">
                                                <button type="button" class="btn btn-primary repeater-add-btn-posisi" style="margin-top:37%">Add</button>
                                                <button class="btn btn-danger repeater-remove-btn-posisi d-none">Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="col-lg-12">
                                    <hr>
                                    <h5>Pengalaman Organisasi Lainnya</h5>
                                    <hr>
                                </div>

                                <div class="container">
                                    <div class="container-lainnya">
                                        <div class="row g-3 repeater-lainnya mb-1">
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label for="tempat">Tempat</label>
                                                    <input type="text" class="form-control" name="tempat[]" placeholder="Tempat">
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label for="posisi_jabatan_lainnya">Posisi/Jabatan</label>
                                                    <input type="text" class="form-control" name="posisi_jabatan_lainnya[]" placeholder="Posisi">
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <label for="mulai_lainnya">Mulai</label>
                                                    <input type="date" class="form-control" name="mulai_lainnya[]" placeholder="Posisi">
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <label for="selesai">Selesi</label>
                                                    <input type="date" class="form-control" name="selesai_lainnya[]" placeholder="Posisi">
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <button type="button" class="btn btn-primary repeater-add-btn-lainnya" style="margin-top:16%">Add</button>
                                                <button class="btn btn-danger repeater-remove-btn-lainnya d-none">Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="col-lg-12">
                                    <hr>
                                    <h5>Perkaderan Utama</h5>
                                    <hr>
                                </div>

                                <div class="container">
                                    <div class="container-perkaderan">
                                        <div class="row g-3 repeater-perkaderan mb-1">
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <label for="kegiatan_perkaderan">Kegiatan</label>
                                                    <select class="form-control" name="kegiatan_perkaderan[]" id="kegiatan_perkaderan">
                                                        <option value="" selected>--- Pilih Perkaderan Utama ---</option>
                                                        <option value="DAD">DAD</option>
                                                        <option value="DAM">DAM</option>
                                                        <option value="DAP">DAP</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <label for="tahun_perkaderan">Tahun</label>
                                                    <input type="text" class="form-control" name="tahun_perkaderan[]" placeholder="Tahun">
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <button type="button" class="btn btn-primary repeater-add-btn-perkaderan" style="margin-top:37%">Add</button>
                                                <button class="btn btn-danger repeater-remove-btn-perkaderan d-none">Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="col-lg-12">
                                    <hr>
                                    <h5>Perkaderan Khusus</h5>
                                    <hr>
                                </div>

                                <div class="container">
                                    <div class="container-pimpinan">
                                        <div class="row g-3 repeater-pimpinan mb-1">
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <label for="kegiatan_pimpinan">Kegiatan</label>
                                                    <select class="form-control" name="kegiatan_pimpinan[]" id="kegiatan_pimpinan">
                                                        <option value="" selected>--- Pilih Perkaderan Khusus ---</option>
                                                        <option value="PID">PID</option>
                                                        <option value="PIM">PIM</option>
                                                        <option value="PIP">PIP</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <label for="tahun_pimpinan">Tahun</label>
                                                    <input type="text" class="form-control" name="tahun_pimpinan[]" placeholder="Tahun">
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <button type="button" class="btn btn-primary repeater-add-btn-pimpinan" style="margin-top:37%">Add</button>
                                                <button class="btn btn-danger repeater-remove-btn-pimpinan d-none">Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="foto">Foto</label>
                                <input type="file" name="foto" id="foto" class="form-control"
                                    placeholder="Masukkan Nama foto" required>
                                <div id="error-foto"></div>
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

@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.js" integrity="sha512-bZAXvpVfp1+9AUHQzekEZaXclsgSlAeEnMJ6LfFAvjqYUVZfcuVXeQoN5LhD7Uw0Jy4NCY9q3kbdEXbwhZUmUQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js" integrity="sha512-foIijUdV0fR0Zew7vmw98E6mOWd9gkGWQBWaoA1EOFAx+pY+N8FmmtIYAVj64R98KeD2wzZh1aHK0JSpKmRH8w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
</script>
<script src="{{ asset('js/page/kader/list.js?q='.Str::random(5)) }}"></script>
@endpush
