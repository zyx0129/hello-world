<?php

   session_start();
   header("Content-type: text/html; charset=GB2312"); 
   include ("scripts.php");
   if($_SERVER["REQUEST_METHOD"] == "POST"){
	   $module=$_POST['module'];
	   $submitBy=$_POST['submitBy'];
	   $status=$_POST['status'];
	   $reason=mb_convert_encoding($_POST['reason'], "GB2312","UTF-8");
	   //$reason=$_POST['reason'];
   }
   //checkFile($id,$status,$reason);
    $servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "workflow";
	$conn = new mysqli($servername, $username, $password, $dbname);// ��������
	if ($conn->connect_error) { die(" [".date("Y h:i:s A")."] ���ݿ�����ʧ��: " . $conn->connect_error);} // �������
	else{
		$sql="UPDATE uploads_table SET status='".$status."',reason='".$reason."',checkedBy='".$_SESSION["username"]."' WHERE module='".$module."' AND submitBy='".$submitBy."'";
		if($conn->query($sql)){
			echo "�ɹ�����˽���ѷ������û�";
		}else{
			echo "Error:".$conn->error;
		}
	}
	$conn->close();
?>