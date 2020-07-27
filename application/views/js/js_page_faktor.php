<script>
    $(document).ready(function() {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            onBeforeOpen: () => {
                $('#ModalForm').modal('hide');
                $('#dtTable').DataTable().ajax.reload();
            }
        });
 
        var table = $("#dtTable").dataTable({
            ajax: {
                "url": "<?= base_url('nilai_gap/list_data') ?>", 
                "type": "POST"
            },
            paging: false,
            info: false,
            searching: false,
            ordering: false
        });
    });
</script>