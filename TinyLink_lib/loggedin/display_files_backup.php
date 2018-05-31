
<?php
   session_start();

   include ("../top.txt");
   include ("../scripts.php");
   include ("../display.txt");
   //display_files();
   $status=getUserStatus();
   $jsonFile = UPLOADEDFILES."uploadinfo.json";
   if (is_file($jsonFile)){
		 $workflow = json_decode(file_get_contents($jsonFile), true);
   }
   if($status=="ADMIN"){
	   //display_pending_uploads();?>
	   <fieldset style='text-align: center;width:600px'>
	   <legend  style='font-size: 22px' >Pending </legend>
	   <form action='/app/approved_action.php' method='POST'>
	   <table>
			<tr><th>文件名</th>
			<th>上传用户</th>
			<th>上传时间</th>
			<th>审核结果</th></tr>
		<?php
		 foreach($workflow["fileInfo"] as $key=>$thisFile){
			//$thisFile = $workflow["fileInfo"][$i];
			$filename=mb_convert_encoding($thisFile["fileName"], "GB2312", "UTF-8"); 
			if($thisFile["status"]=='pending'){ ?>
				<tr><td><a href='/app/loggedin/filetree.php?dir=<?php echo $thisFile['submittedBy']."\\".$thisFile['fileName'];?>'><?php echo $thisFile['fileName']?></a></td>
				<td><?php echo $thisFile["submittedBy"] ?></td>
				<td><?php echo date("Y-m-d H:i:s",filemtime(UPLOADEDFILES.$thisFile["submittedBy"]."\\".$thisFile['fileName']))?></td>
				<td><select id='check' onChange="checkSelect()">
							<option value='1' >Approve</option> 
							<option value='2' >Reject</option> 
					</select></td>
				<td><input type='text' id='hide' style='display:none'>
				<td><input type='button' value='确定' /></td>
				</tr><?php }} ?>
		</table>
		</form>
		</fieldset>
<?php
   }else if($status=="USER"){
	   display_my_uploads();
   }

   display_tinylink_libs("TinyLink");
?>
<script type="text/javascript">
	function checkSelect(){
		var checkResult = document.getElementById("check"); 
		alert("hello");
		if(checkResult.value=="2"){
			var hide = document.getElementById("hide"); 
			hide.style.display='block';
		}
	}
</script>
<?php
   include ("../bottom.txt");
?>