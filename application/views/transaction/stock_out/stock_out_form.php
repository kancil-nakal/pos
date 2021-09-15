<!-- Content Header (Page header) -->
<section class="content-header">
    <h3>
        <?= $title; ?><small> Barang Masuk / Pembelian</small>
    </h3>
    <ol class="breadcrumb">
        <li><a href="<?= base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?= base_url('category'); ?>"> Stock In</a></li>
        <li class="text-capitalize"><i class="active"></i> Add Stock in</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title text-capitalize">Add Stock In</h3>
                <div class="pull-right">
                    <a href="<?= base_url('stock/out'); ?>" class="btn btn-warning"><i class="fa fa-undo"></i> Back</a>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <?= $this->session->flashdata('message'); ?>
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                    
                        <form action="<?= base_url('stock/process_stock_out'); ?>" method="post">
                            <input type="hidden" class="form-control" id="stock_id" name="stock_id" value="">
                            <div class="form-group">
                                <label for="date">Date *</label>
                                <input type="date" class="form-control" id="date" name="date" value="<?= date('Y-m-d'); ?>">
                            </div>
                            <div>
                                <label for="Barcode">Barcode *</label>
                            </div>
                            <div class="form-group input-group">
                                <input type="hidden" class="form-control" id="item_id" name="item_id">
                                <input type="text" class="form-control" id="barcode" name="barcode" required autofocus>
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-item">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="item_name">Item Name *</label>
                                <input type="type" class="form-control" id="item_name" name="item_name" readonly>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-8">
                                        <label for="unit_name">Unit Name *</label>
                                        <input type="type" class="form-control" id="unit_name" name="unit_name" value="-" readonly>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="stock">Initial Stock *</label>
                                        <input type="type" class="form-control" id="stock" name="stock" value="-" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="detail">Info *</label>
                                <input type="type" class="form-control" name="detail" placeholder="Rusak / hilang / kadaluarsa / etc" required>
                            </div>
                            <div class="form-group">
                                <label for="qty">Qty *</label>
                                <input type="type" class="form-control" name="qty" required>
                            </div>


                            <div class="form-group">
                                <button class="btn btn-success" type="submit" name="submit"><i class="fa fa-paper-plane"></i> Save</button>
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


<div class="modal fade" id="modal-item">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-item">Select Product Item</h4>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered table-striped" id="example1">
                    <thead>
                        <tr>
                            <th>Barcode</th>
                            <th>Name</th>
                            <th>Unit</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($items as $item) : ?>
                            <tr>
                                <td><?= $item['barcode']; ?></td>
                                <td style="width: 200px;"><?= $item['name']; ?></td>
                                <td><?= $item['unit_name']; ?></td>
                                <td style="width: 100px;"><?= indo_currency($item['price']); ?></td>
                                <td><?= $item['stock']; ?></td>
                                <td>
                                    <button class="btn btn-xs btn-info" id="select" data-id="<?= $item['item_id']; ?>" data-barcode="<?= $item['barcode']; ?>" data-name="<?= $item['name']; ?>" data-unit="<?= $item['unit_name']; ?>" data-stock="<?= $item['stock']; ?>"><i class="fa fa-check"></i> Select</button>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $(document).on('click', '#select', function() {
            var item_id = $(this).data('id');
            var barcode = $(this).data('barcode');
            var name = $(this).data('name');
            var unit_name = $(this).data('unit');
            var stock = $(this).data('stock');
            $('#item_id').val(item_id);
            $('#barcode').val(barcode);
            $('#item_name').val(name);
            $('#unit_name').val(unit_name);
            $('#stock').val(stock);
            $('#modal-item').modal('hide');
        })
    })
</script>