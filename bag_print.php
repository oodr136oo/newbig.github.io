<?php
/*  引入  */
error_reporting(0);
require_once('mysql_connect.php'); // Connect to the database.
require_once "class/tcpdf/tcpdf.php";
$pdf = new TCPDF("L", "mm", "A4", true, 'UTF-8', false);
$pdf->SetMargins(10, 24);
$pdf->setHeaderMargin(5);
$pdf->setPrintHeader(true);
$pdf->setHeaderFont(array('droidsansfallback', '', 12));
//資料庫查詢	
	$sql="SELECT * from student order by id";
	$result = $db->query($sql);
	$query_tot_num = $result->rowCount();
	$msg0="沒資料";
	if ($query_tot_num==0)
	{	   
	   $pdf->setHeaderData('', 0, $msg0 );		
	}
	else
	{
	 	$pdf->setHeaderData('', 0,"加值服務清單 " , date("Y年m月d日 H:i:s")."                                                ".$buf);
		$pdf->SetAutoPageBreak(true,$margin=22);
		$pdf->setFontSubsetting(true);
		$pdf->SetFont('droidsansfallback', '', 8, '', true);
		$i=0;
		while ($row = $result->fetch(PDO::FETCH_ASSOC)) 
		{
			$buf1=strtolower($row["id"]);	
			$buf2=strtolower($row["numm"]);
			$buf3=strtolower($row["sno"]);
			$buf4=strtolower($row["name"]);			
			$buf5=strtolower($row["nickname"]);	
			$buf6=strtolower($row["gender"]);	
			$buf7=strtolower($row["age"]);	
			$buf8=strtolower($row["phone"]);	
			$buf9=strtolower($row["address"]);	
			$buf10=strtolower($row["email"]);	


		

			
			if (($i==0) || ($r>40) )
			{						
				if ($i>0)
				{
					$html.='</table>';
					$pdf->AddPage();  //跳頁
					$pdf->writeHTML($html);				
				}
				$r=1;						
				$html.='<table border="1" cellpadding="10">'; 
				$html.='<tr><td width="70" >序號</td>';   //表頭
				$html.='<td width="70" >編號</td>';
				$html.='<td width="70" >身分證字號</td>';	
				$html.='<td width="70" >姓名</td>';	
				$html.='<td width="70" >暱稱</td>';	
				$html.='<td width="70" >性別</td>';	
				$html.='<td width="70" >生日</td>';	
				$html.='<td width="70" >電話</td>';
				$html.='<td width="70" >地址</td>';
				$html.='<td width="70" >電子信箱</td>';				
				$html.='</tr>';			
			}
			$html.='<tr>';
			
			$html.='<td width="70" >'.$buf1. '</td>';
			$html.='<td width="70" >'.$buf2 . '</td>';
			$html.='<td width="70" >'.$buf3. '</td>';
			$html.='<td width="70" >'.$buf4 . '</td>';
			$html.='<td width="70" >'.$buf5. '</td>';
			$html.='<td width="70" >'.$buf6 . '</td>';
			$html.='<td width="70" >'.$buf7. '</td>';
			$html.='<td width="70" >'.$buf8 . '</td>';
			$html.='<td width="70" >'.$buf9. '</td>';
			$html.='<td width="70" >'.$buf10. '</td>';

		

			
			$html.='</tr>';
			$i++;
			$r++;
		}	 
		$html.="</table>";	
		$pdf->AddPage();
		$pdf->writeHTML($html);    
	}	
$pdf->Output('會員清單.pdf', 'I');

?>