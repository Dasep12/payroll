<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>
                <?= date('H : i : s') ?>
                <small><a href="#"> <?= $hari ?></a></small>
            </h2>
        </div>
        <!-- Basic Examples -->
        <div class="row clearfix">

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <?php if ($this->session->flashdata('ok')) { ?>
                    <div class="alert bg-teal alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <?= $this->session->flashdata('ok') ?>
                    </div>
                <?php } ?>
                <div class="card">
                    <div class="header">
                        <h2>
                            Master Administrator
                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <div class="form-group">
                                <button type="button" class="btn btn-danger   waves-effect m-r-20" data-toggle="modal" data-target="#defaultModal"><i class="material-icons">add</i> <span class="icon-name">Tambah Administator</span></button>
                            </div>
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($admin as $r) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $r->name ?> </td>
                                            <td><?= $r->email ?> </td>
                                            <td>
                                                <button type="button" data-toggle="modal" data-target="#defaultModal2" class="btn btn-success pilih waves-effect m-r-20" data-nama="<?= $r->name ?>" data-id="<?= $r->id ?>">Edit
                                                </button>
                                                <a class="btn btn-danger" href="<?= base_url('Administrator/delete/' . $r->id) ?>" onclick="return confirm('Yakin Hapus ?')">delete</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- modal edit -->
    <div class="modal fade" id="defaultModal2" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">Edit Administrator</h4>
                </div>
                <div class="modal-body">
                    <div class="">
                        <form action="#" method="post" id="edit">
                            <div class=" form-group">
                                <label>Nama</label>
                                <div class="form-line">
                                    <input type="hidden" id="id" name="id">
                                    <input type="text" id="nama2" name="nama2" class="form-control">
                                </div>

                                <label>Email</label>
                                <div class="form-line">
                                    <input type="email" id="email2" name="email2" class="form-control">
                                </div>

                                <label>New Password</label>
                                <div class="form-line">
                                    <input type="password" id="password2" name="password2" class="form-control">
                                </div>

                                <br>
                                <button type="submit" name="submit2" class="btn btn-danger">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end of edit modal -->
</section>



<!-- modal tambah -->
<div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">Tambah Administrator</h4>
            </div>
            <div class="modal-body">
                <div class="">
                    <form action="#" method="post" id="add">
                        <div class="form-group">
                            <label>Nama</label>
                            <div class="form-line">
                                <input type="text" id="nama" name="nama" class="form-control">
                            </div>

                            <label>Email</label>
                            <div class="form-line">
                                <input type="email" id="email" name="email" class="form-control">
                            </div>

                            <label>Password</label>
                            <div class="form-line">
                                <input type="password" id="password" name="password" class="form-control">
                            </div>

                            <br>
                            <button type="submit" name="submit" class="btn btn-danger">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end of modal -->


    <script>
        $(document).on('click', '.pilih', function(e) {
            var id, nama;
            nama = $(this).attr('data-nama');
            id = $(this).attr('data-id');
            document.getElementById("nama2").value = nama;
            document.getElementById("id").value = id;
            $('#defaultModal2').modal('hide');
            //alert("tes")
        });

        $(function() {
            $("#add").on('submit', function(e) {

                e.preventDefault();
                if ($("#nama").val() == "") {
                    alert('nama kosong')
                } else if ($("#password").val() == "") {
                    alert('password kosong')
                } else if ($("#email").val() == "") {
                    alert('email kosong')
                } else {
                    $.ajax({
                        url: "<?= base_url('Administrator/input') ?>",
                        method: "post",
                        cache: false,
                        data: new FormData(this),
                        contentType: false,
                        processData: false,
                        success: function(e) {
                            alert(e);
                            window.location.href = "<?= base_url('Administrator') ?>";
                        }
                    })
                }
            })

            $("#edit").on('submit', function(e) {
                e.preventDefault();
                if ($("#nama2").val() == "") {
                    alert('nama kosong')
                } else if ($("#email2").val() == "") {
                    alert('email kosong')
                } else {
                    $.ajax({
                        url: "<?= base_url('Administrator/update') ?>",
                        method: "post",
                        cache: false,
                        data: new FormData(this),
                        contentType: false,
                        processData: false,
                        success: function(e) {
                            //console.log(e);
                            alert(e);
                            window.location.href = "<?= base_url('Administrator') ?>";
                        }
                    })
                }
            })

        })
    </script>