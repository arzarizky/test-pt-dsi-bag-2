<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test PT DASHINDO SOLUSI INTEGRASI :: Test Bagian 2</title>
    <link rel="stylesheet" href="public/assets/css/test-bag-2.css">
    <link rel="stylesheet" href="public/assets/vendors/@fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="public/assets/vendors/izitoast/dist/css/iziToast.min.css">
</head>
<body>

    <header>
        <div>
            <img src="https://dashindo.com/testfullstack/derpface.png" width="70" height="70" alt="Anggap Saja Logo Wkwkwkk">
            <h3>Full Stack Programmer Test</h3>
        </div>
    </header>

    <div class="container">
        <main>
            <div class="form-input">
                <div class="title">
                    <h4>Form Input</h4>
                </div>
                <form action="process.php" method="post" enctype="multipart/form-data">
                    <div class="form-row">
                        <label>Nama</label>
                        <input type="text" name="name" id="name" required placeholder="Mohon Masukan Nama Lengkap">
                    </div>
                    <div class="form-row">
                        <label>Jenis</label>
                        <select name="type" id="type" required>
                            <option value="" disabled selected>Mohon Pilih Salah Satu</option>
                            <option value="1">Manusia</option>
                            <option value="2">Elf</option>
                            <option value="3">Tumbuh tumbuhan</option>
                        </select>
                    </div>
                    <div class="form-row">
                        <label>HP</label>
                        <input type="text" name="hp" id="hp" placeholder="Tidak Wajib Masukan No HP" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                    </div>
                    <div class="form-row" style="align-items: flex-start">
                        <label>Komentar</label>
                        <textarea required name="comment" id="comment" cols="30" rows="10" placeholder="Mohon Masukan Kalimat Yang Sopan"></textarea>
                    </div>
                    <div class="form-row">
                        <label for="button"></label>
                        <button class="btn">
                            <i class="fas fa-save"></i>
                            <span>Save</span>
                        </button>
                    </div>
                </form>
            </div>

            <div class="hasil-input">

                <div class="title">
                    <h4>Hasil Input</h4>
                </div>

                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Jenis</th>
                            <th>Hp</th>
                            <th>Komentar</th>
                        </tr>
                    </thead>

                    <tbody>
                            <?php
                                include 'db.php';
                                $sql = "SELECT * FROM test_bag_2 ORDER BY id DESC";
                                $result = $conn->query($sql);
                                
                                if ($result === false) {
                                    die("Error: " . $conn->error);
                                }

                                if ($result->num_rows == 0) {
                                    echo '<tr>
                                            <td colspan="5" style="border: none;">
                                                <h5>Data Tidak Ada</h5>
                                            </td>
                                        </tr>';
                                } else {
                                    $row_number = 1;
                                    while ($row = $result->fetch_assoc()) {
                                        
                                        echo "<tr>";
                                        echo "<td data-column='No'>" . $row_number . "</td>";
                                        echo "<td data-column='Nama'>" . $row['nama_user'] . "</td>";
                                        echo "<td data-column='Jenis'>" . $row['type_user'] . "</td>";
                                        echo "<td data-column='Hp'>" . $row['no_hp_user'] . "</td>";
                                        echo "<td style='white-space: pre-wrap;' data-column='Komentar'>" . $row['komentar_user'] . "</td>";
                                        echo "</tr>";
                                        $row_number++;

                                    }
                                }
                            ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>

    <script src="public/assets/vendors/izitoast/dist/js/iziToast.min.js" type="text/javascript"></script>
    <?php include 'toast.php'; ?>
</body>
</html>
