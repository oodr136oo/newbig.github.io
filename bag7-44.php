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
    // 以下開始擷取來updateProcess表單資料進行目標紀錄更新作業
    //-----------------------------------------------------------------------
    // $_GET["deleteRecord"] 所取得的欄位為 sno (編號)
    $recordUpdateId = $_GET["updateId"];
    $recordUpdateName = $_GET["updateName"];
    $recordUpdatePhone = $_GET["updatePhone"];
    $recordUpdateAddress = $_GET["updateAddress"];
    //-----------------------------------------------------------------------
    // 編號 => sno
    // 姓名 => name
    // 住址 => phone
    // 電話 => address
    //-----------------------------------------------------------------------
    // 以下查詢字串的格式，請利用 like 搭配 % 敘述來做萬用字元比對
    // $queryString = "select * from student where $searchField like '%$keyWord%'";
    //-------------------------------------------------------------------------
    // 先行把欲更新的紀錄內容 Render 到更新表單
    //-------------------------------------------------------------------------
    print "<kaiText>";
    print "紀錄更新作業<br><hr>";
    print "<form action='bag7-333.php' method='GET'>";
    print "<table border='0'>";
    print "<tr><td>編號</td><td><input type='text' name='stuNo' value='$recordUpdateId' size='20'></td></tr>";
    print "<tr><td>姓名</td><td><input type='text' name='stuName' value='$recordUpdateName' size='20'></td></tr>";
    print "<tr><td>電話</td><td><input type='text' name='stuPhone' value='$recordUpdatePhone' size='20'></td></tr>";
    print "<tr><td>住址</td><td><input type='text' name='stuAddress' value='$recordUpdateAddress' size='40'></td></tr>";
    print "<input type='hidden' name='oriStuNo' value='$recordUpdateId'>";
    print "<tr><td></td><td align='right'><input type='submit' name='submit' value='確定更新'></td></tr>";
    print "</table>";
    print "</form>";
    print "</kaiText>";
    //-----------------------------------------------
    print "<br><a href='bag7-3.html'>上一頁</a>";
?>  
</body>
</html>