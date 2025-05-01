<!DOCTYPE html>
<html>
<head>
    <title>Pesan Makanan</title>
</head>
<body>
    <h1>Pesan Makanan Anda</h1>
    <form action="pesan.php" method="post">
        <div>
            <label>Pilih Makanan:</label><br>
            <?php
            // Daftar makanan yang sudah didefinisikan (dari array PHP)
            $daftarMakanan = [
                ["nama" => "Roti", "harga" => 15000],
                ["nama" => "pizza", "harga" => 12000],
                ["nama" => "gacoan", "harga" => 20000],
                ["nama" => "Es jeruk", "harga" => 5000]
            ];

            foreach ($daftarMakanan as $index => $makanan) {
                echo '<input type="checkbox" id="makanan-' . $index . '" name="makanan[]" value="' . $index . '">';
                echo '<label for="makanan-' . $index . '">' . $makanan["nama"] . ' (Rp ' . number_format($makanan["harga"], 0, ',', '.') . ')</label><br>';
            }
            ?>
        </div>
        <br>
        <button type="submit">Pesan Sekarang</button>
    </form>
</body>
</html>
