<?php
$userid=$_GET["userid"];
$con=mysqli_connect("localhost","sid3008","Sid@30082002","mysql");
if($con){

	$query="DELETE FROM customer WHERE cid=$userid";
	$result=mysqli_query($con,$query);
	if($result)
	{
		$message="Deleted";
		header("Location:homepage.php?message=".$message);
	}
	else{
		echo "Error in deletion";
	}
}
else{
	echo mysqli_error($con);
}

?>