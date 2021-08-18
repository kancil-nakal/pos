<!-- Content Header (Page header) -->
<section class="content-header">
    <h3>
        <?= $title; ?><small> Kategori Barang</small>
    </h3>
    <ol class="breadcrumb">
        <li><a href="<?= base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?= base_url('category'); ?>"> Categories</a></li>
        <li class="text-capitalize"><i class="active"></i> <?= $page; ?> Category</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title text-capitalize"><?= $page; ?> Category</h3>
                <div class="pull-right">
                    <a href="<?= base_url('category'); ?>" class="btn btn-warning"><i class="fa fa-undo"></i> Back</a>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <form action="<?= base_url('category/process'); ?>" method="post">
                            <input type="hidden" class="form-control" id="category_id" name="category_id" value="<?= $categories['category_id']; ?>">
                            <div class="form-group">
                                <label for="category_name">Category Name *</label>
                                <input type="text" class="form-control" id="category_name" name="category_name" value="<?= $categories['name']; ?>">
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