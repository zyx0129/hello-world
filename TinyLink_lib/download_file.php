<?php

   //include ("../WFDocument.php");
	include ("scripts.php");
 
    //$filetype = $_GET['filetype'];
    $file = $_GET['file'];
	download($file);
    //$filepath = UPLOADEDFILES.$file;
	

   //��ȡ�ļ��б�
   /*function list_dir($dir){
	  $result = array();
	  if (is_dir($dir)){
			$file_dir = scandir($dir);
			foreach($file_dir as $file){
				if ($file == '.' || $file == '..'){
				continue;
				}else if (is_dir($dir.$file)){
					$result = array_merge($result, list_dir($dir.$file.'/'));
				}else{
					array_push($result, $dir.$file);
				}
			}
	   }
	   return $result;
	}
	 
	//��ȡ�б� 
	$datalist=list_dir($filepath);*/
	//$filename = "./bak.zip"; //�������ɵ��ļ�������·����
	//$filename = strstr($file,"\\").".zip"; //�������ɵ��ļ�������·���� 
	//createZip($filepath,$filename);
	/*if(!file_exists($filename)){  
	//���������ļ�  
	  $zip = new ZipArchive();//ʹ�ñ��࣬linux�迪��zlib��windows��ȡ��php_zip.dllǰ��ע��  
	  if ($zip->open($filename, ZIPARCHIVE::CREATE)!==TRUE) {  
		exit('�ļ�����ʧ��');
	  }  
	  foreach( $datalist as $val){
		//echo $val."</br>";
		if(file_exists($val)){  
		  $zip->addFile( $val, basename($val));//�ڶ��������Ƿ���ѹ�����е��ļ����ƣ�����ļ����ܻ����ظ�������Ҫע��һ��  
		}  
	  }  
	  $zip->close();//�ر�  
	}  
	if(!file_exists($filename)){  
	  exit("�޷��ҵ��ļ�"); //��ʹ���������п���ʧ�ܡ�������  
	}  */
	

   //$wfdocument = new WFDocument($filename, $filetype);
   //$wfdocument->download();

?>