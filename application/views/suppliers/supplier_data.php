<!-- Content Header (Page header) -->
<section class="content-header">
    <h3>
        <?= $title; ?><small> Pemasok Barang</small>
    </h3>
    <ol class="breadcrumb">
        <li><a href="<?= base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><i class="active"></i> Supplier</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Data Supplier</h3>
                <div class="pull-right">
                    <a href="<?= base_url('supplier/add'); ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Add</a>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body ">
                <?= $this->session->flashdata('message'); ?>
                <table class="table table-striped table-bordered" id="example1">
                    <thead>
                        <tr>
                            <th style="width: 50px">#</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Description</th>
                            <th style="width: 180px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($suppliers as $supplier) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $supplier['name']; ?></td>
                                <td><?= $supplier['phone']; ?></td>
                                <td><?= $supplier['address']; ?></td>
                                <td><?= $supplier['description']; ?></td>

                                <td class="text-center float">
                                    <form action="<?= base_url('supplier/delete'); ?>" method="post">
                                        <a href="<?= base_url('supplier/edit/' . $supplier['supplier_id']); ?>" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i> Update</a>
                                        <input type="hidden" name="supplier_id" value="<?= $supplier['supplier_id']; ?>">
                                        <button onclick="return confirm('Apakah anda yakin?')" type="submit" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</button>
                                    </form>
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