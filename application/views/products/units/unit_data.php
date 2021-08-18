<!-- Content Header (Page header) -->
<section class="content-header">
    <h3>
        <?= $title; ?><small> Satuan Barang</small>
    </h3>
    <ol class="breadcrumb">
        <li><a href="<?= base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><i class="active"></i> Units</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <!-- Small boxes (Stat box) -->
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Data Unit</h3>
                <div class="pull-right">
                    <a href="<?= base_url('units/add'); ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Add</a>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
                <?= $this->session->flashdata('success'); ?>
                <table class="table table-striped table-bordered" id="example1">
                    <thead>
                        <tr>
                            <th style="width: 50px">#</th>
                            <th>Name</th>
                            <th style="width: 180px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($units as $unit) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $unit['name']; ?></td>
                                <td class="text-center float">
                                    <a href="<?= base_url('units/edit/' . $unit['unit_id']); ?>" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i> Update</a>
                                    <a href="<?= base_url('units/delete/' . $unit['unit_id']); ?>" class="btn btn-xs btn-danger" onclick="return confirm('Apakah anda yakin?')"><i class="fa fa-trash"></i> Delete</a>
                                </td>
                            </tr>
                        <?php endforeach ?>

                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->


    </div>
    <!-- ./box -->
</section>
<!-- ./section -->