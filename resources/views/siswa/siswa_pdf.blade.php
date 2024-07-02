<!DOCTYPE html>
<html>
<head>
	<title>Laporan Jadwal</title>
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
				<th>Grade</th>
				<th>School</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($siswas as $siswa)
			<tr>
				<td>{{ $i++ }}</td>
				<td>{{$siswa->nama}}</td>
				<td>{{$siswa->grade}}</td>
				<td>{{$siswa->school}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
 
</body>
</html>