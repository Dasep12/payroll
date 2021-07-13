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
                            Profile
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
                        <div class="">
                            <label for="nik">Nama</label>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" readonly="" class="form-control" value="<?= $admin->name ?>">
                            </div>
                        </div>

                        <div class="">
                            <label for="nik">Email</label>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" readonly="" value="<?= $admin->email ?>" class="form-control">
                            </div>
                        </div>
                        <div class="">
                            <label for="nik">Level</label>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" readonly="" value="<?= 'Administrator' ?>" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>