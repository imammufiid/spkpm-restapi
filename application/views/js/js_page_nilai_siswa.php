<script>
    $(document).ready(function() {
        <?php if($this->session->userdata('level')=="Siswa") : ?>
            setTimeout(function(){ 
                var elems = document.querySelectorAll('[id^="edit"]');
                for (var i = 0; i < elems.length; i++) { elems[i].disabled = true;  }
                var elems1 = document.querySelectorAll('[id^="hapus"]');
                for (var i = 0; i < elems1.length; i++) { elems1[i].disabled = true;  }
            }, 1000);
        <?php endif ?>

        $("#user_id").select2({
			placeholder: "-- PILIH USER --",
            theme: 'bootstrap4'
        });

        $.ajax({
			type: "GET",
			url: "<?= base_url('pengguna/options_user/') ?>",
			success: function(data){
				var opts = $.parseJSON(data);
				$.each(opts, function(i, d) {
					$("#user_id").append('<option value="'+d.id+'">'+d.nis+' - '+d.text+'</option>');
				});
			}
        });

        $("#subkriteria_id").select2({
			placeholder: "-- PILIH SUBKRITERIA --",
            theme: 'bootstrap4'
        });

        $.ajax({
			type: "GET",
			url: "<?= base_url('subkriteria/options/') ?>",
			success: function(data){
				var opts = $.parseJSON(data);
				$.each(opts, function(i, d) {
					$("#subkriteria_id").append('<option value="'+d.id+'">'+d.text+'</option>');
				});
			}
        });

        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            onBeforeOpen: () => {
                $('#ModalForm').modal('hide');
                $('#dtTable').DataTable().ajax.reload(null,false);
            }
        });
        $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
        {
            return {
                "iStart": oSettings._iDisplayStart,
                "iEnd": oSettings.fnDisplayEnd(),
                "iLength": oSettings._iDisplayLength,
                "iTotal": oSettings.fnRecordsTotal(),
                "iFilteredTotal": oSettings.fnRecordsDisplay(),
                "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
            };
        };
 
        var table = $("#dtTable").dataTable({
            initComplete: function() {
                var api = this.api();
                $('#dtTable_filter input').off('.DT').on('input.DT', function() { api.search(this.value).draw(); });
            },
            oLanguage: {
                sProcessing: "loading..."
            },
            processing: true,
            serverSide: true,
            ajax: {
                "url": "<?= base_url('nilai_siswa/list_data') ?>", 
                "type": "POST"
            },
            responsive: true,
            pageLength: 5,
            columns: [
                // {"data": "no", render: function (data, type, row, meta) { return meta.row + meta.settings._iDisplayStart + 1; }},
                {"data": "user_nama"},
                {"data": "subkriteria_nama"},
                {"data": "siswa_nilai"},
                {"data": "view"}
            ],
            order: [[0, 'asc']],
            ordering: false,
            rowCallback: function(row, data, iDisplayIndex) {
                var info = this.fnPagingInfo();
                var page = info.iPage;
                var length = info.iLength;
                $('td:eq(0)', row).html();
            }
        });

        $("#Frm").submit(function(e) {
            event.preventDefault();
            Pace.track(function() {
                jQuery.ajax({
                    type: "POST",
                    url: "<?= base_url('nilai_siswa/simpan/') ?>",
                    data: $("#Frm").serialize(),
                    success: function(response) {
                        var data = JSON.parse(response);
                        Toast.fire({
                            type: data.kode,
                            title: data.pesan
                        });
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        Toast.fire({
                            type: 'error',
                            title: 'Terjadi kesalahan! kode : ' + xhr.status + ', ' + thrownError + '. Silahkan periksa kembali form isian!'
                        });
                    }
                });
            });
        });

        $(document).on('click', '#edit', function() {
            $('#ModalForm').modal({backdrop: 'static', keyboard: false})  
            jQuery.ajax({
                type: "POST",
                url: "<?= base_url('nilai_siswa/get_data/') ?>",
                dataType: 'json',
                data: {
                    nilai_id: $(this).attr("data")
                },
                success: function(data) {
                    $.each(data, function(key, value) {
                        var ctrl = $('[name=' + key + ']', $('#Frm'));
                        switch (ctrl.prop("type")) {
                            case "select-one":
                                ctrl.val(value).change();
                                break;
                            default:
                                ctrl.val(value);
                        }
                    });
                }
            });
        });

        $(document).on('click', '#hapus', function() {
            Swal.fire({
                title: 'Apakah Anda Yakin Ingin Menghapus Data Ini?',
                text: 'Harap di perhatikan, data yang anda hapus tidak dapat di kembalikan!',
                type: 'question',
                showCloseButton: true,
                confirmButtonText: 'Ya, Saya Yakin!',
                allowOutsideClick: false,
                allowEscapeKey: false
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        type: "POST",
                        url: "<?= base_url('nilai_siswa/hapus/') ?>",
                        data: {
                            nilai_id: $(this).attr("data")
                        },
                        success: function(response) {
                            var data = JSON.parse(response);
                            Toast.fire({
                                type: data.kode,
                                title: data.pesan
                            });
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            Toast.fire({
                                type: 'error',
                                title: 'Terjadi kesalahan! kode : ' + xhr.status + ', ' + thrownError + '. Silahkan tanyakan kepada support!'
                            });
                        }
                    })
                } else {
                    Toast.fire({
                        type: 'warning',
                        title: 'Hapus data di batalkan'
                    });
                }
            })
        });
    });
</script>