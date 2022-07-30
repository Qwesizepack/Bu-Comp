<?php
include 'conf/koneksi.php';
session_start();
if(empty($_SESSION['admin'])){
	header('location: index.php');
}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name= "viewport" content="width=device-width, initial-scale=1">
		<title>Admin</title>
		<link rel="stylesheet" type="text/css" href="css/admin.css">
		<link href= "https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">

		<style>
		a{
			color:white;
		}

		body {
			background-image: url("assets/img/background.jpg");
		}
		.btnadmin {
			border-radius: 20px;
			background-color:white ;
			color:#E84C3D ;
		}
		.tabeladmin{
			/* display: inline-block; */
			margin-left: auto;
			margin-right: auto;
			color: white;
			/* background-color:#E84C3D ; */
			max-width: 1440px;
			margin: 50px auto;
			width: 100%;
			text-align: center;
			border: 0px;
		}

		th{
			padding: 16px 6px;
		}

		td{
				padding: 50px 15px;
				border-radius: 12%;
		}

		table, th, td {
		border: 1px solid white;
		border-collapse: collapse;
		}
		</style>
    </head>
    <body>
        <div class="header">
		<img class="logo" src="assets/img/logo.png" width="30%" alt="logo">
        </div>

        <div class="navbar">

            <nav>
                <ul class="nav1">
					<button class="btnadmin"><a style="color:#E84C3D;" href="Admin/tambah_admin.php">Tambah </a></button>
					<button class="btnadmin"><a style="color:#E84C3D;" href="Admin/data_order.php">Orderan </a></button>
					<button class="btnadmin"><a style="color:#E84C3D;" href="Admin/grafik_pelanggan.php">Grafik </a></button>
                    <button class="btnadmin"><a  style="color:#E84C3D;" href="Logout.php">Logout</a></button>
                </ul>
            </nav>
        </div>
        <div class="row">
            <div class="column middle" >
                <table style= "color:white ; border:2px; border:1px solid white;" class="tabeladmin">
                    <tr>
                      <th>id_produk</th>
                      <th>kategori</th>
                      <th>title</th>
                      <th>artist</th>
                      <th>release</th>
                      <th>genre</th>
                      <th>deskripsi</th>
                      <th>harga</th>
                      <th>stok</th>
					  <th>views</th>
					  <th>foto</th>
					</tr>
					  <?php
						$sql=mysqli_query($koneksi,"SELECT * FROM produk");
						while ($data=mysqli_fetch_array($sql)){
						?>
						</tr>
							<td><?=$data['id_produk']?></td>
							<td><?=$data['kategori']?></td>
							<td><?=$data['title']?></td>
							<td><?=$data['artist']?></td>
							<td><?=$data['release']?></td>
							<td><?=$data['genre']?></td>
							<td><?=$data['deskripsi']?></td>
							<td><?=$data['harga']?></td>
							<td><?=$data['stok']?></td>
							<td><?=$data['views']?></td>
							<td><?="<img src='Album Data/".$data['image']."'style='width:200px;'>"?></td>
							<td>
								<button class="btnadmin"><a href="Admin/edit_admin.php?id=<?php echo $data['id_produk']; ?>"style="color: #E84C3D;" >EDIT</a></button>
								<button class="btnadmin"><a href="Admin/hapus_aksi.php?id=<?php echo $data['id_produk']; ?>" style="color: #E84C3D;">HAPUS</a></button>
							</td>
						</tr>
						<?php }?>
                  </table>

            </div>
          </div>
    </body>
</html>
