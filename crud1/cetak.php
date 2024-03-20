<?php  
session_start();
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
?>

	<script type="text/javascript">
	window.print() 
	</script>
    
	<style type="text/css">
	#print {
		margin:auto;
		text-align:center;
		font-family:"Calibri", Courier, monospace;
		width:1200px;
		font-size:14px;
	}
	#print .title {
		margin:20px;
		text-align:right;
		font-family:"Calibri", Courier, monospace;
		font-size:12px;
	}
	#print span {
		text-align:center;
		font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;	
		font-size:18px;
	}
	#print table {
		border-collapse:collapse;
		width:100%;
		margin:10px;
	}
	#print .table1 {
		border-collapse:collapse;
		width:90%;
		text-align:center;
		margin:10px;
	}
	#print table hr {
		border:3px double #000;	
	}
	#print .ttd {
		float:right;
		width:250px;
		background-position:center;
		background-size:contain;
	}
	#print table th {
		color:#000;
		font-family:Verdana, Geneva, sans-serif;
		font-size:12px;
	}
	#logo{
		width:111px;
		height:90px;
		padding-top:10px;	
		margin-left:10px;
	}

	h2,h3{
		margin: 0px 0px 0px 0px;
	}
	</style>

	<title>Laporan Cetak</title>
    <div id="print">
	<table class='table1'>
			<tr>
<td>
<td><h3>LAPORAN DATA ANGGOTA</h3></td>
	</tr>
</table>
	
<table class='table'>	
<td><hr /></td>

</table>

<tr>
<td>
<table border='1' class='table' width="90%">
<tr>
<th width="30">No.</th>
<th>ID Anggota</th>
<th>Username</th>
<th>Password</th>
<th>Nama</th>
<th>Alamat</th>
<th>Email</th>
<th>No. HP</th>
</tr>
 </thead>
        <?php
        include "koneksi.php";
        $sql="select * from anggota order by id_anggota desc";

        $hasil=mysqli_query($kon,$sql);
        $no=0;
        while ($data = mysqli_fetch_array($hasil)) {
            $no++;

            ?>
            <tbody>
            <tr>
                <td><?php echo $no;?></td>
				<td><?php echo $data["id_anggota"]; ?></td>
                <td><?php echo $data["username"]; ?></td>
				<td><?php echo $data['password']; ?></td>
				<td><?php echo $data["nama"];   ?></td>
                <td><?php echo $data["alamat"];   ?></td>
                <td><?php echo $data["email"];   ?></td>
                <td><?php echo $data["no_hp"];   ?></td>

            </tr>
            </tbody>
            <?php
        }
        ?>
</tr>
</table>
</tr>
</table>
</div>
<div id="print">
<table width="450" align="right" class="ttd">
<tr>
<td width="100px" style="padding:20px 20px 20px 20px;" align="center">
<strong>STMIK Masa Depan,</strong>
      <br><br><br><br>
<strong><u>TTD</u><br></strong><small></small>
</td>
</tr>
</table>
</div>