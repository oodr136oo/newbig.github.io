<?php


    $username =$_GET['username'];
    $password =$_GET['password'];
    $address =$_GET['address'];	
    $age =$_GET['age'];		    
	$sex =$_GET['sex'];	
	
	//資料庫帳號密碼
	$link = mysqli_connect('localhost','root','');
	
	if(!$link){
		
		exit('失敗');
	}
	
	mysqli_set_charset($link,'utf8');
	
	//輸入你的資料庫名稱
	mysqli_select_db($link,'act');
	//into 到你的資料表名稱
	$sql="insert into bbs_user( username , password , address , sex, age )values('$username','
	$password','$address','$sex','$age')";
		echo $sql;



	
	
	$obj=mysqli_query($link , $sql);
	
	
	?>