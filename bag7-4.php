<html>
<head>
    <meta http-equiv="Content-Type" content="text/html"; charset="utf-8">
    <style>
        kaiText
        {
            font-family : 微軟正黑體;
            font-size : 20px;
            line-height : 32px;
        }
    </style>
</head>
<body>

<?php




    include "dbConfig.php";
    //--------------------------------------------
    // 以下開始擷取來自表單資料進行資料庫插入動作
    //--------------------------------------------
    $queryField = $_GET["queryField"];
    $keyWord = $_GET["queryString"];
    $searchField = "";
    //--------------------------------------------
    // 編號 => sno
    // 姓名 => name
    // 住址 => phone
    // 電話 => address
    // 以下根據來自表單之下拉式清單選項內容來決定
    // 對資料庫哪個欄位來進行搜尋動作
    //-------------------------------------------
    if (!strcmp($queryField, "stuSno"))
    {
        $searchField = "sno";
    }
    else if (!strcmp($queryField, "stuName"))
    {
        $searchField = "name";
    }
    else if (!strcmp($queryField, "stuPhone"))
    {
        $searchField = "phone";
    }
    else if (!strcmp($queryField, "stuAddress"))
    {
        $searchField = "address";
    }
    else
    {
        // nothing to do 
    }
    //-------------------------------------------------------------------------
    // 以下查詢字串的格式，請利用 like 搭配 % 敘述來做萬用字元比對
    // 
    //-------------------------------------------------------------------------
    $queryString = "select * from student where $searchField like '%$keyWord%'";
    //-------------------------------------------------------------------------
    try
    {
        $recordSet = $dbLink->query($queryString);
        $recordRow = $recordSet->fetchAll();
		
		/*
		for($i=1;$i<=$sno;$i++)
		{
			$row =mysql_fetch_row($result);
			$sno=$row[0];
			$name=$row[1];		
			$phone=$row[2];		
			$address=$row[3];	
              print "<tr><form>";
              print "<td align='center'>$i</td>";			  
              print "<td align='center'><input type='text' name='n' value='$sno' size='8'></td>";			
              print "<td align='center'><input type='text' name='t' value='$name' size='8'></td>";		
              print "<td align='center'><input type='text' name='a' value='$phone' size='8'></td>";	
              print "<td align='center'><input type='text' name='e' value='$address' size='8'></td>";
              print "<td align='center'><input type='submit' name='submit' value='修改'/ >
			                           <input type='submit' name='submit' value='刪除'/ >
									   <input type='hidden' name='sno' value='$sno'/ >
			  			  
			  </td>";


            print"</form></tr>";
		}
	        


			*/  
			  
        //
        if (count($recordRow) != 0)
        {
            print "<kaiText>";
            print "搜尋結果如下";
            // print $queryString;
            print "<table border=1>";
            print "<tr><td>編號</td><td>姓名</td><td>電話</td><td>住址</td><td>刪除作業</td></tr>";
            for ($i=0; $i<count($recordRow); $i++)
            {
                print "<tr>";
                print "<td>".$recordRow[$i]["sno"]."</td>";
                print "<td>".$recordRow[$i]["name"]."</td>";
                print "<td>".$recordRow[$i]["phone"]."</td>";
                print "<td>".$recordRow[$i]["address"]."</td>";
                print "<td>";
                //----------------------------------------------------------------------------
                // 以下利用隱藏欄位技巧，將點選"刪除"鈕後的資料紀錄先行隱式儲存於表單變數中，後續再利用
                // $_GET["fieldName"] 的方式來擷取表單送出的隱式資料，此為欲刪除的紀錄的學號欄
                //----------------------------------------------------------------------------
                print "<form action='bag7-41.php' method='GET'>";
                print "<input type='hidden' name='deleteRecord' value='".$recordRow[$i]["sno"]."'>";
                print "<input type='submit' name='sureDelete' value='刪除'>";
                print "</form>";
				
				
				
				
				
				                
				//-----------------------------------------------------------------------
                // 以下利用隱藏欄位技巧，將點選"更新"鈕後的資料紀錄先行隱式儲存於表單變數中，後續
                // 再利用 $_GET["fieldName"] 的方式來擷取表單送出的隱式資料，此包含各欄位值
                //-----------------------------------------------------------------------
				
				
				
				
                print "<form action='bag7-42.php' method='GET'>";
                print "<input type='hidden' name='updateId' value='".$recordRow[$i]["sno"]."'>";
                print "<input type='hidden' name='updateName' value='".$recordRow[$i]["name"]."'>";
                print "<input type='hidden' name='updatePhone' value='".$recordRow[$i]["phone"]."'>";
                print "<input type='hidden' name='updateAddress' value='".$recordRow[$i]["address"]."'>";
                print "<input type='submit' name='sureUpdate' value='更新'>";
                print "</form>";
				
				
				
				
                print "</td>";
                print "</tr>";
            }
			
			
			
			
			
			
            print "</table>";
            print "</kaiText>";
        }
        else
        {
            print "<kaiText>搜尋不到任何符合條件的紀錄<kaiText>";
        }

    }
    catch (PDOException $pdoe)
    {
        print "查詢錯誤：".$pdoe->getMessage();
    }
    //-----------------------------------------------
    print "<br><a href='bag7-4.html'>上一頁</a>";
?>
</body>
</html>