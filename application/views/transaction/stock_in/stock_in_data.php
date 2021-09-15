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
                    <a href="<?= base_url('stock/in/add'); ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Add Stock In</a>
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
                                <td><?= indo_date($data->date) ?></td>
                                <td class="text-center float">
                                    <a id="set_detail" class="btn btn-xs btn-info" data-toggle="modal" data-target="#modal-detail"
                                        data-barcode="<?= $data->barcode; ?>" 
                                        data-itemname="<?= $data->item_name; ?>" 
                                        data-detail="<?= $data->detail; ?>" 
                                        data-suppliername="<?= $data->supplier_name; ?>" 
                                        data-qty="<?= $data->qty; ?>" 
                                        data-date="<?= indo_date($data->date); ?>" 
                                    ><i class="fa fa-eye"></i> Detail</a>
                                    <a href="<?= base_url('stock/in/delete/' . $data->stock_id . '/' . $data->item_id); ?>" class="btn btn-xs btn-danger" onclick="return confirm('Apakah anda yakin?')"><i class="fa fa-trash"></i> Delete</a>
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

<div class="modal fade" id="modal-detail">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Stock In Detail</h4>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered no-margin">
                    <tbody>
                        <tr>
                            <th>Barcode</th>
                            <td><span id="barcode"></span></th>
                        </tr>
                        <tr>
                            <th>Item Name</th>
                            <td><span id="item_name"></span></th>
                        </tr>
                        <tr>
                            <th>Detail</th>
                            <td><span id="detail"></span></th>
                        </tr>
                        <tr>
                            <th>Supplier Name</th>
                            <td><span id="supplier_name"></span></th>
                        </tr>
                        <tr>
                            <th>Qty</th>
                            <td><span id="qty"></span></th>
                        </tr>
                        <tr>
                            <th>Date</th>
                            <td><span id="date"></span></th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $(document).on('click', '#set_detail', function() {
            var barcode = $(this).data('barcode');
            var itemname = $(this).data('itemname');
            var detail = $(this).data('detail');
            var suppliername = $(this).data('suppliername');
            var qty = $(this).data('qty'); 
            var date = $(this).data('date'); 
            $('#barcode').text(barcode);
            $('#item_name').text(itemname);
            $('#detail').text(detail);
            $('#supplier_name').text(suppliername);
            $('#qty').text(qty);
            $('#date').text(date);
        })
    })
</script>

