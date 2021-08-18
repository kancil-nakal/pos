<!-- Content Header (Page header) -->
<section class="content-header">
    <h3>
        <?= $title; ?>
    </h3>
    <ol class="breadcrumb">
        <li><a href="<?= base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><i class="active"></i> Users</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Data User</h3>
                <div class="pull-right">
                    <a href="<?= base_url('users/add'); ?>" class="btn btn-primary"><i class="fa fa-user-plus"></i> Create</a>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
                <?= $this->session->flashdata('message'); ?>
                <table class="table table-striped table-bordered" id="example1">
                    <thead>
                        <tr>
                            <th style="width: 50px">#</th>
                            <th>Username</th>
                            <th>Name</th>
                            <th>Adress</th>
                            <th style="width: 100px;">Level</th>
                            <!-- <th style="width: 80px;">Status</th> -->
                            <th style="width: 180px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($users as $user) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $user['username']; ?></td>
                                <td><?= $user['name']; ?></td>
                                <td><?= $user['address']; ?></td>
                                <?php if ($user['level'] == 1) : ?>
                                    <td>Admin</td>
                                <?php else : ?>
                                    <td>Kasir</td>
                                <?php endif ?>
                                <!-- <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="is_active"<?= ($user['is_active'] == 1) ? 'checked' : ''; ?> disabled>
                                    </div>
                                </td> -->
                                <td class="text-center float">
                                    <form action="<?= base_url('users/delete'); ?>" method="post">
                                        <?php if ($user['username'] == 'irsyad') : ?>
                                            <a href="<?= base_url('users/edit/' . $user['user_id']); ?>" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i> View</a>
                                        <?php else : ?>
                                            <a href="<?= base_url('users/edit/' . $user['user_id']); ?>" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i> Update</a>
                                            <input type="hidden" name="user_id" value="<?= $user['user_id']; ?>">
                                            <button onclick="return confirm('Apakah anda yakin?')" type="submit" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</button>
                                        <?php endif ?>
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