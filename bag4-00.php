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

<?php





  //------分
          $page = empty($_GET['page']) ? 1 : $_GET['page'];
           
  //------分

                    $id =! empty($_GET["id"]) ? $_GET["id"] : "";				
					$link = mysqli_connect('localhost','root','');
					

					
					if (!$link)					
					{
						exit('錯誤');
					}
					
					mysqli_set_charset($link ,'utf8');					
					mysqli_select_db($link ,'act');
//分頁設定22222222-----------------

 $sql = "SELECT count(*) as count FROM student";
  $result = mysqli_query($link,$sql);

/*if (!$result) {
    die(mysqli_error($link)); 
}
*/

//$result = mysqli_query($link,$sql);

  $per_total = mysqli_fetch_assoc($result);  //計算總筆數
  $per_total1 = mysqli_num_rows($result);

  $count = $per_total['count'];
  
  $per = 10;  //每頁筆數
  $pages = ceil($count/$per);  //計算總頁數;ceil(x)取>=x的整數,也就是小數無條件進1法


  if(!isset($_GET['page'])){  //!isset 判斷有沒有$_GET['page']這個變數
  	  $page = 1;	  
  }else{
	  $page = $_GET['page'];
  }

  $start = ($page-1) * $per;  //每一頁開始的資料序號(資料庫序號是從0開始)
  
  $page_start = $start +1;  //選取頁的起始筆數
  $page_end = $start + $per;  //選取頁的最後筆數
  if($page_end>$per_total){  //最後頁的最後筆數=總筆數
	 $page_end = $per_total;

  }

  
 // $result = mysqli_query($link,$sql.' LIMIT '.$start.', '.$per) or die('MySQL query error'); //讀取選取頁的資料
/*
  $page_start = $start +1;  //選取頁的起始筆數
  $page_end = $start + $per;  //選取頁的最後筆數
  if($page_end>$per_total){  //最後頁的最後筆數=總筆數
	 $page_end = $per_total;
  }
  */
 
  
  
  //222222222------------------------				
	
//分頁設定-----------------
/*
 $sql = "SELECT * FROM student";
  $result = mysqli_query($link,$sql) or die('MySQL query error');

if (!$result) {
    die(mysqli_error($link)); 
}


$result = mysqli_query($link,$sql);

  $per_total = mysqli_num_rows($result);  //計算總筆數
  

  
  
  $per = 5;  //每頁筆數
  $pages = ceil($per_total/$per);  //計算總頁數;ceil(x)取>=x的整數,也就是小數無條件進1法

  if(!isset($_GET['page'])){  //!isset 判斷有沒有$_GET['page']這個變數
  	  $page = 1;	  
  }else{
	  $page = $_GET['page'];
  }

  $start = ($page-1)*$per;  //每一頁開始的資料序號(資料庫序號是從0開始)
  

  
  $result = mysqli_query($link,$sql.' LIMIT '.$start.', '.$per) or die('MySQL query error'); //讀取選取頁的資料

  $page_start = $start +1;  //選取頁的起始筆數
  $page_end = $start + $per;  //選取頁的最後筆數
  if($page_end>$per_total){  //最後頁的最後筆數=總筆數
	 $page_end = $per_total;
  }
  */
  //------------------------
//$sql = "SELECT * FROM student" ;
  	     $sql = " SELECT * FROM student LIMIT " . $start . ',' . $per ; 

		 
	   if ( $id=="" )
	         {
	       
		  echo '
		
		   <table border="1" bacolor="#CCFFFF">
		   
            
          <tr>
                <td width="50" align="center">序號</td>
				<td width="50" align="center">編號</td>
				<td width="120" align="center">身份證字號</td>				
				<td width="120" align="center">姓名</td>
				
				<td width="120" align="center">暱稱</td>
				<td width="220" align="center">性別</td>
				<td width="120" align="center">生日</td>				
				
				<td width="120" align="center">電話</td>
				<td width="120" align="center">地址</td>
				<td width="200" align="center">電子信箱</td>
				<td width="120" align="center">功能</td>
		  </tr>';
		  			
					
 
	
				//$sql = "SELECT * FROM student " ;
				$obj = mysqli_query($link,$sql);
				/*	if (!$obj) {
    die(mysqli_error($link)); 
}
		 */
			$num = mysqli_num_rows($obj);
				

		
//while($row = mysqli_fetch_assoc($obj)){
				for ( $i=1; $i<=$num; $i++)
				{
					$row = mysqli_fetch_row($obj);
					$id = $row[0];
					$numm = $row[1];					
					$sno = $row[2];

					$name = $row[3];
					$nickname = $row[4];
					$gender = $row[5];
					$age = $row[6];
					$phone = $row[7];
					$address = $row[8];
					$email = $row[9];					
					echo "<tr><form>";
					echo "<td align='center'>$i</td>";
					echo "<td align='center'><input type='text' name='nnn' value='$numm' size='10' /></td>";
					echo "<td align='center'><input type='text' name='s' value='$sno' size='10' /></td>";
					
					echo "<td align='center'><input type='text' name='n' value='$name' size='8' /></td>";					
					echo "<td align='center'><input type='text' name='nn' value='$nickname' size='8' /></td>";
					echo "<td align='center'><input type='text' name='g' value='$gender' size='5' /></td>";
					
					echo "<td align='center'><input type='date' name='a' value='$age' size='8' /></td>";	
					echo "<td align='center'><input type='text' name='p' value='$phone' size='10' /></td>";						
					echo "<td align='center'><input type='text' name='add' value='$address' size='50' /></td>";						
					echo "<td align='center'><input type='email' name='e' value='$email' size='30' /></td>";
					
					
					
					
					echo "<td align='center'><input type='submit' name='Submit' value='修改' />
					                        <input type='submit' name='Submit' value='刪除' />
					                        <input type='hidden' name='id' value='$id' />
					                 </td>";		
                   echo "</form></tr>";
					
				}
				 echo '</table>';
				 echo '<br>';

				 
				 				//每頁顯示筆數明細
				echo '目前第 '.$page_start.' 到第 '.$page_end.' 筆 總筆數共 '.$count.' 筆，目前在第 '.$page.' 頁 總頁數共 '.$pages.' 頁';
				if($pages>1){  
				//總頁數>1才顯示分頁選單
				}
                echo '<br>';
				echo '<br>';
				echo '<br>';
			/*	 
				$next = $page + 1;
				$prev = $page - 1;
				*/
				
				
				//////判斷左(右)頁籤數是否足夠設定的分頁數，不夠就增加右(左)頁數，以保持總顯示分頁數目。
     if($pages>1){  //總頁數>1才顯示分頁選單

	//分頁頁碼；在第一頁時,該頁就不超連結,可連結就送出$_GET['page']
	if($page=='1'){
		echo "首頁 ";
		echo "上一頁 ";		
	}else{
		echo "<a href=?page=1>首頁 </a> ";
		//echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";	
		echo "<a href=?page=".($page-1).">上一頁 </a> ";
       // echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";	
	}

   //此分頁頁籤以左、右頁數來控制總顯示頁籤數，例如顯示5個分頁數且將當下分頁位於中間，則設2+1+2 即可。若要當下頁位於第1個，則設0+1+4。也就是總合就是要顯示分頁數。如要顯示10頁，則為 4+1+5 或 0+1+9，以此類推。	
     for($i=1 ; $i<=$pages ;$i++){ 
        $lnum = 2;  //顯示左分頁數，直接修改就可增減顯示左頁數
        $rnum = 2;  //顯示右分頁數，直接修改就可增減顯示右頁數

   //判斷左(右)頁籤數是否足夠設定的分頁數，不夠就增加右(左)頁數，以保持總顯示分頁數目。
     if($page <= $lnum){
         $rnum = $rnum + ($lnum-$page+1);
     }

     if($page+$rnum > $pages){
         $lnum = $lnum + ($rnum - ($pages-$page));
     }

        //分頁部份處於該頁就不超連結,不是就連結送出$_GET['page']
          if($page-$lnum <= $i && $i <= $page+$rnum){
              if($i==$page){
                 echo $i.' ';
                      }else{
                          echo '<a href=?page='.$i.'>'.$i.'</a> ';
						  //echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";	
                   }
              }
          }


	//在最後頁時,該頁就不超連結,可連結就送出$_GET['page']	
	if($page==$pages){
		echo " 下一頁";
		echo " 末頁";	
		
	}else{
		echo "<a href=?page=".($page+1)."> 下一頁</a>";
		//echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";	
		echo "<a href=?page=".$pages."> 末頁</a>";	
        //echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";			
	}
  }
          
				
			//---------------	
				
				
				 


//}
				
	          }
			  

			  
		else
		{
			    //$sno =!empty($_GET["sno"]) ? $_GET["sno"] :null;			
				$nnn =!empty($_GET["nnn"]) ? $_GET["nnn"] :null;	
				$s =!empty($_GET["s"]) ? $_GET["s"] :null;
				
				$n =!empty($_GET["n"]) ? $_GET["n"] :null;
				$nn =!empty($_GET["nn"]) ? $_GET["nn"] :null;				
				$g =!empty($_GET["g"]) ? $_GET["g"] :null;
				$a =!empty($_GET["a"]) ? $_GET["a"] :null;
				$p =!empty($_GET["p"]) ? $_GET["p"] :null;
				$add =!empty($_GET["add"]) ? $_GET["add"] :null;				
				$e =!empty($_GET["e"]) ? $_GET["e"] :null;				
				$Submit =!empty ($_GET["Submit"]) ? $_GET["Submit"] :null;


		

				



				$msg ='';
				

				
				
				if ($Submit == '修改')
				{
					$sql = "UPDATE `student` SET    `numm`='$nnn' , `sno`='$s' ,  `name`='$n' ,  `nickname`='$nn', `gender`='$g',  `age`='$a',  `phone`='$p' , `address`='$add' , `email`='$e'    
					WHERE `id`=$id" ;
										
				 //警告視窗			
					echo "<script>alert('修改完成!'); location.href='bag4-00.php';</script>";
										
										
										
					//echo "<script>alert('修改完成!')</script>";
					//echo "<script>location.href='bag4-00.php'</script>";

					
					//$msg ='修改完成';
					
				}
				else if( $Submit == '刪除')
				{
					$sql = "DELETE FROM `student`  WHERE `id`=$id " ;
					 //警告視窗
					echo "<script>alert('刪除完成!')</script>";
					echo "<script>location.href='bag4-00.php'</script>";
					
					//$msg ='刪除完成';
					
				}	
				
				else 
				{
					 echo '操作錯誤1';
									
					return;
					
				}	
				

					 
					
					mysqli_query($link,$sql) or die('SQL執行失敗</br><a href="bag4-1.html">回查詢頁面</a></br><a href="bag4-0.php">回新增頁面</a>');
					
					echo $msg;
					
	

/*
	//分頁頁碼；在第一頁時,該頁就不超連結,可連結就送出$_GET['page']
	if($page=='1'){
		echo "首頁 ";
		echo "上一頁 ";		
	}else{
		echo "<a href=?page=1>首頁 </a> ";
		echo "<a href=?page=".($page-1).">上一頁 </a> ";		
	}

   //此分頁頁籤以左、右頁數來控制總顯示頁籤數，例如顯示5個分頁數且將當下分頁位於中間，則設2+1+2 即可。若要當下頁位於第1個，則設0+1+4。也就是總合就是要顯示分頁數。如要顯示10頁，則為 4+1+5 或 0+1+9，以此類推。	
     for($i=1 ; $i<=$pages ;$i++){ 
        $lnum = 2;  //顯示左分頁數，直接修改就可增減顯示左頁數
        $rnum = 2;  //顯示右分頁數，直接修改就可增減顯示右頁數

   //判斷左(右)頁籤數是否足夠設定的分頁數，不夠就增加右(左)頁數，以保持總顯示分頁數目。
     if($page <= $lnum){
         $rnum = $rnum + ($lnum-$page+1);
     }

     if($page+$rnum > $pages){
         $lnum = $lnum + ($rnum - ($pages-$page));
     }

        //分頁部份處於該頁就不超連結,不是就連結送出$_GET['page']
          if($page-$lnum <= $i && $i <= $page+$rnum){
              if($i==$page){
                 echo $i.' ';
                      }else{
                          echo '<a href=?page='.$i.'>'.$i.'</a> ';
                   }
              }
          }


	//在最後頁時,該頁就不超連結,可連結就送出$_GET['page']	
	if($page==$pages){
		echo " 下一頁";
		echo " 末頁";	
	}else{
		echo "<a href=?page=".($page+1)."> 下一頁</a>";
		echo "<a href=?page=".$pages."> 末頁</a>";		
	}*/
	
	
	
  }
				
				mysqli_close($link);
				

	   
    ?>
	
	

  
 	
	<body id="block2">
	
	<!--
	<h5>
	
	<a href="bag4-00.php?page=1">首頁</a>&nbsp;&nbsp;&nbsp;
	<a href="bag4-00.php?page=<?php echo $prev;?>">上一頁</a>&nbsp;&nbsp;&nbsp;
	<a href="bag4-00.php?page=<?php echo $next;?>">下一頁</a>&nbsp;&nbsp;&nbsp;
	<a href="bag4-00.php?page=<?php echo $pages;?>">末頁</a>&nbsp;&nbsp;&nbsp;
	</h5>	
	-->

	<h2>
	<p><a href="bag4-0.php">回新增頁面</a> </br>
	<a href="bag4-1.html">回查詢頁面</a>
	</h2>
	

	
	
	
	</body>
	
	</html>
