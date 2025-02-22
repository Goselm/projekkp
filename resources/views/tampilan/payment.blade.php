<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Payment</title>
</head>
<body>
    <form id="payment-form">
        <input type="text" id="name" placeholder="Nama" required>
        <input type="email" id="email" placeholder="Email" required>
        <input type="number" id="phone" placeholder="Nomor HP" required>
        <input type="number" id="amount" placeholder="Jumlah Pembayaran" required>
        <button type="button" onclick="pay()">Bayar</button>
    </form>

    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
    <script>
        function pay() {
            fetch('/payment', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                body: JSON.stringify({
                    name: document.getElementById('name').value,
                    email: document.getElementById('email').value,
                    phone: document.getElementById('phone').value,
                    amount: parseFloat(document.getElementById('amount').value),
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.snap_token) {
                    snap.pay(data.snap_token);
                } else {
                    alert("Error: " + data.error);
                }
            });
        }
    </script>    
</body>
</html>