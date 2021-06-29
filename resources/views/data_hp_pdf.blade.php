<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>
</head>
<body>
<h1> Data HP </h1>
<table align="center" width="80%" border="1">
  <tr>
    <th>No</th>
    <th>Merk HP</th>
    <th>Tipe HP</th>
    <th>Tahun Produksi</th>
  </tr>
  @php
  @endphp

  @foreach ($list_hp as $key => $datahp)
    <tr>
        <td>{{ $key+1 }}</td>
        <td>{{ $datahp->merk_hp }}</td>
        <td>{{ $datahp->tipe_hp }}</td>
        <td>{{ $datahp->thn_produksi }}</td>
    </tr>

  @endforeach
</table>

</body>
</html>
