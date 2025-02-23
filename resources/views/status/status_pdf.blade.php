<!DOCTYPE html>
<html>
<head>
	<title>Laporan Status</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 20pt;
		}
	</style>

	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>No</th>
				<th>Name</th>
				<th>Jumlah</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($notifikasis as $notifikasi)
			<tr>
				<td>{{ $i++ }}</td>
				<td>{{$notifikasi->nama}}</td>
				<td>{{$notifikasi->jumlah}}</td>
				<td>{{$notifikasi->status}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
 
</body>
</html>