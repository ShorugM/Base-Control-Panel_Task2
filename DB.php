<?php
ini_set ('display_errors', 1);
error_reporting (E_ALL & ~E_NOTICE);

$conn=mysqli_connect('localhost', 'root', '');

mysqli_query($conn,'CREATE DATABASE myDB;');
mysqli_select_db($conn, 'myDB');

// sql to create table
$sql = 'CREATE TABLE IF NOT EXISTS armcon (ID INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
slider1 INT,
slider2 INT,
slider3 INT,
slider4 INT,
slider5 INT,
slider6 INT, );';
mysqli_query($conn, $sql);
	$s1 = $_POST['s1'];
	$s2 = $_POST['s2'];
	$s3 = $_POST['s3'];
	$s4 = $_POST['s4'];
	$s5 = $_POST['s5'];
	$s6 = $_POST['s6'];
	
		if (isset($_POST['Save'])) {
		$sql = "INSERT INTO armcon(slider1,
		slider2,
		slider3,
		slider4,
		slider5,
		slider6) VALUES ('$s1','$s2','$s3','$s4','$s5','$s6');";
		if (mysqli_query($conn, $sql)) {
			echo "Updated";
		} else {
			echo "<br>" . mysqli_error($conn);
		}
		header('location:base_.html');
	}
	//-----------------------------------------------------------------
$sqll= 'CREATE TABLE IF NOT EXISTS arm_runinng (ID INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,run VARCHAR(20));';
mysqli_query($conn, $sqll);
	if (isset($_POST['Running'])) {
			$sql_ = "INSERT INTO arm_runinng('run') VALUES ('Running');";
		if (mysqli_query($conn, $sqll)) {
			echo "Updated";
		} else {
			echo "<br>" . mysqli_error($conn);
		}
		header('location:base_.html');
	}
mysqli_close($conn);

?>

<?php
session_start();
ini_set ('display_errors', 1);
error_reporting (E_ALL & ~E_NOTICE);

$conn=mysqli_connect('localhost', 'root', '');
//mysqli_query($conn,'CREATE DATABASE myDB;');
mysqli_select_db($conn, 'myDB');


// sql to create table
$sql = 'CREATE TABLE IF NOT EXISTS armbase (ID INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
Forward_ VARCHAR(10), Left_ VARCHAR(10) ,
 Stop_ VARCHAR(10) ,
 Right_ VARCHAR(10), 
 Backward_ VARCHAR(10) );';

mysqli_query($conn, $sql);


$msql = "SELECT * FROM armbase;";
$result = mysqli_query($conn, $msql);

if (mysqli_num_rows($result) != 0) {
//Left_
	if (isset($_POST['Left'])) {
		$sql = "UPDATE armbase SET Left_ = 'L';";
		if (mysqli_query($conn, $sql)) {
			echo "Updated";
		} else {
			echo "<br>" . mysqli_error($conn);
		}
        
        $sql = "SELECT * FROM armbase ;";
        $result = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_row($result)) {
    
        $_SESSION['D']= $row[2];
}
		header('location:SE.php ');
	}
//Stop_
if (isset($_POST['Stop'])) {
		$sql = "UPDATE armbase SET Stop_ = 'S';";
		if (mysqli_query($conn, $sql)) {
			echo "Updated";
		} else {
			echo "<br>" . mysqli_error($conn);
		}
        
        $sql = "SELECT * FROM armbase ;";
        $result = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_row($result)) {
    
        $_SESSION['D']= $row[3];
}
		header('location:SE.php ');
	}
//Right_
if (isset($_POST['Right'])) {
		$sql = "UPDATE armbase SET Right_ = 'R';";
		if (mysqli_query($conn, $sql)) {
			echo "Updated";
		} else {
			echo "<br>" . mysqli_error($conn);
		}
        
        $sql = "SELECT * FROM armbase ;";
        $result = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_row($result)) {
    
        $_SESSION['D']= $row[4];
}
		header('location:SE.php ');
	}
//Forward_
if (isset($_POST['Forward'])) {
		$sql = "UPDATE armbase SET Forward_ = 'F';";
		if (mysqli_query($conn, $sql)) {
			echo "Updated";
		} else {
			echo "<br>" . mysqli_error($conn);
		}
        
        $sql = "SELECT * FROM armbase ;";
        $result = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_row($result)) {
    
        $_SESSION['D']= $row[1];
}
		header('location:SE.php ');
	}
//Backward_
if (isset($_POST['Backward'])) {
		$sql = "UPDATE armbase SET Backward_ = 'B';";
		if (mysqli_query($conn, $sql)) {
			echo "Updated";
		} else {
			echo "<br>" . mysqli_error($conn);
		}
        
        $sql = "SELECT * FROM armbase ;";
        $result = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_row($result)) {
    
        $_SESSION['D']= $row[5];
}
		header('location:SE.php ');
	}
}

else{

		$sql = "INSERT INTO armbase(Forward_, Left_, Stop_, Right_,Backward_) VALUES ( '0', '0', '0','0', '0');";
	mysqli_query($conn, $sql);

	}

mysqli_close($conn);
?>