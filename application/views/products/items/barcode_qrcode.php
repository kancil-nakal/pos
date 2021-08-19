<!-- Content Header (Page header) -->
<section class="content-header">
    <h3>
        <?= $title; ?><small> Data Barang</small>
    </h3>
    <ol class="breadcrumb">
        <li><a href="<?= base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?= base_url('items'); ?>"> Items</a></li>
        <li class="text-capitalize"><i class="active"></i> Barcode</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title text-capitalize">Barcode Generator <i class="fa fa-barcode"></i></h3>
                <div class="pull-right">
                    <a href="<?= base_url('items'); ?>" class="btn btn-warning"><i class="fa fa-undo"></i> Back</a>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="col-md-2 text-center">
                    <?php
                    $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
                    echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($items['barcode'], $generator::TYPE_CODE_128)) . '">';
                    ?>
                    <br>
                    <?= $items['barcode'];; ?>
                    <br>
                </div>
                <div class="col-md-10">
                    <a href="<?= base_url('items/barcode_print/') . $items['item_id']; ?>" target="_blank" class="btn btn-default pull-right"><i class="fa fa-print"></i> Print</a>
                </div>
            </div>
        </div>
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title text-capitalize">QR-Code Generator <i class="fa fa-qrcode"></i></h3>
                <div class="pull-right">
                    <!-- <a href="<?= base_url('items'); ?>" class="btn btn-warning"><i class="fa fa-undo"></i> Back</a> -->
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="col-md-2 text-center">
                    <?php
                    // $renderer = new BaconQrCode\Renderer\ImageRenderer(
                    //     new BaconQrCode\Renderer\RendererStyle\RendererStyle(400),
                    //     new BaconQrCode\Renderer\Image\ImagickImageBackEnd()
                    // );
                    // $writer = new BaconQrCode\Writer($items['barcode']);
                    // $writer->writeFile('Hello World!', 'qrcode.png');
                    // $qrCode = new \Endroid\QrCode\QrCode($items['barcode']);
                    // $qrCode->writeFile('uploads/qr-code/item-' . $items['item_id'] . '.png');
                    // 
                    ?>
                    <br>
                </div>

            </div>
        </div>
    </div>
    <!-- /.box -->


    </div>
    <!-- ./box -->
</section>
<!-- ./section -->