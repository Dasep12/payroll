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
                            Setting Gaji Karyawan
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
                                    <input type="hidden" id="iduser" name="iduser">
                                    <input type="text" readonly="" id="nik" name="nik" class="form-control">
                                </div>
                            </div>

                            <div class="">
                                <label for="nik">Nama Karyawan</label>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" readonly="" id="nama" name="nama" class="form-control">
                                </div>
                            </div>

                            <div class="">
                                <label for="nik">Jobclass</label>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" readonly="" id="jobclass" name="jobclass" class="form-control">
                                </div>
                            </div>

                            <div class="">
                                <label for="nik">Gaji Pokok</label>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="gaji_pokok" name="gaji_pokok" class="form-control">
                                </div>
                            </div>

                            <div class="">
                                <label for="nik">Tunjangan 1</label>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="tunjangan1" name="tunjangan1" class="form-control">
                                </div>
                            </div>

                            <div class="">
                                <label for="nik">Tunjangan 2</label>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="tunjangan2" name="tunjangan2" class="form-control">
                                </div>
                            </div>

                            <div class="">
                                <label for="nik">Tunjangan 3</label>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="tunjangan3" name="tunjangan3" class="form-control">
                                </div>
                            </div>

                            <div class="">
                                <label for="nik">BPJS Kesehatan</label>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="bpjs_kes" name="bpjs_kesehatan" class="form-control">
                                </div>
                            </div>

                            <div class="">
                                <label for="nik">BPJS Ketenagakerjaan</label>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="bpjs_tenagakerja" name="bpjs_tenagakerja" class="form-control">
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


<!-- modal tambah jobclass-->
<div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">Pilih Karyawan</h4>
            </div>
            <div class="modal-body">
                <div class="">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                            <tr>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Jobclass</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($karyawan as $r) : ?>
                                <tr>
                                    <td><?= $r->nik ?></td>
                                    <td><?= $r->nama ?></td>
                                    <td><?= $r->jobclass ?></td>
                                    <td>
                                        <button type="button" class="btn btn-danger pilih waves-effect m-r-20" data-jobclass="<?= $r->jobclass ?>" data-nama="<?= $r->nama ?>" data-iduser="<?= $r->id_user ?>" data-nik="<?= $r->nik ?> "><i class="material-icons">done</i> <span class="icon-name">PILIH KARYAWAN</span>
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- end of modal -->

    <script type="text/javascript">
        //            jika dipilih, nim akan masuk ke input dan modal di tutup
        $(document).on('click', '.pilih', function(e) {
            var nama, iduser, nik;
            nik = $(this).attr('data-nik');
            nama = $(this).attr('data-nama');
            iduser = $(this).attr('data-iduser');
            jobclass = $(this).attr('data-jobclass');

            document.getElementById('nama').value = nama;
            document.getElementById('nik').value = nik;
            document.getElementById('iduser').value = iduser;
            document.getElementById('jobclass').value = jobclass;
            $('#defaultModal').modal('hide');
            //alert("tes")
        });

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
                } else if (document.getElementById('tunjangan3').value == "") {
                    alert('tunjangan 3 masih kosong')
                } else if (document.getElementById('bpjs_kes').value == "") {
                    alert('nilai bpjs kesehatan masih kosong')
                } else if (document.getElementById('bpjs_tenagakerja').value == "") {
                    alert('nilai bpjs tenaga kerja masih kosong')
                } else {
                    $.ajax({
                        url: "<?= base_url('Setting_gaji/input') ?>",
                        data: new FormData(this),
                        method: "POST",
                        cache: false,
                        processData: false,
                        contentType: false,
                        success: function(e) {
                            alert(e);
                            window.location.href = "<?= base_url('Setting_gaji') ?>"
                        }
                    })
                }
            })
        });
    </script>