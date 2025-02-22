<!DOCTYPE html>
<html>
<head>
    <title>Notifikasi Pembayaran</title>
</head>
<body>
    <h1>Halo, {{ $data['nama'] }}</h1>
    <p>Pembayaran anda bernilai {{ $data['biaya'] }}</p>
    <p>Terima kasih telah melakukan pembayaran.</p>
    <p>Detail Anda:</p>
    <ul>
        <li>Email: {{ $data['email'] }}</li>
    </ul>
    <p>Salam,</p>
    <p>Tim Kami</p>
</body>
</html>