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
                <div class="card">
                    <div class="header">
                        <h2>
                            Histori Gaji Karyawan
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

                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
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
                                        <th>LEMBUR</th>
                                        <th>TANGGAL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($histori as $row) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $row->noref ?></td>
                                            <td><?= $row->nama ?></td>
                                            <td><?= $row->nik ?></td>
                                            <td><?= $row->jobclass ?></td>
                                            <td><?= $row->gajipokok ?></td>
                                            <td><?= $row->tunjangan1 ?></td>
                                            <td><?= $row->tunjangan2 ?></td>
                                            <td><?= $row->tunjangan3 ?></td>
                                            <td><?= $row->lembur ?></td>
                                            <td><?= $row->tanggal ?></td>
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
    </div>
</section>


<script type="text/javascript">
    $(function() {
        $("#dataTables").dataTable();
        $("#dataTables2").dataTable();
    });
</script>