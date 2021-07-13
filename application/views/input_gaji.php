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
                            Input Gaji Karyawan
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
                        <form action="#" id="inputGaji" method="post">
                            <div class="">
                                <label for="email_address_2">Noref</label>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" readonly="" id="noref" name="noref" class="form-control" placeholder="noref terisi otomatis">
                                    <input type="hidden" id="iduser" name="iduser" class="form-control">
                                </div>
                            </div>

                            <div class="">
                                <label for="nik">NIK</label>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" readonly="" id="nik" name="nik" class="form-control" placeholder="nik terisi otomatis">
                                </div>
                            </div>

                            <div class="">
                                <label for="nik">Nama Karyawan</label>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" readonly="" id="nama" name="nama" class="form-control" placeholder="nama terisi otomatis">
                                </div>
                            </div>

                            <div class="">
                                <label for="email">Email</label>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" readonly="" id="email" name="email" class="form-control" placeholder="email terisi otomatis">
                                </div>
                            </div>

                            <div class="">
                                <label for="nik">Jobclass</label>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" readonly="" id="jobclass" name="jobclass" class="form-control" placeholder="jobclass terisi otomatis">
                                </div>
                            </div>

                            <div class="">
                                <label for="nik">NPWP</label>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" readonly="" id="npwp" name="npwp" class="form-control" placeholder="npwp terisi otomatis">
                                </div>
                            </div>

                            <div class="">
                                <label for="nik">Gaji Pokok</label>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" readonly="" id="gaji_pokok" name="gaji_pokok" class="form-control" placeholder="gaji pokok terisi otomatis">
                                </div>
                            </div>

                            <div class="">
                                <label for="nik">Tunjangan 1</label>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" readonly="" id="tunjangan1" name="tunjangan1" class="form-control" placeholder="tunjangan terisi otomatis">
                                </div>
                            </div>

                            <div class="">
                                <label for="nik">Tunjangan 2</label>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" readonly="" id="tunjangan2" name="tunjangan2" class="form-control" placeholder="tunjangan terisi otomatis">
                                </div>
                            </div>

                            <div class="">
                                <label for="nik">Tunjangan 3</label>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" readonly="" id="tunjangan3" name="tunjangan3" class="form-control" placeholder="tunjangan terisi otomatis">
                                </div>
                            </div>
                            <div class="">
                                <label for="nik">BPJS Kesehatan</label>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" readonly="" id="bpjs_kesehatan" name="bpjs_kesehatan" class="form-control" placeholder="nilai bpjs terisi otomatis">
                                </div>
                            </div>
                            <div class="">
                                <label for="nik">BPJS Ketenagakerjaan</label>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" readonly="" id="bpjs_tenagakerja" name="bpjs_tenagakerja" class="form-control" placeholder="nilai bpjs terisi otomatis">
                                </div>
                            </div>
                            <div class="">
                                <label for="nik">Total Lembur</label>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="lembur" name="lembur" class="form-control" placeholder="isi jika ada">
                                </div>
                            </div>

                            <h2 class="card-inside-title">Tanggal Gajian</h2>
                            <div class="form-group">
                                <div class="form-line" id="bs_datepicker_container">
                                    <input type="text" name="tanggal" autocomplete="off" id="tanggal" class="form-control" placeholder="Please choose a date...">
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
                                        <button type="button" class="btn btn-danger pilih waves-effect m-r-20" data-noref="<?= date('dmy') . $r->nik . "PYRL" ?> " data-jobclass="<?= $r->jobclass ?>" data-nik="<?= $r->nik ?>" data-nama="<?= $r->nama ?>" data-gapok="<?= $r->gaji_pokok ?>" data-tunjangan1="<?= $r->tunjangan1 ?>" data-tunjangan2="<?= $r->tunjangan2 ?>" data-tunjangan3="<?= $r->tunjangan3 ?>" data-iduser="<?= $r->id_user ?>" data-bpjskes="<?= $r->bpjs_kesehatan  ?>" data-email="<?= $r->email ?>" data-bpjstk="<?= $r->bpjs_tenagakerja ?>" data-npwp="<?= $r->npwp ?>"><i class="material-icons">done</i> <span class="icon-name">PILIH KARYAWAN</span>
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
            var noref, nik, nama, gapok, tunjangan1, tunjangan2, tunjangan3, jobclass, iduser, email, npwp;
            nik = $(this).attr('data-nik');
            iduser = $(this).attr('data-iduser');
            nama = $(this).attr('data-nama');
            email = $(this).attr('data-email');
            npwp = $(this).attr('data-npwp');
            gapok = $(this).attr('data-gapok');
            jobclass = $(this).attr('data-jobclass');
            tunjangan1 = $(this).attr('data-tunjangan1');
            tunjangan2 = $(this).attr('data-tunjangan2');
            tunjangan3 = $(this).attr('data-tunjangan3');
            var bpjs_kes = $(this).attr('data-bpjskes');
            var bpjs_tk = $(this).attr('data-bpjstk');
            document.getElementById("noref").value = $(this).attr('data-noref');
            document.getElementById("nik").value = nik;
            document.getElementById("iduser").value = iduser;
            document.getElementById("nama").value = nama;
            document.getElementById("email").value = email;
            document.getElementById("jobclass").value = jobclass;
            document.getElementById("gaji_pokok").value = gapok;
            document.getElementById("tunjangan1").value = tunjangan1;
            document.getElementById("tunjangan2").value = tunjangan2;
            document.getElementById("tunjangan3").value = tunjangan3;
            document.getElementById("bpjs_kesehatan").value = bpjs_kes;
            document.getElementById("bpjs_tenagakerja").value = bpjs_tk;
            document.getElementById("npwp").value = npwp;
            $('#defaultModal').modal('hide');
            //alert("tes")
        });

        $(function() {
            $("#dataTables").dataTable();
            $("#dataTables2").dataTable();

            $("#inputGaji").on('submit', function(e) {
                e.preventDefault();
                if (document.getElementById('noref').value == "") {
                    alert('data kosong')
                } else if (document.getElementById('tanggal').value == "") {
                    alert('tanggal kosong')
                } else {
                    $.ajax({
                        url: "<?= base_url('Input_gaji/input') ?>",
                        data: new FormData(this),
                        method: "POST",
                        cache: false,
                        processData: false,
                        contentType: false,
                        success: function(e) {
                            alert(e);
                            window.location.href = "<?= base_url('Input_gaji') ?>";
                        }
                    })
                }
            })
        });
    </script>