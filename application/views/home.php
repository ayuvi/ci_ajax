<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $title; ?></title>
	<script type="text/javascript" src="<?= base_url().'assets/js/jquery-3.2.1.min.js'?>"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
	<div class="container">
		<h1>Data Barang</h1>
	</div>

	<table class="table">
		<thead>
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

	<script type="text/javascript">
	ambilData();
		function ambilData(){
			$.ajax({
				type:'POST',
				url:'<?= base_url()."index.php/page/ambildata"; ?>',
				dataType: 'json',
				success: function(data){
					var baris='';
					for(var i=0;i<data.length;i++){
						baris += '<tr>'+
								'<td>'+ data[i].id +'</td>' +
								'<td>'+ data[i].kode_barang +'</td>' +
								'<td>'+ data[i].nama_barang +'</td>' +
								'<td>'+ data[i].harga +'</td>' +
								'<td>'+ data[i].stok +'</td>' +
								'</tr>';
					}
					$('#targetData').html(baris);
				}
			})
		}
	</script>
	

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
