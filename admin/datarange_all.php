<?php
    $i=1;
    $conn = mysqli_connect('localhost', 'root', '', 'telkom');;
    $nik = $_GET['nik'];
    $user = query("SELECT * FROM user WHERE username = $nik");
	if(ISSET($_POST['search'])){
		$date1 = date("Y-m-d", strtotime($_POST['date1']));
		$date2 = date("Y-m-d", strtotime($_POST['date2']));
		$query=mysqli_query($conn, "SELECT DISTINCT periode FROM periode ORDER BY periode AND periode BETWEEN '$date1' AND '$date2'");
		$row=mysqli_num_rows($query);
		if($row>0){
			while($fetch=mysqli_fetch_array($query)){
?>
	<tr>
        <td><?= $i++?></td>
        <td style="text-align: left !important"><a href="laporan_detail1.php?nik=<?= $nik ?>&periode=<?= date("F Y", strtotime($fetch['periode'])) ?>">Laporan Asset Bulan <?= date("F Y", strtotime($fetch['periode'])) ?></a></td>

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
        <td style="text-align: left !important"><a href="laporan_detail1.php?nik=<?= $nik ?>&periode=<?= date("F Y", strtotime($fetch['periode'])) ?>">Laporan Asset Bulan <?= date("F Y", strtotime($fetch['periode'])) ?></a></td>
                  
	</tr>
<?php
		}
	}
?>