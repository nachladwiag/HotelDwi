<html>
	<head>
		<style>
			table {
			  font-family: arial, sans-serif;
			  border-collapse: collapse;
			  width: 100%;
			}

			td, th {
			  border: 1px solid #000000;
			  text-align: center;
			  height: 20px;
			  margin: 8px;
			}

		</style>
	</head>
	<body>
		<div style="font-size:64px; color:'#dddddd'"><i>Invoice</i></div>
		<p>
		<i>Hotel Dwi</i><br>
		Kuningan, Jawa Barat
		</p>
		<hr>
		<hr>
		<p></p>
		<p>
			Pemesan : <?= $transaksi['nama_pemesan'] ?><br>
			Email : <?= $transaksi['email'] ?><br>
			Transaksi No : <?= $transaksi['id_reservasi'] ?><br>
			Tanggal : <?= date('d-m-Y', strtotime($transaksi['tgl_cek_in'])) ?><br> 
		</p>
		<table cellpadding="6" >
			<tr>
				<th><strong>Tipe Kamar</strong></th>
				<th><strong>Harga permalam</strong></th>
				<th><strong>Jumlah hari</strong></th>
				<th><strong>Jumlah kamar</strong></th>
				<th><strong>Total Harga</strong></th>
			</tr>
			<tr>
                <td><?= $transaksi['type_kamar'] ?></td>
				<td><?= "Rp " . number_format($transaksi['harga'],2,',','.')  ?></td>
				<td><?= $transaksi['jml_hari'] ?></td>
				<td><?= $transaksi['jumlah_kamar'] ?></td>
				<td><?= "Rp " . number_format($transaksi['total_bayar'],2,',','.')  ?></td>
			</tr>
		</table>
	</body>
</html>