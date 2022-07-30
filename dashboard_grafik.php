<?php

// koneksi database
include '../conf/koneksi.php';
session_start();
if(empty($_SESSION['admin'])){
	header('location: index.php');
}
$banding1 =mysqli_query($koneksi, "SELECT  Year(tgl_daftar) ,MONTHNAME(tgl_daftar), count(id_akun)  FROM user GROUP BY Year(tgl_daftar), month(tgl_daftar) ");
$banding2 =mysqli_query($koneksi, "SELECT  Year(tgl_daftar),MONTHNAME(tgl_daftar), count(id_akun)  FROM user GROUP BY Year(tgl_daftar), month(tgl_daftar) ");
?>

<!DOCTYPE html>
<html>

<head>
  <title></title>
  <!--cdn icon library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="../assets/css/dasboardadmin.css">

<script type="text/javascript" src="../chartjs/Chart.js"></script>
<link href= "https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
<style media="screen" type="text/css">
  .form{
    width: 1000px;
    margin: 0 auto;
    height: 600px;

  }
  a{
    color:white;
  }
  .header{
    text-align: right;
    width: 1330px;
  }
  h3{
    text-align: right;
    width: 1100px;
  }

  body {

  }
  .btnadmin {
    border-radius: 20px;
    background-color:white ;
    color:#E84C3D ;
  }
  .container {
      width: 90%;
      margin: 15px auto;
			margin-left: 250px;
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


<!-- HAMBURGER MENU -->
<input type="checkbox" id="check">
<label for="check">
  <i class="fa fa-bars" id="btn"></i>
  <i class="fa fa-times" id="cancle"></i>
</label>


<div class="semua">

</div>
<!-- SIDEBAR -->
<div class="sidebar">
  <header><img src="../fotoo/bintang12.png">
    <p>Admin</p>
  </header>
  <ul>
      <li><a href="#"><i class="Pelanggan"></i>Pelanggan</a></li>
      <li><a href="dgrafik_pembatalan.php"><i class="pembatalan"></i>pembatalan</a></li>
      <li><a href="dgrafik_situs.php"><i class="situs"></i>situs</a></li>
      <li><a href="dgrafik_kota.php"><i class="kota"></i>kota</a></li>
      <li><a href="../dasboard_admin.php"><i class="kembali"></i>Kembali</a></li>
  </ul>
</div>

<!-- TABLE -->

<div class="form">
  <div class="header">

 <img class="logo" src="../assets/img/logo.png" width="30%" alt="logo">
  </div>

  <div>
      <h3 style="color:white">DATA ORDER</h3 >
  </div>

  <div class="row">
    <div class="column middle" >
      <div class="container">
          <canvas id="myChart" width="100" height="100"></canvas>
      </div>
      <script>
          var ctx = document.getElementById("myChart");
          var myChart = new Chart(ctx, {
              type: 'bar',
              data: {
                  labels:  [<?php while ($b = mysqli_fetch_array($banding1)) { echo '"' . $b['MONTHNAME(tgl_daftar)'] .' , '. $b['Year(tgl_daftar)']. '",';}?>],
                  datasets: [{
                          label: 'Pelanggan',
                          data:  [<?php while ($p = mysqli_fetch_array($banding2)) { echo '"' . $p['count(id_akun)'] . '",';}?>],
                          backgroundColor: [
                              'rgba(255, 99, 132, 0.2)',
                              'rgba(54, 162, 235, 0.2)',
                              'rgba(255, 206, 86, 0.2)',
                              'rgba(75, 192, 192, 0.2)',
                              'rgba(153, 102, 255, 0.2)',
                              'rgba(255, 159, 64, 0.2)',
                              'rgba(255, 99, 132, 0.2)',
                              'rgba(54, 162, 235, 0.2)',
                              'rgba(255, 206, 86, 0.2)',
                              'rgba(75, 192, 192, 0.2)',
                              'rgba(153, 102, 255, 0.2)',
                              'rgba(255, 159, 64, 0.2)'
                          ],
                          borderColor: [
                              'rgba(255,99,132,1)',
                              'rgba(54, 162, 235, 1)',
                              'rgba(255, 206, 86, 1)',
                              'rgba(75, 192, 192, 1)',
                              'rgba(153, 102, 255, 1)',
                              'rgba(255, 159, 64, 1)',
                              'rgba(255, 99, 132, 0.2)',
                              'rgba(54, 162, 235, 0.2)',
                              'rgba(255, 206, 86, 0.2)',
                              'rgba(75, 192, 192, 0.2)',
                              'rgba(153, 102, 255, 0.2)',
                              'rgba(255, 159, 64, 0.2)'
                          ],
                          borderWidth: 1
                      }]
              },
              options: {
                  scales: {
                      yAxes: [{
                              ticks: {
                                  beginAtZero: true
                              }
                          }]
                  }
              }
          });
      </script>

    </div>
    </div>

</div>


<section></section>
</body>
</html>
