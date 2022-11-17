<?php
    $i=1;
    $conn = mysqli_connect('localhost', 'root', '', 'telkom');;
    $nik = $_GET['nik'];
    $user = query("SELECT * FROM user WHERE username = $nik");
	if(ISSET($_POST['search'])){
		$date1 = $_POST['bulan'];
		$date2 = $_POST['tahun'];
		$query=mysqli_query($conn, "SELECT DISTINCT periode FROM periode WHERE periode LIKE '%$date1%' AND  periode LIKE '%$date2%'");
		$row=mysqli_num_rows($query);
	
		if($row>0){
			while($fetch=mysqli_fetch_array($query)){
?>
	<tr>
        <td><?= $i++?></td>
        <td style="text-align: left !important"><a href="laporan_detail1.php?nik=<?= $nik ?>&periode=<?= $fetch['periode'] ?>">Laporan Asset Bulan <?= $fetch['periode'] ?></a></td>

	</tr>
<?php
			}
		}else{
			echo'
			<tr>
				<td colspan = "4"><center>Record Not Found</center></td>
			</tr>';
		}
	}else{
		$query=mysqli_query($conn, "SELECT DISTINCT periode FROM periode ORDER BY periode");
		while($fetch=mysqli_fetch_array($query)){

			
?>
	<tr>
		<td><?= $i++?></td>
        <td style="text-align: left !important"><a href="laporan_detail1.php?nik=<?= $nik ?>&periode=<?= $fetch['periode'] ?>">Laporan Asset Bulan <?= $fetch['periode'] ?></a></td>
                  
	</tr>
<?php
		}
	}
?>