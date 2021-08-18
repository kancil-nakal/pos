<!-- Content Header (Page header) -->
<section class="content-header">
    <h3>
        <?= $title; ?><small> Pemasok Barang</small>
    </h3>
    <ol class="breadcrumb">
        <li><a href="<?= base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?= base_url('supplier'); ?>"> Supplier</a></li>
        <li class="text-capitalize"><i class="active"></i> <?= $page; ?> Supplier</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title text-capitalize"><?= $page; ?> Supplier</h3>
                <div class="pull-right">
                    <a href="<?= base_url('supplier'); ?>" class="btn btn-warning"><i class="fa fa-undo"></i> Back</a>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <form action="<?= base_url('supplier/process'); ?>" method="post">
                            <input type="hidden" class="form-control" id="supplier_id" name="supplier_id" value="<?= $suppliers['supplier_id']; ?>">
                            <div class="form-group">
                                <label for="supplier_name">Supplier Name *</label>
                                <input type="text" class="form-control" id="supplier_name" name="supplier_name" value="<?= $suppliers['name']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone *</label>
                                <input type="number" class="form-control" id="phone" name="phone" value="<?= $suppliers['phone']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="address">Address *</label>
                                <textarea type="text" class="form-control" id="address" name="address"><?= $suppliers['address']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea type="text" class="form-control" id="description" name="description" value="<?= $suppliers['description']; ?>"></textarea>
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