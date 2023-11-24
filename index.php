<!DOCTYPE html>
<html lang="en">

<head>
    <title>Formulir Pengiriman Paket</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 12px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        .error {
            color: red;
        }
    </style>
</head>

<body>

    <?php
    $sender = $senderAddress = $senderPhone = $recipient = $recipientAddress = $recipientPhone = $packageWeight = "";
    $senderErr = $recipientErr = $packageWeightErr = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["sender"])) {
            $senderErr = "Nama Pengirim wajib diisi";
        } else {
            $sender = test_input($_POST["sender"]);
        }

        if (empty($_POST["sender-address"])) {
            $senderErr .= "<br>Alamat Pengirim wajib diisi";
        } else {
            $senderAddress = test_input($_POST["sender-address"]);
        }

        if (empty($_POST["sender-phone"])) {
            $senderErr .= "<br>Nomor Telepon Pengirim wajib diisi";
        } else {
            $senderPhone = test_input($_POST["sender-phone"]);
        }

        if (empty($_POST["recipient"])) {
            $recipientErr = "Nama Penerima wajib diisi";
        } else {
            $recipient = test_input($_POST["recipient"]);
        }

        if (empty($_POST["recipient-address"])) {
            $recipientErr .= "<br>Alamat Penerima wajib diisi";
        } else {
            $recipientAddress = test_input($_POST["recipient-address"]);
        }

        if (empty($_POST["recipient-phone"])) {
            $recipientErr .= "<br>Nomor Telepon Penerima wajib diisi";
        } else {
            $recipientPhone = test_input($_POST["recipient-phone"]);
        }

        if (empty($_POST["package-weight"])) {
            $packageWeightErr = "Berat Paket wajib diisi";
        } else {
            $packageWeight = test_input($_POST["package-weight"]);
        }
    }

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="sender">Pengirim:</label>
        <input type="text" id="sender" name="sender">
        <span class="error"><?php echo $senderErr; ?></span>

        <label for="sender-address">Alamat Pengirim:</label>
        <input type="text" id="sender-address" name="sender-address">
        <span class="error"><?php echo $senderErr; ?></span>

        <label for="sender-phone">Nomor Telepon Pengirim:</label>
        <input type="tel" id="sender-phone" name="sender-phone">
        <span class="error"><?php echo $senderErr; ?></span>

        <label for="recipient">Penerima:</label>
        <input type="text" id="recipient" name="recipient">
        <span class="error"><?php echo $recipientErr; ?></span>

        <label for="recipient-address">Alamat Penerima:</label>
        <input type="text" id="recipient-address" name="recipient-address">
        <span class="error"><?php echo $recipientErr; ?></span>

        <label for="recipient-phone">Nomor Telepon Penerima:</label>
        <input type="tel" id="recipient-phone" name="recipient-phone">
        <span class="error"><?php echo $recipientErr; ?></span>

        <label for="package-weight">Berat Paket (kg):</label>
        <input type="number" id="package-weight" name="package-weight">
        <span class="error"><?php echo $packageWeightErr; ?></span>

        <button type="submit">Simpan</button>
    </form>

</body>

</html>