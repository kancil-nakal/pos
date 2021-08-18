<!-- Content Header (Page header) -->
<section class="content-header">
    <h3>
        <?= $title; ?>
    </h3>
    <ol class="breadcrumb">
        <li><a href="<?= base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?= base_url('users'); ?>"> Users</a></li>
        <li><i class="active"></i> Users</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Tambah Data User</h3>
                <div class="pull-right">
                    <a href="<?= base_url('users'); ?>" class="btn btn-warning"><i class="fa fa-undo"></i> Back</a>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <form action="" method="post">
                            <div class="form-group <?= form_error('name') ? 'has-error' : ''; ?>">
                                <label for="name">Name *</label>
                                <input type="text" class="form-control" value="<?= set_value('name'); ?>" id="name" name="name">
                                <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group <?= form_error('username') ? 'has-error' : ''; ?>">
                                <label for="username">Username *</label>
                                <input type="text" class="form-control" value="<?= set_value('username'); ?>" id="username" name="username">
                                <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group <?= form_error('username') ? 'has-error' : ''; ?>">
                                <label for="email">Email *</label>
                                <input type="text" class="form-control" value="<?= set_value('email'); ?>" id="email" name="email">
                                <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group <?= form_error('password1') ? 'has-error' : ''; ?>">
                                <label for="password1">Password *</label>
                                <input type="password" class="form-control" id="password1" name="password1">
                                <?= form_error('password1', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group <?= form_error('password2') ? 'has-error' : ''; ?>">
                                <label for="password2">Password Confirmation *</label>
                                <input type="password" class="form-control" id="password2" name="password2">
                                <?= form_error('password2', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="address">Address *</label>
                                <textarea type="text" class="form-control" id="address" name="address"><?= set_value('address'); ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="level">Level *</label>
                                <select class="form-control" id="level" name="level">
                                    <option value="">- Pilih -</option>
                                    <option value="1" <?= set_value('level') == 1 ? 'selected' : ''; ?>>Admin</option>
                                    <option value="2" <?= set_value('level') == 2 ? 'selected' : ''; ?>>Kasir</option>
                                </select>
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