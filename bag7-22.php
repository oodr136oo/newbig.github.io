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
    //-----------------------------------------------------------------------
    // 以下開始擷取來deleteProcess表單資料進行目標紀錄刪除作業
    //-----------------------------------------------------------------------
    // $_GET["deleteRecord"] 所取得的欄位為 sno (學號)
    $recordForDelete = $_GET["deleteRecord"];
    //-----------------------------------------------------------------------
    // 編號 => sno
    // 姓名 => name
    // 住址 => phone
    // 電話 => address
    //-----------------------------------------------------------------------
    // 以下查詢字串的格式，請利用 like 搭配 % 敘述來做萬用字元比對
    // $queryString = "select * from student where $searchField like '%$keyWord%'";
    //-------------------------------------------------------------------------
    $queryString = "delete from student where sno='".$recordForDelete."'";
    //
    try
    {
        $recordSet = $dbLink->exec($queryString);
        print "<kaiText>";
        print "刪除學生紀錄作業成功";
        print "</kaiText>";
    }
    catch (PDOException $pdoe)
    {
        print "<kaiText>";
        print "查詢錯誤：".$pdoe->getMessage();
        print "</kaiText>";
    }
    //-----------------------------------------------
    print "<br><a href='bag7-2.html'>上一頁</a>";
?>  
</body>
</html>
