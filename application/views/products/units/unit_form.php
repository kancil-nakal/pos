<!-- Content Header (Page header) -->
<section class="content-header">
    <h3>
        <?= $title; ?><small> Satuan Barang</small>
    </h3>
    <ol class="breadcrumb">
        <li><a href="<?= base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?= base_url('units'); ?>"> Units</a></li>
        <li class="text-capitalize"><i class="active"></i> <?= $page; ?> unit</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title text-capitalize"><?= $page; ?> Unit</h3>
                <div class="pull-right">
                    <a href="<?= base_url('unit'); ?>" class="btn btn-warning"><i class="fa fa-undo"></i> Back</a>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <form action="<?= base_url('units/process'); ?>" method="post">
                            <input type="hidden" class="form-control" id="unit_id" name="unit_id" value="<?= $units['unit_id']; ?>">
                            <div class="form-group">
                                <label for="unit_name">Unit Name *</label>
                                <input type="text" class="form-control" id="unit_name" name="unit_name" value="<?= $units['name']; ?>">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success" type="submit" name="<?= $page; ?>"><i class="fa fa-paper-plane"></i> Save</button>
                                <button class="btn btn-secondary" type="reset" name="reset">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.box -->


    </div>
    <!-- ./box -->
</section>
<!-- ./section -->