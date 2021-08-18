<!-- Content Header (Page header) -->
<section class="content-header">
    <h3>
        <?= $title; ?><small> Pelanggan</small>
    </h3>
    <ol class="breadcrumb">
        <li><a href="<?= base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><i class="active"></i> Customer</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Data Customer</h3>
                <div class="pull-right">
                    <a href="<?= base_url('customers/add'); ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Add</a>
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
                            <th>Gender</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th style="width: 180px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($customers as $customer) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $customer['name']; ?></td>
                                <td><?= $customer['gender']; ?></td>
                                <td><?= $customer['phone']; ?></td>
                                <td><?= $customer['address']; ?></td>

                                <td class="text-center float">
                                    <a href="<?= base_url('customers/edit/' . $customer['customer_id']); ?>" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i> Update</a>
                                    <a href="<?= base_url('customers/delete/' . $customer['customer_id']); ?>" class="btn btn-xs btn-danger" onclick="return confirm('Apakah anda yakin?')"><i class="fa fa-trash"></i> Delete</a>
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