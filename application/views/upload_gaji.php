<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>
                <?= date('H : i : s') ?>
                <small><a href="#"> <?= $hari ?></a></small>
            </h2>
        </div>
        <!-- Basic Examples -->
        <!-- Horizontal Layout -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <?php if ($this->session->flashdata('success')) { ?>
                    <div class="alert bg-teal alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <?= $this->session->flashdata('success') ?>
                    </div>
                <?php } else if ($this->session->flashdata('error')) { ?>
                    <div class="alert bg-red alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <?= $this->session->flashdata('error') ?>
                    </div>
                <?php } ?>
                <div class="card">
                    <div class="header">
                        <h2>
                            FORM UPLOAD GAJI KARYAWAN
                        </h2>
                        <ul class="header-dropdown m-r--5">

                        </ul>
                    </div>
                    <div class="body">
                        <form onsubmit="return cek()" action="<?= base_url('Upload_gaji') ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <div class="row clearfix">
                                <div class="col-lg-2 form-control-label">
                                    <label for="email_address_2">Drop File di sini</label>
                                </div>
                                <div class="col-lg-10">
                                    <input type="file" class="form-control" accept=".xlsx" id="file" name="file">
                                    <a href="<?= base_url('Upload_gaji/format') ?>" class="btn btn-success m-t-15 waves-effect">Download Format</a>
                                    <button type="submit" name="submit" class="btn btn-primary m-t-15 waves-effect">Preview</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php if (isset($_POST['submit'])) { ?>
            <!-- tampilkan review gaji yang di upload-->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                UPLOAD GAJI KARYAWAN
                            </h2>
                            <ul class="header-dropdown m-r--5">

                            </ul>
                        </div>
                        <div class="body">
                            <form method="post" action="<?= base_url('Upload_gaji/post') ?>">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>NOREF</th>
                                                <th>NAMA</th>
                                                <th>NIK</th>
                                                <th>JOBCLASS</th>
                                                <th>GAJI POKOK</th>
                                                <th>TUNJANGAN 1</th>
                                                <th>TUNJANGAN 2</th>
                                                <th>TUNJANGAN 3</th>
                                                <th>BPJS KESEHATAN</th>
                                                <th>BPJS KETENAGAKERJAAN</th>
                                                <th>LEMBUR</th>
                                                <th>TANGGAL</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($sheet as $row) : ?>
                                                <tr>
                                                    <td><?= $row['A'] ?></td>
                                                    <td><?= $row['C'] ?></td>
                                                    <td><?= $row['D'] ?></td>
                                                    <td><?= $row['E'] ?></td>
                                                    <td><?= $row['H'] ?></td>
                                                    <td><?= $row['I'] ?></td>
                                                    <td><?= $row['J'] ?></td>
                                                    <td><?= $row['K'] ?></td>
                                                    <td><?= $row['L'] ?></td>
                                                    <td><?= $row['M'] ?></td>
                                                    <td><?= $row['N'] ?></td>
                                                    <td><?= $row['O'] ?></td>
                                                    <td><?= $row['P'] ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <br>
                                <div class="form-group mt-2">
                                    <button class="btn btn-danger mt-2">upload gaji</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <!-- #END#  -->
<?php } ?>
</div>
</section>

<script>
    function cek() {
        if (document.getElementById('file').value == "") {
            alert('file kosong');
            return false;
        }
        return;
    }
</script>