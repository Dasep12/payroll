<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>
                <?= date('H : i : s') ?>
                <small><a href="#"> <?= $hari ?></a></small>
            </h2>
        </div>
        <div class="form-group">
            <button type="button" class="btn btn-danger waves-effect m-r-20" data-toggle="modal" data-target="#defaultModal">TAMBAH JOBCLASS</button>
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
                            Jobclass
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
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID Jobclass</th>
                                        <th>Jobclass</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($job as $j) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $j->idjobclass ?></td>
                                            <td><?= $j->jobclass ?></td>
                                            <td>
                                                <button type="button" data-toggle="modal" data-target="#editModal" class="btn btn-info pilih waves-effect m-r-20" data-id="<?= $j->id ?>" data-jobclass="<?= $j->jobclass ?>" data-idjobclass="<?= $j->idjobclass ?>">detail
                                                </button>
                                                <a onclick="return confirm('Yakin Hapus ?')" class="btn btn-danger" href="<?= base_url('Jobclass/delete/' . $j->id) ?>">delete</a>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- modal tambah jobclass-->
<div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">Tambah Jobclass</h4>
            </div>
            <div class="modal-body">
                <form action="#" method="post" id="idJobAdd">
                    <div class="form-group">
                        <div class="form-line">
                            <label>ID Jobclass</label>
                            <input type="text" id="idjobclass" name="idjobclass" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-line">
                            <label>Jobclass</label>
                            <input type="text" id="jobclass" name="jobclass" class="form-control" />
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary waves-effect">SAVE</button>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- end of modal -->

<!-- modal edit jobclass-->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">Edit Jobclass</h4>
            </div>
            <div class="modal-body">
                <form action="#" method="post" id="idJobUpdate">
                    <div class="form-group">
                        <div class="form-line">
                            <label>ID Jobclass</label>
                            <input type="hidden" name="id" id="id">
                            <input type="text" id="idjobclass1" name="idjobclass1" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-line">
                            <label>Jobclass</label>
                            <input type="text" id="jobclass1" name="jobclass1" class="form-control" />
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary waves-effect">UPDATE</button>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- end of modal -->

<script>
    $(function() {
        $("#idJobAdd").on('submit', function(e) {
            e.preventDefault();
            if (document.getElementById('idjobclass').value == "") {
                alert('kosong idjobclass')
            } else if (document.getElementById('jobclass').value == "") {
                alert('kosong jobclass')
            } else {
                $.ajax({
                    url: "<?= base_url('Jobclass/input') ?>",
                    data: new FormData(this),
                    method: "POST",
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(e) {
                        alert(e);
                        window.location.href = "<?= base_url('Jobclass') ?>"
                    }
                })
            }
        })


        $("#idJobUpdate").on('submit', function(e) {
            e.preventDefault();
            if (document.getElementById('idjobclass1').value == "") {
                alert('kosong idjobclass')
            } else if (document.getElementById('jobclass1').value == "") {
                alert('kosong jobclass')
            } else {
                $.ajax({
                    url: "<?= base_url('Jobclass/update') ?>",
                    data: new FormData(this),
                    method: "POST",
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(e) {
                        alert(e);
                        window.location.href = "<?= base_url('Jobclass') ?>"
                    }
                })
            }
        })
    })

    $(document).on('click', '.pilih', function(e) {
        var jobclass, id, idjobclass;
        id = $(this).attr('data-id');
        idjobclass = $(this).attr('data-idjobclass');
        jobclass = $(this).attr('data-jobclass');
        document.getElementById("jobclass1").value = jobclass;
        document.getElementById("idjobclass1").value = idjobclass;
        document.getElementById("id").value = id;
        $('#editModal').modal('hide');
    });
</script>