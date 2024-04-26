@extends('layouts.app')

@php
    $plugins = ['datatable', 'swal', 'select2'];
@endphp

@section('contents')
    <form action="{{ route('fakultas.store') }}" method="post" id="form-fakultas" autocomplete="off">
        @csrf
        @method('POST')
        <input type="hidden" name="id" id="update-id" value="{{$data->id}}">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="modal-fakultasLabel">Form {{$data->fakultas}} </h5>
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
                    <label for="fakultas">Nama fakultas</label>
                    <input type="text" name="fakultas" id="fakultas" class="form-control"
                        placeholder="Masukkan Nama fakultas" required  value="{{ $data->fakultas }}">
                    <div id="error-fakultas"></div>
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
                    url: '/fakultas/delete-repeater',
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
                    url: '/fakultas/delete-repeater',
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
                    url: '/fakultas/delete-repeater',
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
                    url: '/fakultas/delete-repeater',
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

            $(document).on('click', '.repeater-add-btn-perfakultasan-update', function() {
                var $clone = $('.repeater-perfakultasan-update').first().clone();
                $clone.find('input').val('');
                $clone.find('input, label');
                $clone.find('.repeater-remove-btn-perfakultasan-update').removeClass('d-none');
                $clone.find('.repeater-add-btn-perfakultasan-update').remove();
                $('.container-perfakultasan-update').append($clone);

                $('.repeater-perfakultasan-update').removeClass('initial-hide');
            });

            $(document).on('click', '.repeater-remove-btn-perfakultasan-update', function() {
                var id_ubah = $(this).data('id');
                $.ajax({
                    url: '/fakultas/delete-repeater',
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
                    url: '/fakultas/delete-repeater',
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

        $('#form-fakultas').on('submit', function (e) {
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
                    $('#modal-fakultas').find('.modal-dialog').LoadingOverlay('show');
                },
                success: (res) => {
                    $('#modal-fakultas').find('.modal-dialog').LoadingOverlay('hide', true);
                    $(this)[0].reset();
                    clearErrorMessage();
                    window.location.reload();
                    $('#modal-fakultas').modal('hide');
                },
                error: ({ status, responseJSON }) => {
                    $('#modal-fakultas').find('.modal-dialog').LoadingOverlay('hide', true);

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
