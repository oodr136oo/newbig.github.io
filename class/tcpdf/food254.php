<?php
/*  引入  */
error_reporting(0);
require_once('mysql_connect.php'); // Connect to the database.
require_once "class/tcpdf/tcpdf.php";

$pdf = new TCPDF("P", "mm", "A4", true, 'UTF-8', false);
$pdf->SetMargins(5, 12);
$pdf->setHeaderMargin(5);
$pdf->setPrintHeader(true);
$pdf->setHeaderFont(array('droidsansfallback', '', 10));
$pdf->setHeaderData('', 0,$user_id2.$user_name2.$f_food_id. "的食譜" . "                        ". $f_food_name. "                                            " . date("Y年m月d日 H:i:s")."列印");
	$pdf->SetAutoPageBreak(true,$margin=22);
	$pdf->setFontSubsetting(true);
	$pdf->SetFont('droidsansfallback', '', 12, '', true);
	$pdf->AddPage();
	$pdf->MultiCell(50,10,'產品材料清單' ,0,'l',0,0,4,20);
/*	
	$todate1=$_POST[from_date]; 
	$todate2=$_POST[to_date];
	$today1= date("Y-m-d",mktime());
	$user_id1=$_SESSION[f_user_id];
	$f_company_id1=$_SESSION[f_user_company_id];
	$f_company_name1=$_SESSION[f_user_company_name];
	$buf1=$_SESSION["f_user_name"];
	$f_cyear=$_SESSION["f_cyear"];
	
   	
	$sql="SELECT f_p_id,f_p_name,f_company_id ,sum(f_order_qty) as t_qty,f_finish_date FROM order_detail";
	$sql .=" left join order0 on(order_detail.f_ord_no=order0.f_ord_no)";

	$sql .=" where order0.f_finish_date>='" . $todate1 ."' ";
	$sql .=" and order0.f_finish_date<='" . $todate2 ."' ";	
	$sql .=" and order0.f_cyear=".$f_cyear ;	
	$sql .=" and order0.f_company_id='" . $f_company_id1. "'";
	$sql .=" and (order0.ord_state<5 or order0.ord_state IS NULL ) ";	
	$sql .=" group by order_detail.f_p_id";	
	$result = $db->query($sql);  //送出查詢，將結果放入$result
	$sn_index = $result->rowCount();   //查詢結果後的記錄筆數	
	$sql="";
	$sum=0;	
	$sub_tot=0;
	$r=38;
	$beg_row=10;
	$bom = array(array(), array(),array(),array());
	$bom1 = array(array(), array(),array(),array());
	
 	
	$n=0;
	$pdf->setHeaderData('', 0, "BOM" . date("Y年m月d日 H:i:s")."列印");
	$pdf->SetAutoPageBreak(true,$margin=22);
	$pdf->setFontSubsetting(true);
	$pdf->SetFont('droidsansfallback', '', 12, '', true);
	$pdf->AddPage();
	
			$r=1;
			$beg_row=20;
			$pdf->MultiCell(50,10,'產品材料清單' ,0,'l',0,0,4,$beg_row);
			
	
	
	for ($i=0;$i<$sn_index;$i++)
	{
		$row=$result->fetch(PDO::FETCH_ASSOC) ; 
		$r=$r+1;
		if ($r>37)
		{
			$pdf->AddPage();
			$r=1;
			$beg_row=20;
			$pdf->MultiCell(50,10,'產品材料清單' ,0,'l',0,0,4,$beg_row);
			
			
		}
		$buf1=trim(strtolower($row["f_p_id"]));       	
		$buf2=trim($row["f_p_name"]);
		$buf3=trim(strtolower($row["t_qty"]));
		$pdf->MultiCell(0,0,$buf1 ,1,'l',0,0,10,$beg_row+($r+1)*6);		
		$pdf->SetY($beg_row+($r+1)*6);
		$pdf->SetX(30);
		$pdf->MultiCell(0,0,$buf2 ,1,'l',0,0,30,$beg_row+($r+1)*6);
		$pdf->SetY($beg_row+($r+1)*6);
		$pdf->SetX(70);		
		$pdf->MultiCell(0,0,"訂購數量 :".number_format($buf3,1) ,1,'l',0,0,70,$beg_row+($r+1)*6);
		
		
		//找相依材料
		
        $sql="SELECT mat_refer.f_mat_id, material.f_mat_name,f_mat_qty,mat_refer.f_mat_unit FROM mat_refer";
		$sql .=" left join material on(mat_refer.f_mat_id=material.f_mat_id)";	
		$sql .=" where mat_refer.f_food_id='" . $buf1 ."' ";	
		$sql .=" and mat_refer.f_cyear=".$f_cyear ;	
		$sql .=" and material.f_cyear=".$f_cyear ;
		
		
		$result1 = $db->query($sql);  //送出查詢，將結果放入$result
	    $sn_index1 = $result1->rowCount();   //查詢結果後的記錄筆數			
		
		for ($ii=0;$ii<$sn_index1;$ii++)
		{
			$r=$r+1;
			if ($r>40)
			{
				$pdf->AddPage();
				$r=1;
			}
			$row1=$result1->fetch(PDO::FETCH_ASSOC) ; 
			$buf1=trim($row1["f_mat_id"]);       	
			$buf2=trim($row1["f_mat_name"]);
			$buf31=trim($row1["f_mat_qty"]);	
			$buf4=trim($row1["f_mat_unit"]);	
			$pdf->SetY($beg_row+($r+1)*6);
			$pdf->SetX(14);
			$pdf->MultiCell(0,0,$buf1 ,1,'l',0,0,14,$beg_row+($r+1)*6);
			$pdf->SetY($beg_row+($r+1)*6);
			$pdf->SetX(34);
			$pdf->MultiCell(0,0,$buf2 ,1,'l',0,0,34,$beg_row+($r+1)*6);
			$pdf->SetY($beg_row+($r+1)*6);
			$pdf->SetX(54);
			$pdf->MultiCell(0,0,number_format($buf31,2) . '*'  .number_format($buf3,1) .'=' . number_format($buf31* $buf3,2). " " .$buf4 ,1,'l',0,0,54,$beg_row+($r+1)*6);
			
			$bom[$n][0]=$buf1;
			$bom[$n][1]=$buf2;
			$bom[$n][2]=$buf31* $buf3;
			$bom[$n][3]=$buf4;
			$n+=1;
		}		
	}
	//排序
	
	for ($last=$n-1;$last>1;$last--)
	{
		$max=$bom[0][0];
		$max1=$bom[0][3];
		
		$pnt=0;
		for ($j=1;$j<=$last;$j++)
		{
			if ($bom[$j][0]>$max)
			{
				$max=$bom[$j][0];
				$max1=$bom[$j][3];

				$pnt=$j;
			}
			else
			{
				if (($bom[$j][0]==$max) && ($bom[$j][3]>$max1))
				{
					$max=$bom[$j][0];
					$max1=$bom[$j][3];

					$pnt=$j;
					
				}

			}
		}
		$buf1=$bom[$pnt][0];
		$bom[$pnt][0]=$bom[$last][0];
		$bom[$last][0]=$buf1;
		$buf1=$bom[$pnt][1];
		$bom[$pnt][1]=$bom[$last][1];
		$bom[$last][1]=$buf1;
		$buf1=$bom[$pnt][2];
		$bom[$pnt][2]=$bom[$last][2];
		$bom[$last][2]=$buf1;
		$buf1=$bom[$pnt][3];
		$bom[$pnt][3]=$bom[$last][3];
		$bom[$last][3]=$buf1;
	}
	
	$r=40;
	for ($i=0;$i<$n;$i++)
	{
			
			$r=$r+1;
			if ($r>40)
			{
				$pdf->AddPage();
				$r=1;
				$pdf->SetY($beg_row);
				$pdf->SetX(4);
				$pdf->Cell(0,0,'重排後的材料',0,0,'L');
			}
			$pdf->SetY($beg_row+($r+1)*6);
			$pdf->SetX(14);
			$pdf->Cell(0,0,$bom[$i][0],0,0,'L');
			$pdf->SetY($beg_row+($r+1)*6);
			$pdf->SetX(34);
			$pdf->Cell(0,0,$bom[$i][1],0,0,'L');
			$pdf->SetY($beg_row+($r+1)*6);
			$pdf->SetX(54);
			$pdf->Cell(0,0,$bom[$i][2],0,0,'L');
			$pdf->SetY($beg_row+($r+1)*6);
			$pdf->SetX(64);
			$pdf->Cell(0,0,$bom[$i][3],0,0,'L');
	}	

	//重新計算
	$buf1=$bom[0][0];
	$buf2=$bom[0][1];
	$buf3=$bom[0][3];
	$p=0;
	$tot=0;
	for ($j=0;$j<$n;$j++)
	{
		if (($buf1!=$bom[$j][0])|| ($buf3!=$bom[$j][3]))
		{				
			$bom1[$p][0]=$buf1;
			$bom1[$p][1]=$buf2;
			$bom1[$p][2]=$tot;
			$bom1[$p][3]=$buf3;
			$buf1=$bom[$j][0];
			$buf2=$bom[$j][1];
			$buf3=$bom[$j][3];
			$p+=1;
			$tot=0;
		}
		$tot=$tot+$bom[$j][2];					
	}
	
	$bom1[$p][0]=$buf1;
			$bom1[$p][1]=$buf2;
			$bom1[$p][2]=$tot;
			$bom1[$p][3]=$buf3;
	$p+=1;
	
	
	$r=40;
	for ($i=0;$i<$p;$i++)
	{
			
			$r=$r+1;
			if ($r>40)
			{
				$pdf->AddPage();
				$r=1;
				$pdf->SetY($beg_row);
				$pdf->SetX(4);
				$pdf->Cell(0,0,'最後要準備的材料',0,0,'L');
			}
			$pdf->SetY($beg_row+($r+1)*6);
			$pdf->SetX(14);
			$pdf->Cell(0,0,$bom1[$i][0],0,0,'L');
			$pdf->SetY($beg_row+($r+1)*6);
			$pdf->SetX(34);
			$pdf->Cell(0,0,$bom1[$i][1],0,0,'L');
			$pdf->SetY($beg_row+($r+1)*6);
			$pdf->SetX(54);
			$pdf->Cell(0,0,$bom1[$i][2],0,0,'L');
			$pdf->SetX(64);
			$pdf->Cell(0,0,$bom1[$i][3],0,0,'L');
	}	

*/
	$pdf->Output('BOM單.pdf', 'I');	

?>