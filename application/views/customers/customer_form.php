<!-- Content Header (Page header) -->
<section class="content-header">
    <h3>
        <?= $title; ?><small> Pelanggan</small>
    </h3>
    <ol class="breadcrumb">
        <li><a href="<?= base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?= base_url('customers'); ?>"> Customers</a></li>
        <li class="text-capitalize"><i class="active"></i> <?= $page; ?> Customer</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title text-capitalize"><?= $page; ?> Customer</h3>
                <div class="pull-right">
                    <a href="<?= base_url('customers'); ?>" class="btn btn-warning"><i class="fa fa-undo"></i> Back</a>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <form action="<?= base_url('customers/process'); ?>" method="post">
                            <input type="hidden" class="form-control" id="customer_id" name="customer_id" value="<?= $customers['customer_id']; ?>">
                            <div class="form-group">
                                <label for="customer_name">Customer Name *</label>
                                <input type="text" class="form-control" id="customer_name" name="customer_name" value="<?= $customers['name']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="gender">Gender *</label>
                                <select class="form-control" id="gender" name="gender">
                                    <option value="">- Pilih -</option>
                                    <option value="L" <?= $customers['gender'] == 'L' ? 'selected' : ''; ?>>Laki-laki</option>
                                    <option value="P" <?= $customers['gender'] == 'P' ? 'selected' : ''; ?>>Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone *</label>
                                <input type="number" class="form-control" id="phone" name="phone" value="<?= $customers['phone']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="address">Address *</label>
                                <textarea type="text" class="form-control" id="address" name="address"><?= $customers['address']; ?></textarea>
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