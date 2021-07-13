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
                <?php }  ?>
                <div class="card">
                    <div class="header">
                        <h2>
                            Generate Slip Gaji Karyawan
                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <form method="post" action="<?= base_url('CreateSlip/create') ?>">
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
                                    <button type="submit" href="" class="btn btn-danger ">Generate Slip Gaji</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Horizontal Layout -->
    </div>
</section>