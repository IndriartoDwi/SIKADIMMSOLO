var isVerif;
let table;

$(() => {
    $('#table-data').on('click', '.btn-delete', function () {
        let data = table.row($(this).closest('tr')).data();

        let { id, nama_agenda } = data;

        Swal.fire({
            title: 'Anda yakin?',
            html: `Anda akan menghapus timeline "<b>${nama_agenda}</b>"!`,
            footer: 'Data yang sudah dihapus tidak bisa dikembalikan kembali!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                $.post(BASE_URL + 'timeline/delete', {
                    id,
                    _method: 'DELETE'
                }).done((res) => {
                    showSuccessToastr('sukses', 'timeline berhasil dihapus');
                    table.ajax.reload();
                }).fail((res) => {
                    let { status, responseJSON } = res;
                    showErrorToastr('oops', responseJSON.message);
                })
            }
        })
    })

    $('#table-data').on('click', '.btn-update', function () {
        var tr = $(this).closest('tr');
        var data = table.row(tr).data();

        clearErrorMessage();
        $('#form-timeline-update')[0].reset();

        var timelineUrl = "/storage" + data.dokumen;

        $('#lihat-timeline').attr('href', timelineUrl).text('Lihat Dokumen');

        $.each(data, (key, value) => {
            $('#update-' + key).val(value);
        })

        $('#modal-timeline-update').modal('show');
    })

    $('#form-timeline-update').on('submit', function (e) {
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
                $('#modal-timeline-update').find('.modal-dialog').LoadingOverlay('show');
            },
            success: (res) => {
                $('#modal-timeline-update').find('.modal-dialog').LoadingOverlay('hide', true);
                $(this)[0].reset();
                clearErrorMessage();
                table.ajax.reload();
                $('#modal-timeline-update').modal('hide');
            },
            error: ({ status, responseJSON }) => {
                $('#modal-timeline-update').find('.modal-dialog').LoadingOverlay('hide', true);

                if (status == 422 && responseJSON.error) {
                    showErrorToastr('Validation Error', responseJSON.error);
                    return false;
                }

                showErrorToastr('Oops', 'An error occurred.');
            }
        })
    })
    $('#form-timeline').on('submit', function (e) {
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
                $('#modal-timeline').find('.modal-dialog').LoadingOverlay('show');
            },
            success: (res) => {
                $('#modal-timeline').find('.modal-dialog').LoadingOverlay('hide', true);
                $(this)[0].reset();
                clearErrorMessage();
                table.ajax.reload();
                $('#modal-timeline').modal('hide');
            },
            error: ({ status, responseJSON }) => {
                $('#modal-timeline').find('.modal-dialog').LoadingOverlay('hide', true);

                if (status == 422 && responseJSON.error) {
                    showErrorToastr('Validation Error', responseJSON.error);
                    return false;
                }

                showErrorToastr('Oops', 'An error occurred.');
            }
        })
    })

    $('.btn-tambah').on('click', function () {
        $('#form-timeline')[0].reset();
        clearErrorMessage();
        $('#modal-timeline').modal('show');
    });


    $(document).on('click', '.open-modal', function() {
        var fileUrl = $(this).data('file-url');
        var id = $(this).data('agenda-id');
        var isVerif= $(this).data('verif');

        $('#agendaId').val(id);
        $('#fileFrame').attr('src', fileUrl);
        $('#verif').val(isVerif);
    });


    $(document).on('click', '.btn-verification', function() {
        // Get the value of data-verif attribute from the clicked button
        isVerif = $(this).data('verif');

        // If the value of data-verif is 0, show the reasonInput div
        if (isVerif == 0) {
            $('#reasonInput').show();
        } else {
            $('#reasonInput').hide();
        }
    });

    $('#form-timeline-verif').submit(function(event) {
        event.preventDefault(); // Prevent the default form submission

        var id = $('#agendaId').val();
        var catatanVerif = $('#reason').val();

        // Your PATCH request logic goes here
        $.ajax({
            url: BASE_URL + 'timeline/verifikasi-timeline',
            type: 'PATCH',
            data: {
                id: id,
                is_verif: isVerif,
                catatan: catatanVerif,
            },
            beforeSend: () => {
                clearErrorMessage();
                $('#modal-verif').find('.modal-dialog').LoadingOverlay('show');
            },
            success: (res) => {
                $('#modal-verif').find('.modal-dialog').LoadingOverlay('hide', true);
                $(this)[0].reset();
                clearErrorMessage();
                table.ajax.reload();
                $('#modal-verif').modal('hide');
            },
            error: ({ status, responseJSON }) => {
                $('#modal-verif').find('.modal-dialog').LoadingOverlay('hide', true);

                if (status == 422) {
                    generateErrorMessage(responseJSON);
                    return false;
                }

                showErrorToastr('oops', responseJSON.msg)
            }
        });
    });

    table = $('#table-data').DataTable({
        language: dtLang,
        serverSide: true,
        processing: true,
        ajax: {
            url: BASE_URL + 'timeline/data',
            type: 'get',
            dataType: 'json'
        },
        order: [[7, 'desc']],
        columnDefs: [{
            targets: [0, 6],
            orderable: false,
            searchable: false,
            className: 'text-center align-top'
        }, {
            targets: [1, 2],
            className: 'text-left align-top'
        }, {
            targets: [ 3, 4, 5, 6],
            className: 'text-center align-top'
        }, {
            targets: [7],
            visible: false,
        }],
        columns: [{
            data: 'DT_RowIndex'
        }, {
            data: 'nama_agenda',
        }, {
            data: null,
            render: function(data, type, row) {
                return "Tanggal Mulai : " + data.tanggal_mulai + "<br>" + "Tanggal Selesai : " + data.tanggal_selesai ;
            }
        }, {
            data: 'dokumen',
            render: function(data, type, row) {
                if (type === 'display' && data) {
                    var fileUrl = BASE_URL + 'storage' + data;
                    var labelText, labelColorStyle;

                    switch (row.is_verif) {
                        case 0:
                            labelText = 'Belum Tervalidasi';
                            labelColorStyle = 'color: orange;';
                            break;
                        case 1:
                            labelText = 'Tidak Tervalidasi';
                            labelColorStyle = 'color: red;';
                            break;
                        case 2:
                            labelText = 'Tervalidasi';
                            labelColorStyle = 'color: green;';
                            break;
                        default:
                            labelText = 'Undefined';
                            labelColorStyle = 'color: black;';
                            break;
                    }

                    var labelHtml = '<span style="' + labelColorStyle + '">' + labelText + '</span>';
                    var buttonHtml = '<button type="button" class="btn btn-primary open-modal" data-toggle="modal" data-target="#modal-verif" data-file-url="' + fileUrl + '" data-agenda-id="' + row.id + '" data-verif="' + row.is_verif + '">Lihat Dokumen</button>';

                    return buttonHtml + '<br>' + labelHtml; // Return label and button HTML
                } else {
                    return ''; // Return an empty string if the data is empty or not for display
                }
            }
        }, {
            data: 'catatan',
        }, {
            data: 'koms.name',
        }, {
            data: 'id',
            visible: role_id == 3 ,
            render: (data, type, row) => {
                const button_edit = $('<button>', {
                    class: 'btn btn-primary btn-update',
                    html: '<i class="bx bx-pencil"></i>',
                    'data-id': data,
                    title: 'Update Data',
                    'data-placement': 'top',
                    'data-toggle': 'tooltip'
                });

                const button_delete = $('<button>', {
                    class: 'btn btn-danger btn-delete',
                    html: '<i class="bx bx-trash"></i>',
                    'data-id': data,
                    title: 'Delete Data',
                    'data-placement': 'top',
                    'data-toggle': 'tooltip'
                });

                return $('<div>', {
                    class: 'btn-group',
                    html: () => {
                        let arr = [];

                        if (permissions.update) {
                            arr.push(button_edit)
                        }
                        if (permissions.delete) arr.push(button_delete)

                        return arr;
                    }
                }).prop('outerHTML');
            }
        }, {
            data: 'created_at'
        }]
    })
})
