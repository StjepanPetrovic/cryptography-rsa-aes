<?php

require 'src/KeyGenerator.php';

$keyGenerator = new KeyGenerator();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cryptography</title>
    <link rel="stylesheet" href="public/style.css">
</head>
<body>
    <div class="container">
        <form id="encrypt-form" class="form" method="post" enctype="multipart/form-data">
            <label>
                File to encrypt:
                <input id="file_to_encrypt" type="file" name="file_to_encrypt">
            </label>
            <label class="label_key">
                Encryption key (find below):
                <textarea id="text_area_encryption_key" name="encryption_key" rows="3"></textarea>
            </label>
            <input type="submit" value="1. step: Encrypt file (symmetric or asymmetric) before sending it to the recipient">
        </form>
        <div class="container-server">
            <div class="server-data">
                <h4>Recipient's symmetric key:</h4>
                <p>
                    <?= $keyGenerator->getKey(KeyGenerator::SYMMETRIC_KEY_FILE) ?>
                </p>
                <h4>Recipient's public key:</h4>
                <p>
                    <?= $keyGenerator->getKey(KeyGenerator::PUBLIC_KEY_FILE) ?>
                </p>
            </div>
            <div class="interaction-server-containter">
                <div class="server-send-form">
                    <form id="send-form" class="form" method="post" enctype="multipart/form-data">
                        <label>
                            File to send:
                            <input id="file_to_send" type="file" name="file_to_send">
                        </label>
                        <input type="submit" value="2. step: Send file to recipient">
                    </form>
                </div>
                <button class="verify-signature" onclick="verifySignature()">3. step: Verify signature</button>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="public/script.js"></script>
</body>
</html>
