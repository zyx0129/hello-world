<?php
   date_default_timezone_set('prc');
   session_start();
   
   header("Content-type: text/html; charset=GB2312"); 
   include("scripts.php");
   include("FileUploader.php");
 
	$newfct=$_POST['newfct'];
	$description=$_POST['description'];
	$application=$_POST['application'];
	$new_module=$_POST['new_module'];
	$module_link=$_POST['module_link'];
	$submitBy=$_SESSION["username"];
	$apply_time=date('y-m-d H:i:m',time());
	$status="pending";

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "workflow";
	$conn = new mysqli($servername, $username, $password, $dbname);// ��������
	if ($conn->connect_error) { die(" [".date("Y h:i:s A")."] ���ݿ�����ʧ��: " . $conn->connect_error);} // �������
    else{
		$sql="INSERT INTO new_function_table VALUES ('$newfct','$description','$application','$apply_time','$new_module','$module_link','$submitBy','$status')";
		if($conn->query($sql)){
			echo "�������ύ���ȴ�����Ա���";
		}else{
			echo "Error:".$conn->error;
		}
    }
	$conn->close();
?>