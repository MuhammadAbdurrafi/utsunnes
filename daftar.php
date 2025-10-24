<?php
session_start();

// Jika form dikirim
if (isset($_POST['submit'])) {
    $nama_depan = $_POST['nama_depan'];
    $nama_belakang = $_POST['nama_belakang'];
    $asal_kota = $_POST['asal_kota'];
    $umur = intval($_POST['umur']);

    // Simpan ke session
    $_SESSION['data'] = [
        'nama_depan' => $nama_depan,
        'nama_belakang' => $nama_belakang,
        'asal_kota' => $asal_kota,
        'umur' => $umur
    ];
}

$data = isset($_SESSION['data']) ? $_SESSION['data'] : null;
?>

<html>
<head>
    <title>::Data Registrasi::</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-image: url("https://cdn.arstechnica.net/wp-content/uploads/2023/06/bliss-update-1440x960.jpg");
            background-size: cover;
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
        }
        .container {
            background-color: white;
            border: 3px solid grey;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            max-width: 800px;
            width: 100%;
        }
        h1 {
            text-align: center;
            color: #333;
            background-color: #e0f7e9;
            padding: 10px;
            border-radius: 5px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
            margin-bottom: 20px;
            border: 1px solid #f5c6cb;
        }
        .btn {
            display: inline-block;
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            transition: 0.3s;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="container">

    <?php if ($data): ?>
        <?php if ($data['umur'] < 10): ?>
            <div class="error">
                Error ❌ : Umur minimal adalah 10 tahun!
            </div>
            <div style="text-align:center;">
                <a href="index.html" class="btn">Kembali ke Form Registrasi</a>
            </div>
        <?php else: ?>
            <h1>Registrasi Berhasil!</h1>

            <table>
                <tr>
                    <th>No</th>
                    <th>Nama Lengkap</th>
                    <th>Umur</th>
                    <th>Asal Kota</th>
                </tr>
                <?php
                for ($i = 1; $i <= $data['umur']; $i++) {
                    if ($i % 2 != 0) continue;     // tampilkan hanya genap
                    if ($i == 4 || $i == 8) continue; // skip baris 4 dan 8

                    echo "<tr>
                            <td>$i</td>
                            <td>{$data['nama_depan']} {$data['nama_belakang']}</td>
                            <td>{$data['umur']} tahun</td>
                            <td>{$data['asal_kota']}</td>
                          </tr>";
                }
                ?>
            </table>

            <div style="text-align:center; margin-top:20px;">
                <a href="index.html" class="btn">Kembali ke Form Registrasi</a>
            </div>
        <?php endif; ?>

    <?php else: ?>
        <div class="error">
            Tidak ada data ditemukan. Silakan isi form terlebih dahulu.
        </div>
        <div style="text-align:center;">
            <a href="index.html" class="btn">Kembali ke Form</a>
        </div>
    <?php endif; ?>

</div>
</body>
</html>
