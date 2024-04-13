@extends('layouts.app')

@php
    $plugins = ['datatable', 'swal', 'select2'];
@endphp

@push('styles')
<style>
    .repeater-pendidikan-update:first-child {
        display: none;
    }

    .repeater-terakhir-update:first-child {
        display: none;
    }

    .repeater-posisi-update:first-child {
        display: none;
    }

    .repeater-lainnya-update:first-child {
        display: none;
    }

    .repeater-perkaderan-update:first-child {
        display: none;
    }

    .repeater-pimpinan-update:first-child {
        display: none;
    }
</style>
@endpush
@section('contents')
    <form action="{{ route('kader.store') }}" method="post" id="form-kader" autocomplete="off">
        @csrf
        @method('POST')
        <input type="hidden" name="id" id="update-id" value="{{$data->id}}">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="modal-kaderLabel">Form Kader</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <h5>Data Diri Kader</h5>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="nama_lengkap">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control"
                                placeholder="Masukkan Nama Lengkap" value="{{ $data->nama_lengkap }}">
                            <div id="error-nama_lengkap"></div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="no_hp">No Hp</label>
                            <input type="text" name="no_hp" id="no_hp" class="form-control"
                                placeholder="Masukkan No Hp"
                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                value="{{ $data->no_hp }}">
                            <div id="error-no_hp"></div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control"
                                placeholder="Masukkan Email"  value="{{ $data->email }}">
                            <div id="error-email"></div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="sosial_media">Sosial Media</label>
                            <input type="text" name="sosial_media" id="sosial_media" class="form-control"
                                placeholder="Masukkan Sosial Media"  value="{{ $data->sosial_media }}">
                            <div id="error-sosial_media"></div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="nia">Nomor Induk Anggota<font color="red"> *jika ada</font></label>
                            <input type="text" name="nia" id="nia" class="form-control"
                                placeholder="Masukan Nomor Induk Anggota"  value="{{ $data->nia }}">
                            <div id="error-nia"></div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                                <option value="" selected>--- Pilih Jenis Kelamin ---</option>
                                <option value="Pria" {{ $data->jenis_kelamin == 'Pria' ? 'selected' : '' }}>Pria</option>
                                <option value="Wanita" {{ $data->jenis_kelamin == 'Wanita' ? 'selected' : '' }}>Wanita
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Agama</label>
                            <select class="form-control" name="agama" id="agama">
                                <option value="" selected>--- Pilih Agama ---</option>
                                <option value="Islam" {{ $data->agama == 'Islam' ? 'selected' : '' }}>Islam</option>
                                <option value="Kristen Protestan"
                                    {{ $data->agama == 'Kristen Protestan' ? 'selected' : '' }}>Kristen Protestan</option>
                                <option value="Katolik" {{ $data->agama == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                                <option value="Hindu" {{ $data->agama == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                <option value="Buddha" {{ $data->agama == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                                <option value="Kong Hu Cu" {{ $data->agama == 'Kong Hu Cu' ? 'selected' : '' }}>Kong Hu Cu
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>Kebangsaan</label>
                            <select class="form-control" name="kebangsaan" id="kebangsaan">
                                <option value="" selected>--- Pilih Kebangsaan ---</option>
                                <option value="WNI" {{ $data->kebangsaan == 'WNI' ? 'selected' : '' }}>WNI</option>
                                <option value="WNA" {{ $data->kebangsaan == 'WNA' ? 'selected' : '' }}>WNA</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" name="status_menikah" id="status_menikah">
                                <option value="" selected>--- Pilih Status ---</option>
                                <option value="Menikah" {{ $data->status_menikah == 'Menikah' ? 'selected' : '' }}>Menikah
                                </option>
                                <option value="Belum Menikah"
                                    {{ $data->status_menikah == 'Belum Menikah' ? 'selected' : '' }}>Belum Menikah</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control"
                                placeholder="Masukan Tempat Lahir" value="{{ $data->tempat_lahir }}">
                            <div id="error-tempat_lahir"></div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control"
                                placeholder="Masukan Tanggal Lahir" value="{{ $data->tanggal_lahir }}">
                            <div id="error-tanggal_lahir"></div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="domisili">Domisili</label>
                            <textarea type="text" name="domisili" id="domisili" class="form-control" placeholder="Masukan Domisili">{{ $data->domisili }}</textarea>
                            <div id="error-domisili"></div>
                        </div>
                        <hr>
                    </div>

                    <div class="col-lg-12">
                        <h5>Data PC dan Komisariat</h5>
                        <hr>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="pc">Pimpimnan Cabang</label>
                            <select class="form-control" name="pc" id="pc">
                                <option value="" selected>--- Pilih Pimpimnan Cabang ---</option>
                                @foreach ($cabang as $option)
                                    <option value="{{$option->cabang}}" {{ $data->pc == $option->cabang ? 'selected' : '' }}>
                                        {{$option->cabang}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="komisariat">Pimpinan Komisariat</label>
                            <select class="form-control" name="komisariat" id="komisariat">
                                <option value="" selected>--- Pilih Pimpinan Komisariat ---</option>
                                @foreach ($komisariat as $option)
                                    <option value="{{$option->komisariat}}" {{ $data->komisariat == $option->komisariat ? 'selected' : '' }}>
                                        {{$option->komisariat}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="universitas">Perguruan Tinggi</label>
                            <select class="form-control" name="universitas" id="universitas">
                                <option value="" selected>--- Pilih Perguruan Tinggi ---</option>
                                @foreach ($kampus as $option)
                                    <option value="{{$option->kampus}}" {{ $data->universitas == $option->kampus ? 'selected' : '' }}>
                                        {{$option->kampus}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="fakultas">Fakultas</label>
                            <select class="form-control select2" name="fakultas" id="fakultas">
                                <option value="" selected>--- Pilih Fakultas ---</option>
                                @foreach ($fakultas as $option)
                                    <option value="{{$option->fakultas}}" {{ $data->fakultas == $option->fakultas ? 'selected' : '' }}>
                                        {{$option->fakultas}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="prodi">Program Studi</label>
                            <select class="form-control select2" name="prodi" id="prodi">
                                <option value="" selected>--- Pilih Program Studi ---</option>
                                @foreach ($prodi as $option)
                                    <option value="{{$option->prodi}}" {{ $data->prodi == $option->prodi ? 'selected' : '' }}>
                                        {{$option->prodi}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="col-lg-12">
                                    <hr>
                                        <div class="col-lg-12 d-flex justify-content-between align-items-center">
                                                <h5 class="mt-2"> Riwayat Pendidikan</h5>
                                                <div class="col-lg-2">
                                                    <button type="button" class="btn btn-primary repeater-add-btn-pendidikan-update">Tambah</button>
                                                </div>
                                        </div>
                                    <hr>
                                </div>

                                <div class="col-lg-12">
                                    <div class="container">
                                        <div class="container-pendidikan">
                                            <div class="row g-3 repeater-pendidikan-update initial-hide mb-1">
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
                                                <div class="col-lg-1 mt-4">
                                                    <button type="button" class="btn btn-danger repeater-remove-btn-pendidikan-update">Remove</button>
                                                </div>
                                            </div>
                                            <div class="row">
                                                @foreach ($pendidikan as $item)
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label for="jenjang_sekolah">Jenjang Sekolah</label>
                                                            <select class="form-control" name="jenjang_sekolah[]" id="jenjang_sekolah">
                                                                <option value="" selected>--- Pilih Jenjang Sekolah ---</option>
                                                                <option value="SD"
                                                                    {{ $item['jenjang_sekolah'] == 'SD' ? 'selected' : '' }}>
                                                                    Sekolah Dasar</option>
                                                                <option value="SMP"
                                                                    {{ $item['jenjang_sekolah'] == 'SMP' ? 'selected' : '' }}>
                                                                    Sekolah Menengah Pertama</option>
                                                                <option value="SMA"
                                                                    {{ $item['jenjang_sekolah'] == 'SMA' ? 'selected' : '' }}>
                                                                    Sekolah Menengah Atas</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label for="nama_sekolah">Nama Sekolah</label>
                                                            <input type="text" class="form-control" name="nama_sekolah[]"
                                                                placeholder="Masukkan Nama Sekolah"
                                                                value="{{ $item['nama_sekolah'] }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="form-group">
                                                            <label for="tahun_lulus">Tahun lulus</label>
                                                            <input type="text" class="form-control" name="tahun_lulus[]"
                                                                placeholder="Tahun Lulus" value="{{ $item['tahun_lulus'] }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-1 mt-4">
                                                        <button type="button"
                                                            class="btn btn-danger repeater-remove-btn-pendidikan-update" data-id="{{ $item['id'] }}"
                                                            >Remove</button>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="col-lg-12">
                                    <hr>
                                        <div class="col-lg-12 d-flex justify-content-between align-items-center">
                                            <h5 class="mt-2"> Pendidikan Terakhir</h5>
                                            <div class="col-lg-2">
                                                <button type="button" class="btn btn-primary repeater-add-btn-terakhir-update">Tambah</button>
                                            </div>
                                        </div>
                                    <hr>
                                </div>

                                <div class="col-lg-12">
                                    <div class="container">
                                        <div class="container-terakhir-update">
                                            <div class="row g-3 repeater-terakhir-update initial-hide mb-1">
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
                                                <div class="col-lg-2 mt-4">
                                                    <button class="btn btn-danger repeater-remove-btn-terakhir-update">Remove</button>
                                                </div>
                                            </div>
                                            <div class="row">
                                                @foreach ($pendidikanTerakhir as $item)
                                                    <div class="col-lg-5">
                                                        <div class="form-group">
                                                            <label for="pendidikan_terakhir">Pendidikan Terakhir</label>
                                                            <select class="form-control" name="pendidikan_terakhir[]"
                                                                id="pendidikan_terakhir">
                                                                <option value="" selected>--- Pilih Pendidikan Terakhir ---
                                                                </option>
                                                                <option value="Diploma"
                                                                    {{ $item['pendidikan_terakhir'] == 'Diploma' ? 'selected' : '' }}>
                                                                    Diploma</option>
                                                                <option value="Sarjana"
                                                                    {{ $item['pendidikan_terakhir'] == 'Sarjana' ? 'selected' : '' }}>
                                                                    Sarjana</option>
                                                                <option value="Megister"
                                                                    {{ $item['pendidikan_terakhir'] == 'Megister' ? 'selected' : '' }}>
                                                                    Megister</option>
                                                                <option value="Doktor"
                                                                    {{ $item['pendidikan_terakhir'] == 'Doktor' ? 'selected' : '' }}>
                                                                    Doktor</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label for="status_pendidikan_terakhir">Status</label>
                                                            <select class="form-control" name="status_pendidikan_terakhir[]"
                                                                id="status_pendidikan_terakhir">
                                                                <option value="" selected>--- Pilih Status ---</option>
                                                                <option value="Aktif"
                                                                    {{ $item['status_pendidikan_terakhir'] == 'Aktif' ? 'selected' : '' }}>
                                                                    Aktif</option>
                                                                <option value="Tidak Aktif"
                                                                    {{ $item['status_pendidikan_terakhir'] == 'Tidak Aktif' ? 'selected' : '' }}>
                                                                    Tidak Aktif</option>
                                                                <option value="Cuti"
                                                                    {{ $item['status_pendidikan_terakhir'] == 'Cuti' ? 'selected' : '' }}>
                                                                    Cuti</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2 mt-4">
                                                        <button type="button"
                                                            class="btn btn-danger repeater-remove-btn-terakhir-update" data-id="{{ $item['id'] }}">Remove</button>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="col-lg-12">
                                    <hr>
                                        <div class="col-lg-12 d-flex justify-content-between align-items-center">
                                            <h5 class="mt-2">Pengalaman Organisasi di IMM</h5>
                                            <div class="col-lg-2">
                                                <button type="button" class="btn btn-primary repeater-add-btn-posisi-update">Tambah</button>
                                            </div>
                                        </div>
                                    <hr>
                                </div>
                                <div class="col-lg-12">
                                    <div class="container">
                                        <div class="container-posisi-update">
                                            <div class="row g-3 repeater-posisi-update initial-hide mb-1">
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label for="posisi_jabatan">Posisi/Jabatan</label>
                                                        <input type="text" class="form-control" name="posisi_jabatan[]" placeholder="Posisi">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label for="mulai_organisasi">Mulai</label>
                                                        <input type="date" class="form-control" name="mulai_organisasi[]" placeholder="Posisi">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label for="selesai_organisasi">Selesi</label>
                                                        <input type="date" class="form-control" name="selesai_organisasi[]" placeholder="Posisi">
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <button class="btn btn-danger repeater-remove-btn-posisi mt-4">Remove</button>
                                                </div>
                                            </div>
                                            <div class="row">
                                                @foreach ($pengalamanOrganisasiIMM as $item)
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label for="posisi_jabatan">Posisi/Jabatan</label>
                                                            <input type="text" class="form-control" name="posisi_jabatan[]" placeholder="Posisi" value="{{ $item['posisi_jabatan'] }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="form-group">
                                                            <label for="mulai_organisasi">Mulai</label>
                                                            <input type="date" class="form-control" name="mulai_organisasi[]" placeholder="Posisi" value="{{ $item['mulai_organisasi'] }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="form-group">
                                                            <label for="selesai_organisasi">Selesai</label>
                                                            <input type="date" class="form-control" name="selesai_organisasi[]" placeholder="Posisi" value="{{ $item['selesai_organisasi'] }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-1 mt-2">
                                                        <button type="button" class="btn btn-danger repeater-remove-btn-posisi-update mt-3" data-id="{{ $item['id'] }}">Remove</button>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="col-lg-12">
                                    <hr>
                                        <div class="col-lg-12 d-flex justify-content-between align-items-center">
                                                <h5 class="mt-2">Pengalaman Organisasi Lainnya</h5>
                                                <div class="col-lg-2">
                                                    <button type="button" class="btn btn-primary repeater-add-btn-lainnya-update">Tambah</button>
                                                </div>
                                        </div>
                                    <hr>
                                </div>

                                <div class="container">
                                    <div class="container-lainnya-update">
                                        <div class="row g-3 repeater-lainnya-update initial-hide mb-1">
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
                                                    <label for="mulai_organisasi">Mulai</label>
                                                    <input type="date" class="form-control" name="mulai_organisasi[]">
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <label for="selesai_organisasi">Selesi</label>
                                                    <input type="date" class="form-control" name="selesai_organisasi[]">
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <button class="btn btn-danger repeater-remove-btn-lainnya mt-4">Remove</button>
                                            </div>
                                        </div>
                                        <div class="row">
                                            @foreach ($pengalamanOrganisasiLainnya as $item)
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label for="tempat">Tempat</label>
                                                        <input type="text" class="form-control" name="tempat[]" value="{{ $item['tempat'] }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label for="posisi_jabatan_lainnya">Posisi/Jabatan</label>
                                                        <input type="text" class="form-control" name="posisi_jabatan_lainnya[]" value="{{ $item['posisi_jabatan_lainnya'] }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="form-group">
                                                        <label for="mulai_organisasi">Mulai</label>
                                                        <input type="date" class="form-control" name="mulai_organisasi[]" value="{{ $item['mulai_organisasi'] }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="form-group">
                                                        <label for="selesai_organisasi">Selesai</label>
                                                        <input type="date" class="form-control" name="selesai_organisasi[]" value="{{ $item['selesai_organisasi'] }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-1 mt-2">
                                                    <button type="button" class="btn btn-danger repeater-remove-btn-lainnya-update mt-3" data-id="{{ $item['id'] }}">Remove</button>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <hr>
                            <div class="col-lg-12 d-flex justify-content-between align-items-center">
                                    <h5 class="mt-2">Perkaderan Utama</h5>
                                    <div class="col-lg-2">
                                        <button type="button" class="btn btn-primary repeater-add-btn-perkaderan-update">Tambah</button>
                                    </div>
                            </div>
                        <hr>
                        <div class="container">
                            <div class="container-perkaderan-update">
                                <div class="row g-3 repeater-perkaderan-update initial-hide mb-1">
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
                                        <button type="button" class="btn btn-danger repeater-remove-btn-perkaderan-update mt-4">Remove</button>
                                    </div>
                                </div>
                                <div class="row">
                                    @foreach ($Perkaderan as $item)
                                        <div class="col-lg-5">
                                            <div class="form-group">
                                                <label for="kegiatan_perkaderan">Kegiatan</label>
                                                <select class="form-control" name="kegiatan_perkaderan[]"
                                                    id="kegiatan_perkaderan">
                                                    <option value="" selected>--- Pilih Kegaitan Perkaderan ---
                                                    </option>
                                                    <option value="DAD" {{ $item['kegiatan_perkaderan'] == 'DAD' ? 'selected' : '' }}>DAD</option>
                                                    <option value="DAM" {{ $item['kegiatan_perkaderan'] == 'DAM' ? 'selected' : '' }}>DAM</option>
                                                    <option value="DAP" {{ $item['kegiatan_perkaderan'] == 'DAP' ? 'selected' : '' }}>DAP</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <div class="form-group">
                                                <label for="tahun_perkaderan">Tahun</label>
                                                <input type="text" class="form-control" name="tahun_perkaderan[]"
                                                    placeholder="Tahun" value="{{$item['tahun_perkaderan']}}">
                                            </div>
                                        </div>
                                        <div class="col-lg-2 mt-4">
                                            <button type="button" class="btn btn-danger repeater-remove-btn-perkaderan-update" data-id="{{$item['id']}}">Remove</button>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="col-lg-12">
                            <hr>
                                <div class="col-lg-12 d-flex justify-content-between align-items-center">
                                    <h5 class="mt-2">Perkaderan Khusus</h5>
                                    <div class="col-lg-2">
                                        <button type="button" class="btn btn-primary repeater-add-btn-pimpinan-update">Tambah</button>
                                    </div>
                                </div>
                            <hr>
                        </div>

                        <div class="container">
                            <div class="container-pimpinan-update">
                                <div class="row g-3 repeater-pimpinan-update mb-1">
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
                                        <button type="button" class="btn btn-danger repeater-remove-btn-pimpina-update mt-4">Remove</button>
                                    </div>
                                </div>
                                <div class="row">
                                    @foreach ($Pimpinan as $item)
                                        <div class="col-lg-5">
                                            <div class="form-group">
                                                <label for="kegiatan_pimpinan">Kegiatan</label>
                                                <select class="form-control" name="kegiatan_pimpinan[]"
                                                    id="kegiatan_pimpinan">
                                                    <option value="" selected>--- Pilih Kegaitan Pimpinan ---
                                                    </option>
                                                    <option value="PID" {{ $item['kegiatan_pimpinan'] == 'PID' ? 'selected' : '' }}>PID</option>
                                                    <option value="PIM" {{ $item['kegiatan_pimpinan'] == 'PIM' ? 'selected' : '' }}>PIM</option>
                                                    <option value="PIP" {{ $item['kegiatan_pimpinan'] == 'PIP' ? 'selected' : '' }}>PIP</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <div class="form-group">
                                                <label for="tahun_pimpinan">Tahun</label>
                                                <input type="text" class="form-control" name="tahun_pimpinan[]"
                                                    placeholder="Tahun" value="{{$item['tahun_pimpinan']}}">
                                            </div>
                                        </div>
                                        <div class="col-lg-2 mt-4">
                                            <button type="button" class="btn btn-danger repeater-remove-btn-pimpinan-update" data-id="{{$item['id']}}">Remove</button>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <a href="{{ asset('storage' . $data->foto) }}" target="_blank">Lihat Foto</a>
                        <input type="file" name="foto" id="foto" class="form-control"
                            placeholder="Masukkan Nama foto" >
                        <div id="error-foto"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary waves-effect waves-light">Simpan</button>
        </div>
        </div><!-- /.modal-content -->
    </form>
@endsection


@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.js"
        integrity="sha512-bZAXvpVfp1+9AUHQzekEZaXclsgSlAeEnMJ6LfFAvjqYUVZfcuVXeQoN5LhD7Uw0Jy4NCY9q3kbdEXbwhZUmUQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js"
        integrity="sha512-foIijUdV0fR0Zew7vmw98E6mOWd9gkGWQBWaoA1EOFAx+pY+N8FmmtIYAVj64R98KeD2wzZh1aHK0JSpKmRH8w=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).ready(function() {
            $('#fakultas').select2({
                width: '100%',
            });


            $('#prodi').select2({
                width: '100%',
            });
            $(document).on('click', '.repeater-add-btn-pendidikan-update', function() {
                var $clone = $('.repeater-pendidikan-update').first().clone();
                $clone.find('input').val('');
                $clone.find('input, label');
                $clone.find('.repeater-remove-btn-pendidikan-update').removeClass('d-none');
                $clone.find('.repeater-add-btn-pendidikan-update').remove();
                $('.container-pendidikan').append($clone);

                $('.repeater-pendidikan-update').removeClass('initial-hide');
            });

            $(document).on('click', '.repeater-remove-btn-pendidikan-update', function() {
                var id_ubah = $(this).data('id');
                $.ajax({
                    url: '/kader/delete-repeater',
                    type: 'DELETE',
                    data: {
                        hapus:1,
                        id_ubah: id_ubah,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        window.location.reload();
                        $(this).closest('.repeater-pendidikan-update').remove();
                    },
                    error: function(xhr, status, error) {
                        // Handle error if any
                        console.log(error);
                    }
                });
            });

            $(document).on('click', '.repeater-add-btn-terakhir-update', function() {
                var $clone = $('.repeater-terakhir-update').first().clone();
                $clone.find('input').val('');
                $clone.find('input, label');
                $clone.find('.repeater-remove-btn-terakhir-update').removeClass('d-none');
                $clone.find('.repeater-add-btn-terakhir-update').remove();
                $('.container-terakhir-update').append($clone);

                $('.repeater-terakhir-update').removeClass('initial-hide');
            });

            $(document).on('click', '.repeater-remove-btn-terakhir-update', function() {
                var id_ubah = $(this).data('id');
                $.ajax({
                    url: '/kader/delete-repeater',
                    type: 'DELETE',
                    data: {
                        hapus:2,
                        id_ubah: id_ubah,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        window.location.reload();

                    },
                    error: function(xhr, status, error) {
                        // Handle error if any
                        console.log(error);
                    }
                });
            });

            $(document).on('click', '.repeater-add-btn-posisi-update', function() {
                var $clone = $('.repeater-posisi-update').first().clone();
                $clone.find('input').val('');
                $clone.find('input, label');
                $clone.find('.repeater-remove-btn-posisi-update').removeClass('d-none');
                $clone.find('.repeater-add-btn-posisi-update').remove();
                $('.container-posisi-update').append($clone);


                $('.repeater-posisi-update').removeClass('initial-hide');
            });

            $(document).on('click', '.repeater-remove-btn-posisi-update', function() {
                var id_ubah = $(this).data('id');
                $.ajax({
                    url: '/kader/delete-repeater',
                    type: 'DELETE',
                    data: {
                        hapus:3,
                        id_ubah: id_ubah,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        window.location.reload();
                    },
                    error: function(xhr, status, error) {
                        // Handle error if any
                        console.log(error);
                    }
                });
            });

            $(document).on('click', '.repeater-add-btn-lainnya-update', function() {
                var $clone = $('.repeater-lainnya-update').first().clone();
                $clone.find('input').val('');
                $clone.find('input, label');
                $clone.find('.repeater-remove-btn-lainnya-update').removeClass('d-none');
                $clone.find('.repeater-add-btn-lainnya-update').remove();
                $('.container-lainnya-update').append($clone);
                $('.repeater-lainnya-update').removeClass('initial-hide');
            });

            $(document).on('click', '.repeater-remove-btn-lainnya-update', function() {
                var id_ubah = $(this).data('id');
                $.ajax({
                    url: '/kader/delete-repeater',
                    type: 'DELETE',
                    data: {
                        hapus:4,
                        id_ubah: id_ubah,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        window.location.reload();
                    },
                    error: function(xhr, status, error) {
                        // Handle error if any
                        console.log(error);
                    }
                });
            });

            $(document).on('click', '.repeater-add-btn-perkaderan-update', function() {
                var $clone = $('.repeater-perkaderan-update').first().clone();
                $clone.find('input').val('');
                $clone.find('input, label');
                $clone.find('.repeater-remove-btn-perkaderan-update').removeClass('d-none');
                $clone.find('.repeater-add-btn-perkaderan-update').remove();
                $('.container-perkaderan-update').append($clone);

                $('.repeater-perkaderan-update').removeClass('initial-hide');
            });

            $(document).on('click', '.repeater-remove-btn-perkaderan-update', function() {
                var id_ubah = $(this).data('id');
                $.ajax({
                    url: '/kader/delete-repeater',
                    type: 'DELETE',
                    data: {
                        hapus:5,
                        id_ubah: id_ubah,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        window.location.reload();
                    },
                    error: function(xhr, status, error) {
                        // Handle error if any
                        console.log(error);
                    }
                });
            });

            $(document).on('click', '.repeater-add-btn-pimpinan-update', function() {
                var $clone = $('.repeater-pimpinan-update').first().clone();
                $clone.find('input').val('');
                $clone.find('input, label');
                $clone.find('.repeater-remove-btn-pimpinan-update').removeClass('d-none');
                $clone.find('.repeater-add-btn-pimpinan-update').remove();
                $('.container-pimpinan-update').append($clone);
            });

            $(document).on('click', '.repeater-remove-btn-pimpinan-update', function() {
                var id_ubah = $(this).data('id');
                $.ajax({
                    url: '/kader/delete-repeater',
                    type: 'DELETE',
                    data: {
                        hapus:6,
                        id_ubah: id_ubah,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        window.location.reload();
                    },
                    error: function(xhr, status, error) {
                        // Handle error if any
                        console.log(error);
                    }
                });
            });
        });

        $('#form-kader').on('submit', function (e) {
            e.preventDefault();

            var data = new FormData(this);

            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: data,
                dataType: 'json',
                processData: false,
                contentType: false,
                beforeSend: () => {
                    clearErrorMessage();
                    $('#modal-kader').find('.modal-dialog').LoadingOverlay('show');
                },
                success: (res) => {
                    $('#modal-kader').find('.modal-dialog').LoadingOverlay('hide', true);
                    $(this)[0].reset();
                    clearErrorMessage();
                    window.location.reload();
                    $('#modal-kader').modal('hide');
                },
                error: ({ status, responseJSON }) => {
                    $('#modal-kader').find('.modal-dialog').LoadingOverlay('hide', true);

                    if (status == 422) {
                        generateErrorMessage(responseJSON);
                        return false;
                    }

                    showErrorToastr('oops', responseJSON.msg)
                }
            })
        })
    </script>
@endpush
