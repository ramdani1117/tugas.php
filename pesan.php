<?php

// Daftar makanan yang sudah didefinisikan (harus sama dengan di form)
$daftarMakanan = [
    ["nama" => "Roti", "harga" => 15000],
    ["nama" => "pizza", "harga" => 12000],
    ["nama" => "gacoan", "harga" => 20000],
    ["nama" => "Es jeruk", "harga" => 5000]
];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["makanan"])) {
    $itemDipesan = [];
    $totalHarga = 0;

    foreach ($_POST["makanan"] as $index) {
        if (isset($daftarMakanan[$index])) {
            $item = $daftarMakanan[$index];
            $itemDipesan[] = $item;
            $totalHarga += $item["harga"];
        }
    }

    // Buat objek Pesanan (contoh sederhana menggunakan array)
    $pesanan = [
        "items" => $itemDipesan,
        "total_harga" => $totalHarga,
    ];

    echo "<h2>Ringkasan Pesanan</h2>";
    if (!empty($pesanan["items"])) {
        echo "<ul>";
        foreach ($pesanan["items"] as $item) {
            echo "<li>" . $item["nama"] . " - Rp " . number_format($item["harga"], 0, ',', '.') . "</li>";
        }
        echo "</ul>";
        echo "<p>Total Harga: Rp " . number_format($pesanan["total_harga"], 0, ',', '.') . "</p>";
        // Di sini Anda bisa menambahkan logika untuk menyimpan pesanan ke database, dll.
    } else {
        echo "<p>Tidak ada makanan yang dipilih.</p>";
    }

} else {
    echo "<p>Terjadi kesalahan dalam pemrosesan form.</p>";
}

?>