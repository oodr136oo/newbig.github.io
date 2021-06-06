<!doctype html>
<html>
<head>
  <meta charset=utf8 /> 
  <title>加值新增服務</title> 

<link rel=StyleSheet type=text/css href=menu.css>
<script language="JavaScript" charset="utf8" src="menu.js"></script>
<style>
        kaiText
        {
            font-family : 微軟正黑體;
            font-size : 10px;
            text-align : left
            line-height: 40px;
        }
		#block2
{
	position:absolute;
	top:40px; 
	left:10px;
	width:700px;
	height:420px;
  background-image:url(https://pic1.zhimg.com/v2-97badd4730166a14ef8bfe69041fbcc5_720w.jpg?source=172ae18b);
    background-repeat:no-repeat;	

    background-size:cover;
	
}
    </style>
</head>
<body id="block2">
<?php

  error_reporting(E_ALL ^ E_DEPRECATED);
       $check =! empty($_POST["check"]) ? $_POST["check"] : null;
	   if ( $check != "yes")
	         {
	       
		  echo '
		  
		  <table border="1" bacolor="#CCFFFF">
		   <form action="bag4-0.php" method="post"  name="form1">
		   <h1>新增會員資料</h1>
            
			
			<h2>
    			<td><p>編碼:</td> 
				<td><input type="text" name="numm" id="numm" size="10" /> </p>  </td>  </tr>        
				
				<tr><td><p>身份證字號:</td> 
				<td><input type="text" name="sno" id="sno" size="10" /> </p></td></tr>
				
				<tr><td><p>姓名:</td> 
				<td><input type="text" name="name" id="name" size="10" /> 
				</p></td></tr>
				<tr><td><p>暱稱:</td> 
				<td><input type="text" name="nickname" id="nickname" size="10" /> 
				</p></td></tr>
				<tr><td><p>性別:</td> 
				<td><input type="radio" name="gender"   value="男" /> 男
				<input type="radio" name="gender"   value="女" /> 女</td> 
				</p></td></tr>
				<tr><td><p>生日:</td> 
				<td><input type="date" name="age" id="age" size="20" /> 
				</p></td></tr>
				<tr><td><p>電話:</td> 
				<td><input type="tel" name="phone" id="phone" size="10" pattern="[0-9]{4}-([0-9](6)" placeholder="0912-123456" required /> 
				</p>	</td></tr>			
				 <tr><td><p>地址:</td> 
				 
				 
				<td><input type="text" name="address" id="address" size="60" /> 
				</p></td></tr>
				<tr><td><p>電子信箱:</td> 
				<td><input type="email" name="email" id="email" size="40" value="@" /> 
				</p></td></tr>
				
                
				
				
				<tr><td><p>輸入:</td> 
				
				<td><input type="reset" name="reset" value="清除重寫" />				
				<input type="submit" name="submit" value="送出" /></td>

                <input type="hidden" name="check" id="check" value="yes" />
				</p>
			</h2>
				  </form> ';
				  	 echo '</table>';
	          }
		else
		{
				$numm =!empty($_POST["numm"]) ? $_POST["numm"] :null;
				$sno =!empty($_POST["sno"]) ? $_POST["sno"] :null;
			    $sno =!empty($_POST["sno"]) ? $_POST["sno"] :null;
				$name =!empty($_POST["name"]) ? $_POST["name"] :null;
				$nickname =!empty($_POST["nickname"]) ? $_POST["nickname"] :null;				
				$gender =!empty($_POST["gender"]) ? $_POST["gender"] :null;				
				$age =!empty($_POST["age"]) ? $_POST["age"] :null;					
				$phone =!empty($_POST["phone"]) ? $_POST["phone"] :null;
				$address =!empty($_POST["address"]) ? $_POST["address"] :null;
				$email =!empty($_POST["email"]) ? $_POST["email"] :null;				
				if ($name == "")
				{
					//echo '名字不可為空,請回上一頁<br>';
					//echo '<a href="bag4-0.php">回上一頁</a>';
					echo "<script>alert('名字不可為空,請重新填寫')</script>";
					echo "<script>location.href='bag4-0.php'</script>";
			
					
					
					
				}
				else
				{
					
					
					 
					$link = mysqli_connect('localhost','root','');
					mysqli_select_db($link ,"act");
					mysqli_query($link,"SET CHARACTER SET utf8;");
					
					$sql = "INSERT INTO student (numm ,sno, name,nickname,gender,age, phone, address,email) values ('$numm','$sno', '$name','$nickname','$gender','$age', '$phone', '$address', '$email')";
					mysqli_query($link,$sql) or die('SQL執行失敗</br><a href="bag4-0.php">回上一頁</a>');
					//mysql_close();
					
					echo "<script>alert('新增成功!')</script>";
					echo "<script>location.href='bag4-0.php'</script>";
					//echo "<p>新增成功!</p>";
					//echo '<a href="bag4-0.php">回上一頁</a>';
					
				}
		}
	   
    ?>
	
	</body>
	
	</html>
