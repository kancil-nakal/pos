<!-- Content Header (Page header) -->
<section class="content-header">
    <h3>
        <?= $title; ?><small> Data Barang</small>
    </h3>
    <ol class="breadcrumb">
        <li><a href="<?= base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?= base_url('items'); ?>"> Items</a></li>
        <li class="text-capitalize"><i class="active"></i> <?= $page; ?> Item</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title text-capitalize"><?= $page; ?> Item</h3>
                <div class="pull-right">
                    <a href="<?= base_url('items'); ?>" class="btn btn-warning"><i class="fa fa-undo"></i> Back</a>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <?= $this->session->flashdata('error'); ?>
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <?= form_open_multipart('items/process'); ?>
                        <input type="hidden" class="form-control" id="item_id" name="item_id" value="<?= $items['item_id']; ?>">
                        <div class="form-group">
                            <label for="barcode">Barcode *</label>
                            <input type="text" class="form-control" id="barcode" name="barcode" value="<?= $items['barcode']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="product_name">Product Name *</label>
                            <input type="text" class="form-control" id="product_name" name="product_name" value="<?= $items['name']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="category">Category *</label>
                            <select class="form-control" name="category" id="category" required>
                                <option value="">- Pilih -</option>
                                <?php foreach ($categories as $category) : ?>
                                    <option value="<?= $category['category_id']; ?>" <?= $items['category_id'] == $category['category_id'] ? 'selected' : '' ?>><?= $category['name']; ?></option>
                                <?php endforeach; ?>
                            </select>

                        </div>
                        <div class="form-group">
                            <label for="unit">Unit *</label>
                            <select class="form-control" name="unit" id="unit" required>
                                <option value="">- Pilih -</option>
                                <?php foreach ($units as $unit) : ?>
                                    <option value="<?= $unit['unit_id']; ?>" <?= $items['unit_id'] == $unit['unit_id'] ? 'selected' : '' ?>><?= $unit['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <!-- form_dropdown('units',$unit,$selectedunit,['class' => 'form-control', 'required' => 'required'])   -->

                        </div>
                        <div class="form-group">
                            <label for="price">Price *</label>
                            <input type="number" class="form-control" id="price" name="price" value="<?= $this->input->post('price') ?? $items['price']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="stock">Stock *</label>
                            <input type="number" class="form-control" id="stock" name="stock" value="<?= $items['stock']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <?php if ($page == 'edit') : ?>
                                <?php if ($items['image'] != null) ?>
                                <div style="margin-bottom: 5px;">
                                    <img style="width:50%" src="<?= base_url('uploads/product/') . $items['image']; ?>" alt="">
                                </div>
                            <?php endif ?>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>
                        <br>
                        <div class="form-group">
                            <button class="btn btn-success" type="submit" name="<?= $page; ?>"><i class="fa fa-paper-plane"></i> Save</button>
                            <button class="btn btn-secondary" type="reset" name="reset">Reset</button>
                        </div>
                        <?= form_close(); ?>
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