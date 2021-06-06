<?php
// XML文件
   header("Content-Type: text/xml;charset=utf8");
   //部門維護
   error_reporting(0); 
   require_once('DB_connect.php'); // Connect to the database.
	$f_user_id1=$_SESSION["f_user_id"];   
	$input_date = date("Y-m-d H:i:s",mktime());
    $ip=$_SERVER['REMOTE_ADDR'];	
	$f_custom_id       =$_POST["f_custom_id"];                  
	$f_custom_name     =$_POST["f_custom_name"];  	
	$f_custom_addr     =$_POST["f_custom_addr"];
	$f_custom_tel      =$_POST["f_custom_tel"];
	$f_custom_line     =$_POST["f_custom_line"];
	$f_custom_celephone=$_POST["f_custom_celephone"];	
	$f_custom_email    =$_POST["f_custom_email"];	
	$f_custom_connector=$_POST["f_custom_connector"];
	$f_custom_fax      =$_POST["f_custom_fax"];
	$f_company_id   =$_POST["f_company_id"];
	$f_post      =$_POST["f_post"];
	//$f_bank_acc_name1  =$_POST["f_bank_acc_name1"];
	//$f_bank_acc_no1    =$_POST["f_bank_acc_no1"];
	$f_open_invoice      =$_POST["f_open_invoice"];
	//$f_bank_acc_name2  =$_POST["f_bank_acc_name2"];
	//$f_bank_acc_no2    =$_POST["f_bank_acc_no2"];
	$f_mark            =$_POST["f_mark"];
	$query_method	   =$_POST["query_method"];
	$page_no		   =$_POST["page_no"];
	$sel_type          =$_POST["sel_type"];
	$sno               =$_POST["sno"];
	$out               =$_POST["out"];
	$query_buf         =$_POST["query_buf"];
	$per_page		   =$_POST["per_page"];
    $f_custom_name1="";
 //  $out=iconv("utf-8", "big5",$_POST["out"]);
 //  $out='登入';
	$pri_echo ="n".$f_identity1 ; 
    $display="y";
	$up_line="";
	$down_line="";
	switch($out)
    {
		case '刪除' :		
			$sql="delete from custom where sno = $sno";  //刪除		
			$db->query($sql);				
			$pri_echo ="刪除成功" ;		
			break;
		case '修改' :
			$input_date = date("Y-m-d",mktime());
			$year=date("y");
			$month=date("m");
			$defaut_date=$year.$month;
			$update_flg="f";						
			$sql="update  custom  set ";
			$sql.="f_custom_email='$f_custom_email',";	
			$sql.="f_custom_name='$f_custom_name',";
			$sql.="f_custom_celephone='$f_custom_celephone',";
			$sql.="f_custom_tel='$f_custom_tel',";					
			$sql.="f_custom_addr='$f_custom_addr',";      
			$sql.="f_custom_line='$f_custom_line',"; 					
			$sql.="f_c_date='$input_date',";
			$sql.="f_custom_connector='$f_custom_connector',";
			$sql.="f_custom_fax      ='$f_custom_fax',";
			$sql.="f_company_id   ='$f_company_id',";
			$sql.="f_post      ='$f_post',";
			//$sql.="f_bank_acc_name1  ='$f_bank_acc_name1',";
			//$sql.="f_bank_acc_no1    ='$f_bank_acc_no1',";
			$sql.="f_open_invoice      ='$f_open_invoice',";
			//$sql.="f_bank_acc_name2  ='$f_bank_acc_name2',";
			//$sql.="f_bank_acc_no2    ='$f_bank_acc_no2',";
			$sql.="f_user_id         ='$f_user_id1',";
			$sql.="f_mark            ='$f_mark'";
			$sql.=" where sno=$sno";
			$db->query($sql);
			$pri_echo ="客戶更改完成" .$sql;			
			break;		
        case '新增' :
		    $input_date = date("Y-m-d",mktime());
			$year=date("y");
			$month=date("m");
			$defaut_date=$year.$month;
			$f_custom_id_beg=substr($f_custom_id,0,2);			
			$sql="select * from custom where f_custom_id like '$f_custom_id_beg%' order by f_custom_id DESC";  //判斷是否有使用者帳號    
			$result =$db->query($sql); 
			$sn_index = $result->rowCount();   //查詢結果的記錄筆數			
			if ($sn_index>0) 
			{
				$row=$result->fetch(PDO::FETCH_ASSOC);				
				$f_custom_id=substr($row["f_custom_id"],2);
				$f_custom_id_int=(int) $f_custom_id;
				$f_custom_id_int=$f_custom_id_int+1;
				//str_pad ( string $input , int $pad_length [, string $pad_string = " " [, int $pad_type = STR_PAD_RIGHT ]] )
				switch (true)
				{
				case $f_custom_id_int<10 :
				     $f_custom_id=$f_custom_id_beg ."00" .($f_custom_id_int);
				     break;
				case $f_custom_id_int<100 :
				     $f_custom_id=$f_custom_id_beg ."0" .($f_custom_id_int);
				     break;	
				case $f_custom_id_int<1000 :
				     $f_custom_id=$f_custom_id_beg  .($f_custom_id_int);
				     break;		
				}				
			}
			else
			{					
				$f_custom_id=$f_custom_id_beg . "001";					
			}
			$sql="insert into custom  (f_custom_email,f_custom_id,f_custom_name,f_custom_celephone,f_custom_tel,";
			$sql.="f_custom_addr,f_custom_line,f_custom_connector,f_custom_fax,f_company_id ,f_post,";
			$sql.="f_open_invoice,f_mark,f_c_date,f_user_id) values(";			
			
			//$sql.="f_bank_acc_name1,f_bank_acc_no1,f_open_invoice,f_bank_acc_name2,f_bank_acc_no2,f_mark,f_c_date,f_user_id) values(";			
			$sql.="'$f_custom_email',";
			$sql.="'$f_custom_id',";    
			$sql.="'$f_custom_name',";  
			$sql.="'$f_custom_celephone',";
			$sql.="'$f_custom_tel',";					
			$sql.="'$f_custom_addr',";      
			$sql.="'$f_custom_line',";
			$sql.="'$f_custom_connector',";
			$sql.="'$f_custom_fax',";      
			$sql.="'$f_company_id',";   
			$sql.="'$f_post',";      
			//$sql.="'$f_bank_acc_name1',";  
			//$sql.="'$f_bank_acc_no1',";    
			$sql.="'$f_open_invoice',";      
			//$sql.="'$f_bank_acc_name2',";  
			//$sql.="'$f_bank_acc_no2',";    
			$sql.="'$f_mark',";
			$sql.="'$input_date',";
			$sql.="'$f_user_id1')";
			$db->query($sql);
			$pri_echo ="客戶新增完成";
			break;
         case "chk" :	
			$today1= date("Y-m-d",mktime());
			break;
    }
	$sql1="select * from custom where ";  //判斷是否重複
	switch($query_method)
	{
	case "mail查詢":  
		$sql1 .=" f_custom_email like '$query_buf%' order by f_custom_email ";  
		break;
	case "編號查詢":
		$sql1 .=" f_custom_id like '$query_buf%' order by f_custom_id ";
		break;
	case "統編查詢":
		$sql1 .=" f_company_id like '$query_buf%' order by f_company_id ";
		break;
	case "聯絡人查詢":
		$sql1 .=" f_custom_connector like '$query_buf%' order by f_custom_connector ";
		break;
	case "公司名查詢": 
		$sql1 .=" f_custom_name like '%$query_buf%' order by f_custom_name"; 				
		break;
	case "住址查詢":
		$sql1 .=" f_custom_addr like '%$query_buf%' order by f_custom_addr";
		break;		
	case "電話查詢":  
		$sql1 .=" f_custom_tel like '$query_buf%' order by f_custom_tel";
		break;
	case "line查詢": 
		$sql1 .=" f_custom_line like '$query_buf%' order by f_custom_line";
		break;
	case "手機查詢":
		$sql1 .=" f_custom_celephone like '$query_buf%' order by f_custom_celephone";
		break;
	}
	$result =$db->query($sql1); 
	$query_tot_num = $result->rowCount();
	if($page_no<2)
	{	
		$sql1 .="  limit 0," . $per_page ;
	}
	else
	{
		$from=($page_no-1)* $per_page;					 
		$sql1 .="  limit $from," . $per_page ;					
	}
	$result =$db->query($sql1); 
	$sn_index = $result->rowCount();	
	echo '<?xml version="1.0" encoding="utf8"?> ';
	echo "<root>";
//	echo "<res_echo>$query_buf $pri_echo $sql1   $sn_index  $query_tot_num</res_echo>";	
    echo "<res_echo>$pri_echo</res_echo>";	
	echo "<query_tot_num>" . $query_tot_num . "</query_tot_num>";
	for ($i=0;$i<$sn_index;$i++)
	{
		$row=$result->fetch(PDO::FETCH_ASSOC) ;
		$f_custom_email     =$row["f_custom_email"];
		$f_custom_id        =$row["f_custom_id"];
		$f_custom_name      =$row["f_custom_name"];
		$f_custom_addr      =$row["f_custom_addr"];
		$f_custom_tel       =$row["f_custom_tel"];
		$f_custom_celephone =$row["f_custom_celephone"];
		$f_custom_line      =$row["f_custom_line"];
		
		$f_custom_connector=$row["f_custom_connector"];
		$f_custom_fax      =$row["f_custom_fax"];
		$f_company_id   =$row["f_company_id"];
		$f_post      =$row["f_post"];
		//$f_bank_acc_name1  =$row["f_bank_acc_name1"];
		//$f_bank_acc_no1    =$row["f_bank_acc_no1"];
		$f_open_invoice      =$row["f_open_invoice"];
		//$f_bank_acc_name2  =$row["f_bank_acc_name2"];
		//$f_bank_acc_no2    =$row["f_bank_acc_no2"];
		$f_mark            =$row["f_mark"];			
		$sign_date          =$row["f_c_date"];	
		$sno                =$row["sno"];
		echo "<sales>";
		echo "<f_custom_email>$f_custom_email</f_custom_email>";
		echo "<f_custom_id>$f_custom_id</f_custom_id>";
		echo "<f_custom_name>$f_custom_name</f_custom_name>";
		echo "<f_custom_addr>$f_custom_addr</f_custom_addr>";
		echo "<f_custom_tel>$f_custom_tel</f_custom_tel>";
		echo "<f_custom_celephone>$f_custom_celephone</f_custom_celephone>";	
		echo "<f_custom_line>$f_custom_line</f_custom_line>";
		echo "<f_custom_connector>$f_custom_connector</f_custom_connector>";
		echo "<f_custom_fax>$f_custom_fax</f_custom_fax>";
		echo "<f_company_id>$f_company_id</f_company_id>";
		echo "<f_post>$f_post</f_post>";
		//echo "<f_bank_acc_name1>$f_bank_acc_name1</f_bank_acc_name1>";
		//echo "<f_bank_acc_no1>$f_bank_acc_no1</f_bank_acc_no1>";
		echo "<f_open_invoice>$f_open_invoice</f_open_invoice>";
		//echo "<f_bank_acc_name2>$f_bank_acc_name2</f_bank_acc_name2>";
		//echo "<f_bank_acc_no2>$f_bank_acc_no2</f_bank_acc_no2>";
		echo "<f_mark>$f_mark</f_mark>";				
		echo "<sign_date>$sign_date</sign_date>";				
		echo "<sno>$sno</sno>";	
		echo "</sales>";
	}
	echo "</root>";
			
?>