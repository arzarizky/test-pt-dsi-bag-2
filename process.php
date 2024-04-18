<?php
    include 'db.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $type = $_POST['type'];
        $hp = $_POST['hp'];
        $comment = $_POST['comment'];

        $errors = [];
        
        if (empty($_POST['name']) || !is_string($_POST['name'])) {
            $errors[] = "Nama harus diisi dan berupa teks.";
        }

        $allowedTypes = ['1', '2', '3'];
        if (empty($_POST['type']) || !in_array($_POST['type'], $allowedTypes)) {
            $errors[] = "Jenis harus dipilih.";
        }

        if (!isset($_POST['hp']) || $_POST['hp'] === '') {
            $hp = '-';
        } elseif (!preg_match('/^([0-9\s\-\+\(\)]*)$/', $_POST['hp'])) {
            $errors[] = "Hp harus berupa angka atau karakter khusus (+, -, (), dan spasi).";
        } else {
            $hp = htmlspecialchars($_POST['hp']);
        }

        if (empty($_POST['comment']) || strlen($_POST['comment']) < 3 || strlen($_POST['comment']) > 1000) {
            $errors[] = "Komentar harus diisi dengan panjang 3 hingga 1000 karakter.";
        }

        if (!empty($errors)) {
            $errorString = implode("<br>", $errors);
            header("Location: index.php?error=true&message=$errorString");
            exit();
        }

        $name = htmlspecialchars($name);
        $type = htmlspecialchars($type);
        $comment = htmlspecialchars($comment);

        if ($type === "1") {
            $typeUser = "Manusia";
        } elseif ($type === "2") {
            $typeUser = "Elf";
        } elseif ($type === "3") {
            $typeUser = "Tumbuh Tumbuhan";
        } else {
            header("Location: index.php?error=true&message=Pilih Sesuai Jenis");
            exit();
        }


        $sql = "INSERT INTO test_bag_2 (nama_user, type_user, no_hp_user, komentar_user) VALUES ('$name', '$typeUser', '$hp', '$comment')";

        if ($conn->query($sql) === TRUE) {
            header("Location: index.php?success=true&message=Data User Berhasil Ditambahkan");
            exit();
        } else {
            header("Location: index.php?error=true&message=Error DB");
            exit();
        }
    }
?>