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
                <?php } else if ($this->session->flashdata('info')) { ?>
                    <div class="alert bg-teal alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <?= $this->session->flashdata('info') ?>
                    </div>
                <?php } ?>
                <div class="card">
                    <div class="header">
                        <h2>
                            Slip Gaji Karyawan
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
                            <form method="post" action="<?= base_url('Send_mail/send') ?>">
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="nik">Tanggal Gajian</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line" id="bs_datepicker_container">
                                                <input type="text" name="tgl" autocomplete="off" id="tanggal" class="form-control" placeholder="format date :mm-dd-yyyy">
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-danger ">Kirim Slip Ke Semua Karyawan Slip Gaji</button>
                                    </div>
                                </div>
                            </form>

                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIK</th>
                                        <th>Filename</th>
                                        <th>Email</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $dir = "./assets/slip/";
                                    $dh   = opendir($dir) or die('error');
                                    while (($f = readdir($dh)) !== false) {
                                        if (is_file($dir . $f)) {
                                            $a = explode("_", $f);
                                            $b  = explode(".", $a[2]);
                                    ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $b[0] ?></td>
                                                <td><a href="<?= $dir . $f ?>" target="_blank"><?= $f ?></a></td>
                                                <td>
                                                    <?php $p = $this->m_payroll->ambilEmail($b[0])->row();
                                                    echo $p->email;
                                                    ?>
                                                </td>
                                                <td><a href="" class="btn btn-info btn-xs">re-send</a></td>
                                            </tr>
                                    <?php }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Basic Examples -->
    </div>
</section>