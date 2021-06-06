<?php
session_start();
define('_SHOP_NAME', '會員管理系統');
define('_DB_HOST', 'localhost');
define('_DB_ID', 'root');
define('_DB_PW', '');
define('_DB_NAME', 'act');
$dsn = "mysql:dbname=" ._DB_NAME .";host=" . _DB_HOST.  ";port=3306";
$username = _DB_ID;
$password = _DB_PW;
try {
   // 建立MySQL伺服器連接和開啟資料庫 
   $db = new PDO($dsn, $username, $password);
   $db->exec("set names utf8");
   // 指定PDO錯誤模式和錯誤處理
   $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   // echo "成功建立MySQL伺服器連接和開啟資料庫" . $dsn; 
} 
catch (PDOException $e) 
{
   echo "連接失敗: " . $dsn .$e;
}
function pic_upload($file_name)  //上傳圖片
{
	$j=-1;      
	foreach($_FILES as $file) //將每個圖檔上傳
	{
		$j=$j+1;
		
		$type=$file["type"];	
		
		if ($type=='image/JPEG' || $type=='image/jpeg' || $type=='image/PNG' || $type=='image/png' )
		{
			$filename1=$file_name  ;
		}
		else
		{
			$filename1=$file["name"];	
	    }	
		if(move_uploaded_file($file['tmp_name'], $filename1))
		{					
			$error = false;
		}				
	}
}
	
?>