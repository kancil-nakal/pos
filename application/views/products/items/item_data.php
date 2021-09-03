<!-- Content Header (Page header) -->
<section class="content-header">
    <h3>
        <?= $title; ?><small> Data Barang</small>
    </h3>
    <ol class="breadcrumb">
        <li><a href="<?= base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><i class="active"></i> Items</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <!-- Small boxes (Stat box) -->
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Data Item</h3>
                <div class="pull-right">
                    <a href="<?= base_url('items/add'); ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Create Product Item</a>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
                <?= $this->session->flashdata('success'); ?>
                <table class="table table-striped table-bordered" id="dataitem">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Barcode</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Stock</th>
                            <th>Unit</th>
                            <th>Price</th>
                            <th style="width: 180px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- <?php $i = 1;
                                foreach ($items as $item) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $item['barcode']; ?><br>
                                    <a href="<?= base_url('items/barcode_qrcode/') . $item['item_id']; ?>" class="btn btn-default btn-xs"><i class="fa fa-barcode"></i> Generate</a>
                                </td>
                                <td>
                                    <?php if ($item['image'] != null) : ?>
                                        <img src="<?= base_url('uploads/product/') . $item['image']; ?>" style="width: 100px;">
                                    <?php endif ?>
                                </td>
                                <td><?= $item['name']; ?></td>
                                <td><?= $item['category_name']; ?></td>
                                <td><?= $item['stock']; ?></td>
                                <td><?= $item['unit_name']; ?></td>
                                <td>Rp. <?= $item['price']; ?>,-</td>
                                <td class="text-center float">
                                    <a href="<?= base_url('items/edit/' . $item['item_id']); ?>" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i> Update</a>
                                    <a href="<?= base_url('items/delete/' . $item['item_id']); ?>" class="btn btn-xs btn-danger" onclick="return confirm('Apakah anda yakin?')"><i class="fa fa-trash"></i> Delete</a>
                                </td>
                            </tr>
                        <?php endforeach ?> -->

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

<script>
    $(document).ready(function() {
        $('#dataitem').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "<?= site_url('items/get_ajax') ?>",
                "type": "POST"
            },
            "columnDefs": [{
                    "targets": [7],
                    "className": "text-right"
                },
                {
                    "targets": [2, 5, 6, -1],
                    "className": "text-center"
                },
                {
                    "targets": [0, 7, -1],
                    "orderable": false,
                },
            ],
            "order": []
        });
    });
</script>