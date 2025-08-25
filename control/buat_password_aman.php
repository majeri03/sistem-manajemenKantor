<?php
// Ganti 'password_yang_anda_inginkan' dengan password baru yang ingin Anda gunakan.
$password_baru = 'admin13579@_@';

// Membuat hash yang aman dari password tersebut.
$hash_aman = password_hash($password_baru, PASSWORD_DEFAULT);

echo "Password Anda: " . htmlspecialchars($password_baru) . "<br>";
echo "Hash Aman (salin ini ke kolom password di database):<br>";
echo "<strong>" . $hash_aman . "</strong>";
?>