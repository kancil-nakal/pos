<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barcode Product <?= $items['barcode']; ?></title>
</head>

<body>
    <div class="box-body">
        <div class="col-md-2 text-center">
            <?php
            $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
            echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($items['barcode'], $generator::TYPE_CODE_128)) . '" style="width: 200px;">';
            ?>
            <br>
            <?= $items['barcode']; ?>
        </div>
    </div>

</body>

</html>