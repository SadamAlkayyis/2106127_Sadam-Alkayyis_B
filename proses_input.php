<!DOCTYPE html>
<html lang="en">

<head>
    <title>Document</title>
</head>

<body>
    <?php
    $host = "localhost";
    $database = "2106127_sadamalkayyis";

    $conn = new mysqli($host, $username, $password, $database);

    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    $sender = $_POST["sender"];
    $senderAddress = $_POST["sender-address"];
    $senderPhone = $_POST["sender-phone"];
    $recipient = $_POST["recipient"];
    $recipientAddress = $_POST["recipient-address"];
    $recipientPhone = $_POST["recipient-phone"];
    $packageWeight = $_POST["package-weight"];

    $sql = "INSERT INTO pengiriman_paket (pengirim_nama, pengirim_alamat, pengirim_telepon, penerima_nama, penerima_alamat, penerima_telepon, berat_paket) 
    VALUES ('$sender', '$senderAddress', '$senderPhone', '$recipient', '$recipientAddress', '$recipientPhone', '$packageWeight')";

    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil disimpan ke database.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    ?>
</body>

</html>