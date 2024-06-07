<!DOCTYPE html>
<html>

<head>
    <title>Barcode Generator</title>
</head>

<body>
    <h1>Barcode</h1>
    <img src="data:image/png;base64,<?php echo base64_encode($barcode_png); ?>" alt="Barcode" />
    <p><?= $kode_barang ?></p>


</body>

</html>