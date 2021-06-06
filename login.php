<?php
include('DB_connect.php');
$re = [];
$re['status'] = "error";

if (!empty($_POST['uname']) && !empty($_POST['password']) && !empty($_POST['checkCode'])) 
{
    $uname = $_POST['uname'];
    $password = $_POST['password'];
    $checkCode = $_POST['checkCode'];
}

//帳號.密碼.驗證碼都要有資料才會驗證
if (isset($uname) && isset($password) && isset($checkCode)) 
{
    //user_login改為妳的資料表名稱
    $usertable = new setTable("users");     
    $result = $usertable->findByKeyValue("f_user_id",$uname);   
    if($result)
	{
		//檢視密碼是否相符
		if ($password == $result[0]["f_passwd"]) {
			$re['status'] = "login";
			$re['result_data']=$result;
		}
	}		
  
} 
echo json_encode($re);


