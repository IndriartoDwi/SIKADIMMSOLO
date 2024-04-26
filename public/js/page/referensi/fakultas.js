let table;
$(() => {
    $('#table-data').on('click', '.btn-delete', function () {
        let data = table.row($(this).closest('tr')).data();

        let { id, fakultas } = data;

        Swal.fire({
            title: 'Anda yakin?',
            html: `Anda akan menghapus fakultas "<b>${fakultas}</b>"!`,
            footer: 'Data yang sudah dihapus tidak bisa dikembalikan kembali!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                $.post(BASE_URL + 'fakultas/delete', {
                    id,
                    _method: 'DELETE'
                }).done((res) => {
                    showSuccessToastr('sukses', 'Pengguna berhasil dihapus');
                    table.ajax.reload();
                }).fail((res) => {
                    let { status, responseJSON } = res;
                    showErrorToastr('oops', responseJSON.message);
                })
            }
        })
    })

    $('#form-fakultas-update').on('submit', function (e) {
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
                $('#modal-fakultas-update').find('.modal-dialog').LoadingOverlay('show');
            },
            success: (res) => {
                $('#modal-fakultas-update').find('.modal-dialog').LoadingOverlay('hide', true);
                $(this)[0].reset();
                clearErrorMessage();
                table.ajax.reload();
                $('#modal-fakultas-update').modal('hide');
            },
            error: ({ status, responseJSON }) => {
                $('#modal-fakultas-update').find('.modal-dialog').LoadingOverlay('hide', true);

                if (status == 422) {
                    generateErrorMessage(responseJSON, true);
                    return false;
                }

                showErrorToastr('oops', responseJSON.msg)
            }
        })
    })

    $('#table-data').on('click', '.btn-update', function () {
        var tr = $(this).closest('tr');
        var data = table.row(tr).data();
        var id_ubah = data.id;

        load_edit_form(id_ubah);
        $('#id_kategori').val(data.id_kategori).trigger('change');
    })

    function load_edit_form(id_ubah) {

        var token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: BASE_URL + 'fakultas/show_edit_form',
            type: 'get',
            data: {
                id_ubah: id_ubah,
            },
            success: function(response) {
                window.location.href = BASE_URL + 'fakultas/show_edit_form?id_ubah=' + id_ubah;

            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }
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
                table.ajax.reload();
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

    $('.btn-tambah').on('click', function () {
        $('#form-fakultas')[0].reset();
        clearErrorMessage();
        $('#modal-fakultas').modal('show');
    });

    table = $('#table-data').DataTable({
        language: dtLang,
        serverSide: true,
        processing: true,
        ajax: {
            url: BASE_URL + 'fakultas/data',
            type: 'get',
            dataType: 'json'
        },
        order: [[1, 'desc']],
        columnDefs: [{
            targets: [0, 1],
            orderable: false,
            searchable: false,
            className: 'text-center align-top'
        }, {
            targets: [1],
            className: 'text-left align-top'
        }, {
            targets: [4],
            visible: false,
        }],
        columns: [{
            data: 'DT_RowIndex'
        }, {
            data: 'kampus',
            render: function(data, type, row) {
                // Check if 'kampus' data is available
                if (data && data.length > 0) {
                    // Map the 'kampus' array to get an array of kampus names
                    var kampusNames = data.map(function(kampus) {
                        return kampus.kampus;
                    });
                    // Join the kampus names using a delimiter (comma, for example)
                    return kampusNames.join(', ');
                } else {
                    // If 'kampus' data is not available, return an empty string
                    return '';
                }
            }
        }, {
            data: 'fakultas',
        }, {
            data: 'id',
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

                const button_reset_password = $('<button>', {
                    class: 'btn btn-secondary btn-reset-password',
                    html: '<i class="bx bx-key"></i>',
                    'data-id': data,
                    title: 'Reset Password',
                    'data-placement': 'top',
                    'data-toggle': 'tooltip'
                });

                const button_update_role = $('<button>', {
                    class: 'btn btn-success btn-update-role',
                    html: '<i class="bx bx-user"></i>',
                    'data-id': data,
                    title: 'Peran Pengguna',
                    'data-placement': 'top',
                    'data-toggle': 'tooltip'
                });

                return $('<div>', {
                    class: 'btn-group',
                    html: () => {
                        let arr = [];

                        if (permissions.update) {
                            // arr.push(button_update_role)
                            // arr.push(button_reset_password)
                            arr.push(button_edit)
                        }
                        // if (UPDATE) arr.push(button_edit)
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
