<?php
/*  引入  */
error_reporting(0);
require_once('mysql_connect1.php'); // Connect to the database.


require_once "class/tcpdf/tcpdf.php";
 
//$pdf->Image('qrcode.png', 10, 100,40,0);

  $time=time();
  $hour = date("G",$time); 
  $minute = date("i",$time);
  $second = date("s",$time); 
  $edit_time=$hour."時". $minute. "分". $second."秒"; 
  $f_c_date1 = date("Y-m-d H:i:s",mktime());
		
 
	
//$result = $mysqli->query($sql) or die($mysqli->connect_error);

//$query_tot_num = mysqli_num_rows($result);

$pdf = new TCPDF("P", "mm", "A4", true, 'UTF-8', false);
$pdf->SetMargins(5, 12);
$pdf->setHeaderMargin(5);
$pdf->setPrintHeader(true);
$pdf->setHeaderFont(array('droidsansfallback', '', 10));
$pdf->SetAutoPageBreak(true,$margin=22);
$pdf->setFontSubsetting(true);
$pdf->SetFont('droidsansfallback', '', 12, '', true);
$pdf->AddPage();
$sql  =" select st_id,stock.stock_id,stock_name, ";
$sql .=" sum(stock_in_qty) as stock_in, "; 
$sql .=" sum(stock_out_qty) as stock_out , ";
$sql .=" sum(stock_in_qty * stock_in_price*1000)   as stock_out_money , ";				//買股票現金支出
$sql .=" sum(stock_out_qty * stock_out_price*1000) as stock_in_money , ";              //賣股票現金收入
$sql .=" sum(process_fee) as fee  ";		
$sql .=" from stock left join stock_name on(stock.stock_id=stock_name.stock_id) ";
$sql.=" group by  st_id  order by st_id";


$result =$db->query($sql);

$sn_index = $result->rowCount();   //查詢結果的記錄筆數
$value=0;
$last_y=10;
	$pdf->MultiCell(30,12,'學號' ,1,'l',0,0,10,$last_y);
	$pdf->MultiCell(25,12,'買股支出金額' ,1,'l',0,0,40,$last_y);
	$pdf->MultiCell(25,12,'賣股所得金額' ,1,'l',0,0,65,$last_y);
	$pdf->MultiCell(25,12,'手續費' ,1,'l',0,0,90,$last_y);
	$pdf->MultiCell(25,12,'賣股成本' ,1,'l',0,0,115,$last_y);
	
for ($i=1;$i<=$sn_index;$i++)
{   	      
	
	$row=$result->fetch(PDO::FETCH_ASSOC);
	$st_id1=$row["st_id"]; 
	$stock_id=$row["stock_id"];	
	$stock_out_money=$row["stock_out_money"];
	$stock_in_money=$row["stock_in_money"];
	$fee=$row["fee"];
	$cost=0;
 	if ($stock_out>0)
	{
		//有賣出	
		$stock_out_buf=$stock_out;
		$sql ="select stock_in_qty,stock_in_price  from stock  ";					
		$sql.=" where stock_id='$stock_id'";
		$sql.=" and st_id='$st_id1' ";
		$sql.=" order by f_date,f_time";
		$result1 =$db->query($sql); 				 
		$sn_index1 = $result1->rowCount();   //查詢結果的記錄筆數
		for ($j=1;$j<=$sn_index1;$j++)
		{ 
			$row1=$result1->fetch(PDO::FETCH_ASSOC);						
			$stock_in_qty=$row1["stock_in_qty"];
			$stock_in_price=$row1["stock_in_price"];
			//計算當初買的成本
			if($stock_out_buf>=$stock_in_qty)
			{	
				$cost+=$stock_in_qty*$stock_in_price*1000;
				$stock_out_buf-=$stock_in_qty;
			}
			else
			{
				$cost+=$stock_out_buf*$stock_in_price*1000; 
				$stock_out_buf=0;
				break;
			}
		}
		
	}
	$last_y=$pdf->getY()+12;
	$pdf->MultiCell(30,12,$st_id1 ,1,'l',0,0,10,$last_y);
	$pdf->MultiCell(25,12,$stock_out_money ,1,'l',0,0,40,$last_y);
	$pdf->MultiCell(25,12,$stock_in_money ,1,'l',0,0,65,$last_y);
	$pdf->MultiCell(25,12,$fee ,1,'l',0,0,90,$last_y);
	$pdf->MultiCell(25,12,$cost ,1,'l',0,0,115,$last_y);
	$sql  =" select st_id,stock.stock_id,stock_name, ";
	$sql .=" sum(stock_in_qty) as stock_in, "; 
	$sql .=" sum(stock_out_qty) as stock_out , ";
	$sql .=" sum(stock_in_qty * stock_in_price*1000)   as stock_out_money , ";				//買股票現金支出
	$sql .=" sum(stock_out_qty * stock_out_price*1000) as stock_in_money , ";              //賣股票現金收入
	$sql .=" sum(process_fee) as fee  ";		
	$sql .=" from stock left join stock_name on(stock.stock_id=stock_name.stock_id) ";
	//if ($st_id!="wane")
	//{
	   $sql.=" where  st_id='$st_id' ";
	//}
	$sql.=" group by  st_id,stock.stock_id  order by st_id,stock.stock_id";
				
	$result1 =$db->query($sql); 		
	$sn_index1 = $result->rowCount();   //查詢結果的記錄筆數
	$value=0;
	$cost=0;
	$retain=0;
	/*
	for ($ii=1;$ii<=$sn_index1;$ii++)
	{   	      
		$row=$result1->fetch(PDO::FETCH_ASSOC);
		$st_id1=$row["st_id"]; 
		$stock_id=$row["stock_id"]; 
		$stock_name=$row["stock_name"]; 
		$stock_in=$row["stock_in"];
		$stock_out_money=$row["stock_out_money"];
		$stock_out=$row["stock_out"];
		$stock_in_money=$row["stock_in_money"];
		$fee=$row["fee"];
		
		$url = 'https://tw.stock.yahoo.com/q/q?s=' . $stock_id;
		$lines_array = file($url);
		$lines_string = implode('', $lines_array);
		$lines_string=substr($lines_string,31000);
		$pos1=strpos($lines_string,"href");
		$lines_string=substr($lines_string,$pos1+180);
		$pos2=strpos($lines_string,"href");
		$lines_string=substr($lines_string,10,$pos2-49);
		$pos1=strpos($lines_string,'<td align="center"');
		$now_price=(float)substr($lines_string,$pos1+47,5);
		
		$value+=($stock_in-$stock_out)*$now_price*1000;
		
	 	if ($stock_out>0)
		{
			//有賣出	
			$stock_out_buf=$stock_out;
			$sql ="select stock_in_qty,stock_in_price  from stock  ";					
			$sql.=" where stock_id='$stock_id'";
			$sql.=" and st_id='$st_id1' ";
			$sql.=" order by f_date,f_time";
			$result1 =$db->query($sql); 				 
			$sn_index1 = $result1->rowCount();   //查詢結果的記錄筆數
			for ($j=1;$j<=$sn_index1;$j++)
			{ 
				$row1=$result1->fetch(PDO::FETCH_ASSOC);						
				$stock_in_qty=$row1["stock_in_qty"];
				$stock_in_price=$row1["stock_in_price"];
				//計算當初買的成本
				if($stock_out_buf>=$stock_in_qty)
				{	
					$cost+=$stock_in_qty*$stock_in_price*1000;
					$stock_out_buf-=$stock_in_qty;
				}
				else
				{
					$cost+=$stock_out_buf*$stock_in_price*1000; 
					$stock_out_buf=0;
					break;
				}
			}
			 				 
		}
			
		
	
	}
	
	$pdf->MultiCell(25,12,$value ,1,'l',0,0,115,$last_y);
	$pdf->MultiCell(25,12,$value+$retain ,1,'l',0,0,115,$last_y);
	*/
$pdf->Output('test.pdf', 'I');
//$pdf->Output('printer/出貨單.pdf', 'D');
 
?>