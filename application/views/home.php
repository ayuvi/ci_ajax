<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $title; ?></title>
	<script type="text/javascript" src="<?= base_url() . 'assets/js/jquery-3.2.1.min.js' ?>"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>
	<div class="container mt-3">
		<h1>Data Barang</h1>

		<p id="pesan"></p>

		<a href="#form" data-toggle="modal" class="btn btn-primary mb-3">Tambah Data</a>

		<table class="table table-hover">
			<thead class="bg-primary">
				<tr>
					<th>No</th>
					<th>Kode Barang</th>
					<th>Nama Barang</th>
					<th>Harga</th>
					<th>Stock</th>
				</tr>
			</thead>
			<tbody id="targetData">
				<tr>
					<td></td>
				</tr>
			</tbody>
		</table>

		<!-- modal tambah data -->
		<div class="modal fade" id="form" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<p id="pesan"></p>
					<div class="modal-header mb-3">
						<h1>Data Barang</h1>
					</div>
					<p id="pesan"></p>
					<table class="table">
						<tr>
							<td>KODE BARANG</td>
							<td><input type="text" name="kode_barang" placeholder="Kode Barang" class="form-control"></td>
						</tr>
						<tr>
							<td>NAMA BARANG</td>
							<td><input type="text" name="nama_barang" placeholder="Nama Barang" class="form-control"></td>
						</tr>
						<tr>
							<td>HARGA</td>
							<td><input type="text" name="harga" placeholder="Harga" class="form-control"></td>
						</tr>
						<tr>
							<td>STOK</td>
							<td><input type="text" name="stok" placeholder="Stok" class="form-control"></td>
						</tr>
						<tr>
							<td></td>
							<td>
								<button type="button" id="btn-tambah" onclick="tambahdata()" class="btn btn-primary">Tambah</button>
								<button type="button" data-dismiss="modal" class="btn btn-danger">Cancel</button>
							</td>
						</tr>
					</table>

				</div>
			</div>
		</div>

	</div>

	<script type="text/javascript">
		ambilData();

		function ambilData() {
			$.ajax({
				type: 'POST',
				url: '<?= base_url() . "index.php/page/ambildata"; ?>',
				dataType: 'json',
				// jika data sukses
				success: function(data) {
					var baris = '';
					// mengulang data untuk menampilkan database
					for (var i = 0; i < data.length; i++) {
						baris += '<tr>' +
							'<td>' + data[i].id + '</td>' +
							'<td>' + data[i].kode_barang + '</td>' +
							'<td>' + data[i].nama_barang + '</td>' +
							'<td>' + data[i].harga + '</td>' +
							'<td>' + data[i].stok + '</td>' +
							'</tr>';
					}
					// ambil dari id dan baris yang di ulang
					$('#targetData').html(baris);
				}
			});
		}

		function tambahdata() {
			// ambil value dari input name insert ke variable 
			var kode_barang =$("[name='kode_barang']").val();
			var nama_barang =$("[name='nama_barang']").val();
			var harga =$("[name='harga']").val();
			var stok =$("[name='stok']").val();

			$.ajax({
				type: 'POST',
				data: 'kode_barang='+kode_barang+'&nama_barang='+nama_barang+'&harga='+harga+'&stok='+stok,
				url: '<?= base_url().'index.php/page/tambahdata' ?>',
				dataType: 'json',
				// hasil di dapatkan dari echo json encode pada controller
				success: function(hasil) {
					console.log(hasil);
					// id pesan di isi dari parameter hasil dan pesan dari parsing controller
					// $("#pesan").html(hasil.pesan);
					// // jika hasil pesan kosong, modal hide
					// if(hasil.pesan==''){
					// 	$("#form").modal('hide');
					// 	ambilData();

					// 	$("[name='kode_barang']").val('');
					// 	$("[name='nama_barang']").val('');
					// 	$("[name='harga']").val('');
					// 	$("[name='stok']").val('');
					// }
				}
			});
		}
	</script>


	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
