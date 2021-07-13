<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>
                <?= date('H : i : s') ?>
                <small><a href="#"> <?= $hari ?></a></small>
            </h2>
        </div>
        <div class="form-group">
            <button type="button" class="btn btn-danger   waves-effect m-r-20" data-toggle="modal" data-target="#defaultModal"><i class="material-icons">search</i> <span class="icon-name">CARI KARYAWAN</span></button>
        </div>
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Edit Gaji Karyawan
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
                        <form action="#" id="settingGaji" method="post">
                            <div class="">
                                <label for="nik">NIK</label>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="hidden" value="<?= $data->id ?>" id="id" name="id">
                                    <input type="text" value="<?= $data->nik ?>" readonly="" id="nik" name="nik" class="form-control">
                                </div>
                            </div>

                            <div class="">
                                <label for="nik">Nama Karyawan</label>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" readonly="" value="<?= $data->nama ?>" id="nama" name="nama" class="form-control">
                                </div>
                            </div>

                            <div class="">
                                <label for="nik">Gaji Pokok</label>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" value="<?= $data->gaji_pokok ?>" id="gaji_pokok" name="gaji_pokok" class="form-control">
                                </div>
                            </div>

                            <div class="">
                                <label for="nik">Tunjangan 1</label>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" value="<?= $data->tunjangan1 ?>" id="tunjangan1" name="tunjangan1" class="form-control">
                                </div>
                            </div>

                            <div class="">
                                <label for="nik">Tunjangan 2</label>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" value="<?= $data->tunjangan2 ?>" id="tunjangan2" name="tunjangan2" class="form-control">
                                </div>
                            </div>

                            <div class="">
                                <label for="nik">Tunjangan 3</label>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" value="<?= $data->tunjangan3 ?>" id="tunjangan3" name="tunjangan3" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" name="submit" id="submit" class="btn btn-info">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>


<script type="text/javascript">
    $(function() {
        $("#dataTables").dataTable();
        $("#dataTables2").dataTable();

        $("#settingGaji").on('submit', function(e) {
            e.preventDefault();
            if (document.getElementById('nama').value == "") {
                alert('nama masih kosong')
            } else if (document.getElementById('gaji_pokok').value == "") {
                alert('gaji karyawan belum di setting');
            } else if (document.getElementById('tunjangan1').value == "") {
                alert('tunjangan ke-1 belum di setting')
            } else if (document.getElementById('tunjangan2').value == "") {
                alert('tunjangan 2 masih kosong')
            } else {
                $.ajax({
                    url: "<?= base_url('Tabel_gaji/update') ?>",
                    data: new FormData(this),
                    method: "POST",
                    cache: false,
                    processData: false,
                    contentType: false,
                    success: function(e) {
                        alert(e);
                        window.location.href = "<?= base_url('Tabel_gaji') ?>"
                    }
                })
            }
        })
    });
</script>