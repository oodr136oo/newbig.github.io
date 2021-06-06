<!doctype html>
<html>
<head>
  <meta charset=utf8 /> 
  <title>網路投保</title> 

<link rel=StyleSheet type=text/css href=menu.css>
<script language="JavaScript" charset="utf8" src="menu.js"></script>
<style>
        kaiText
        {
            font-family : 微軟正黑體;
            font-size : 18px;
            text-align : left
            line-height: 30px;
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
    <kaiText>
        <form action="bag7-1.php" method="GET">
            <table border="0">

                <tr>
                    <td>查詢欄位</td>
                    <td>
                        <select name="queryField">
                            <option value="stuSno">編號</option>
                            <option value="stuName">姓名</option>
                            <option value="stuPhone">電話</option>
                            <option value="stuAddress">住址</option>
                        </select>
                    </td>
                </tr>
                <tr><td>搜尋內容</td><td><input type="text" name="queryString" size="20"></td></tr>
                <tr><td></td><td align="right"><input type="submit" name="submit" value="搜尋"></td></tr>
            </table>
        </form>
    </kaiText>
	
	<?php
    include "dbConfig.php";
    //--------------------------------------------
    // 以下開始擷取來自表單資料進行資料庫搜尋動作
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
        //
        if (count($recordRow) != 0)
        {
            print "<kaiText>";
            print "搜尋結果如下";
            // print $queryString;
            print "<table border=1>";
            print "<tr><td>學號</td><td>姓名</td><td>電話</td><td>住址</td></tr>";
            for ($i=0; $i<count($recordRow); $i++)
            {
                print "<tr>";
                print "<td>".$recordRow[$i]["sno"]."</td>";
                print "<td>".$recordRow[$i]["name"]."</td>";
                print "<td>".$recordRow[$i]["phone"]."</td>";
                print "<td>".$recordRow[$i]["address"]."</td>";
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
    //------------------------------------------------
    print "<br><a href='bag7-1.html'>上一頁</a>";
?> 
	

</body>
</html>
