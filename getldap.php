<?php 

ob_start();

?>

<html>
  <body>

    <?php
		include 'function.php';
		$nik = $_POST['nik'];
		$password = $_POST['password'];

		$auth = 0;
		$ldapconfig['host'] = 'merahputih.telkom.co.id';
		$ldapconfig['authrealm'] = 'User Telkom POINT';

		if($nik !== "" AND $password !== "")
		{
			$ds = @ldap_connect($ldapconfig['host']);
			$r = @ldap_search($ds, " ", 'uid='. $nik);

			if($r)
			{
				$result = @ldap_get_entries($ds, $r);

				if(isset($result[0]))
				{
					$auth = 0.5;

					if(@ldap_bind($ds, $result[0]['dn'], $password))
					{
						$auth = $result[0]['cn'][0].'#un&mail#'.$result[0]['mail'][0];
					}
				}
			}
			else
			{
				$auth = 1;
			}
		}

		if($auth !== 0 AND $auth !== 0.5)
		{
			if($nik == '930357'){
				if($user = query("SELECT * FROM user WHERE username = '$nik'")){
					session_start();
					$_SESSION['$login'] = $user;
					$_SESSION['nik'] = $user['username'];
					header("location: index.php?nik=$nik", true, 301);
					ob_end_flush();
				}else{
					return [
						'error' => true,
						'pesan' => 'Username/Password Salah'
					];
				}
				
			}else{
				if($user = query("SELECT * FROM user WHERE username = '$nik'")){
					session_start();
					$_SESSION['$login'] = $user;
					$_SESSION['nik'] = $user['username'];
					header("location: homepage.php?nik=$nik", true, 301);
					ob_end_flush();
				}else{
					return [
						'error' => true,
						'pesan' => 'Username/Password Salah'
					];
				}
			}
			
		}
		else
		{
			echo "USER BELUM TERDAFTAR";
		}
?>


  </body>
</html>