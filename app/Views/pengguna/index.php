<?= $this->extend('template') ?>

<?= $this->section('content') ?>

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4">Data Pengguna</h4>

    <div class="card">
        <h5 class="card-header">
            <a href="<?= route_to('pengguna.tambah') ?>" class="btn btn-primary"><i class="bx bx-plus me-1"></i> Tambah Pengguna</a>
        </h5>
        <div class="card-body">

            <?= session()->getFlashdata('pesan'); ?>

            <div class="table-responsive">
                <table class="table table-hover" id="datatable" data-ordering="false">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Level</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pengguna as $row) : ?>
                            <?php $label = $row['aktif'] ? 'Aktif' : 'Nonaktif' ?>
                            <?php $warna = $row['aktif'] ? 'primary' : 'danger' ?>
                            <tr>
                                <td></td>
                                <td><?= $row['nama_lengkap'] ?></td>
                                <td><?= $row['username'] ?></td>
                                <td><?= $row['level'] ?></td>
                                <td><span class="badge bg-label-<?= $warna ?> me-1"><?= $label ?></span></td>
                                <td>
                                    <form action="<?= route_to('pengguna.hapus', $row['id']) ?>" method="POST">
                                        <?= csrf_field() ?>

                                        <a href="<?= route_to('pengguna.ubah', $row['id']) ?>" class="btn btn-success btn-sm" title="Ubah"><i class="bx bx-pencil me-1"></i> Ubah</a>
                                        <?php if (session()->get('username') != $row['username']) : ?>
                                            <button class="btn btn-danger btn-sm delete-confirm" type="submit" title="Hapus"><i class="bx bx-trash me-1"></i> Hapus</button>
                                        <?php endif ?>

                                    </form>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="resetModal" tabindex="-1" aria-labelledby="resetModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="resetModalLabel">Reset Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="resetForm">
                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label" for="password">Password Baru <span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="password" name="password" value="<?= old('password') ?>" required />
                        </div>
                    </div>
                    <input type="hidden" id="id" name="id">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" onclick="reset()">Reset Password</button>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script src="//cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script>
    $(document).ready(function() {
        $('#datatable').on('click', '.delete-confirm', function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                    title: "Konfirmasi",
                    text: "Anda yakin data ini mau dihapus?",
                    icon: "warning",
                    buttons: ['Batal', 'Hapus'],
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
        });

        $('#resetModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var nama = button.data('nama');
            $('#id').val(id);
            $('#resetModalLabel').text('Reset Password ' + nama);
        });
    });

    function reset() {
        var password = $('#password').val();
        var id = $('#id').val();

        $.ajax({
            url: '<?= route_to('pengguna.reset') ?>',
            type: 'post',
            data: {
                password: password,
                id: id,
            },
            success: function(response) {
                location.reload();
            }
        });
    }
</script>
<?= $this->endSection() ?>