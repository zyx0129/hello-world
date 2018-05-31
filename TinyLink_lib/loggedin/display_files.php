
<?php
   session_start();
   header("Content-type: text/html; charset=gb2312"); 
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
	   display_pending_uploads();
   }else if($status=="USER"){
	   display_my_uploads();
   }

   display_tinylink_libs("TinyLink");
?>
<script type="text/javascript">
	function checkSelect(e){
		var ev = e || window.event;  
        var target = ev.target || ev.srcElement;  
		var hide = target.parentNode.nextSibling.firstChild;
		if(target.value=="Reject"){
			hide.style.display='block';
		}else{
			hide.style.display='none';
		}
	}

	function pass(e){
		var ev = e || window.event;  
        var target = ev.target || ev.srcElement; 
		
		var tr = target.parentNode.parentNode;
		var table=tr.parentNode;
		var status=tr.childNodes[3].firstChild.value;
		var reason=tr.childNodes[4].firstChild.value;
		alert (status);
		alert (reason);
		
		table.removeChild(tr);
		var xmlhttp;
		if (window.XMLHttpRequest)
	   {	// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
	   }else
	   {	// code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	   }
	   var data = new FormData();  
	   xmlhttp.onreadystatechange = function(ev){  
			if (xmlhttp.readyState==4){  
				alert(xmlhttp.responseText);
                //document.getElementById("info").innerText=xmlhttp.responseText;  
            }  
       };  
	   data.append('id', tr.id);  
       data.append('status',status);
	   data.append('reason',reason);
	   xmlhttp.open("POST","/app/checkfile_action.php", true);  
       xmlhttp.send(data);  
	}
</script>
<?php
   include ("../bottom.txt");
?>