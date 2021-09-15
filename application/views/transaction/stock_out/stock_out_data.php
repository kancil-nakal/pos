<!-- Content Header (Page header) -->
<section class="content-header">
    <h3>
        <?= $title; ?><small> Barang Masuk / Pembelian</small>
    </h3>
    <ol class="breadcrumb">
        <li><a href="<?= base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><i class="active"></i> Stock In</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <!-- Small boxes (Stat box) -->
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Data Stock In</h3>
                <div class="pull-right">
                    <a href="<?= base_url('stock/out/add'); ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Add Stock Out</a>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
                <?= $this->session->flashdata('message'); ?>
                <table class="table table-striped table-bordered" id="example1">
                    <thead>
                        <tr>
                            <th style="width: 50px">#</th>
                            <th>Barcode</th>
                            <th>Product Item</th>
                            <th>Qty</th>
                            <th>Info</th>
                            <th>Date</th>
                            <th style="width: 180px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1;
                        foreach ($row as $key => $data) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $data->barcode ?></td>
                                <td><?= $data->item_name ?></td>
                                <td><?= $data->qty ?></td>
                                <td><?= $data->detail ?></td>
                                <td><?= indo_date($data->date) ?></td>
                                <td class="text-center float">
                                   
                                    <a href="<?= base_url('stock/out/delete/' . $data->stock_id . '/' . $data->item_id); ?>" class="btn btn-xs btn-danger" onclick="return confirm('Apakah anda yakin?')"><i class="fa fa-trash"></i> Delete</a>
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
