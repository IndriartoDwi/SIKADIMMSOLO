@extends('layouts.app')

@php
    $plugins = ['datatable', 'swal', 'select2'];
@endphp

@section('contents')
    <form action="{{ route('prodi.store') }}" method="post" id="form-prodi" autocomplete="off">
        @csrf
        @method('POST')
        <input type="hidden" name="id" id="update-id" value="{{$data->id}}">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="modal-prodiLabel">Form {{$data->prodi}} </h5>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="kampus_id">Perguruan Tinggi</label>
                    <select class="form-control" name="kampus_id" id="kampus_id">
                        <option value="" selected>--- Pilih Perguruan Tinggi ---</option>
                        @foreach ($kampus as $option)
                            <option value="{{ $option->id }}" {{ $data->kampus->contains('id', $option->id) ? 'selected' : '' }}>
                                {{ $option->kampus }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="fakultas_id">Fakultas</label>
                    <select class="form-control" name="fakultas_id" id="fakultas_id">
                        <option value="" selected>--- Pilih Fakultas ---</option>
                        @foreach ($fakultas as $option)
                            <option value="{{ $option->id }}" {{ $data->fakultas->contains('id', $option->id) ? 'selected' : '' }}>
                                {{ $option->fakultas }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="prodi">Nama prodi</label>
                    <input type="text" name="prodi" id="prodi" class="form-control"
                        placeholder="Masukkan Nama Prodi" required  value="{{ $data->prodi }}">
                    <div id="error-prodi"></div>
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

    <script>
        $('#form-prodi').on('submit', function (e) {
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
                    $('#modal-prodi').find('.modal-dialog').LoadingOverlay('show');
                },
                success: (res) => {
                    $('#modal-prodi').find('.modal-dialog').LoadingOverlay('hide', true);
                    $(this)[0].reset();
                    clearErrorMessage();
                    window.location.reload();
                    $('#modal-prodi').modal('hide');
                },
                error: ({ status, responseJSON }) => {
                    $('#modal-prodi').find('.modal-dialog').LoadingOverlay('hide', true);

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
