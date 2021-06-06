<html>
<head>
    <meta http-equiv="Content-Type" content="text/html"; charset="utf-8">
    <style>
        kaiText
        {
            font-family : 標楷體;
            font-size : 30px;
            line-height : 36px;
        }
    </style>
</head>
<body>

<?php
    include "dbConfig.php";
    //--------------------------------------------
    // 以下開始擷取來自表單資料進行資料庫更新作業
    //--------------------------------------------
    // $oriStuNo 是指尚未更改學號前之學生學號
    //--------------------------------------------
    $oriStuNo = $_GET["oriStuNo"];
    $stuNo = $_GET["stuNo"];
    $stuName = $_GET["stuName"];
    $stuPhone = $_GET["stuPhone"];
    $stuAddress = $_GET["stuAddress"];
    //--------------------------------------------
    $queryString = "update student set sno='$stuNo', name='$stuName', phone='$stuPhone', address='$stuAddress' where sno='$oriStuNo'";
    try
    {
        // print $queryString."<br>";
        $dbLink->exec($queryString);
        print "<kaiText>";
        print "更新紀錄作業成功";
        print "<br>";
        print "</kaiText>";
    }
    catch (PDOException $pdoe)
    {
        print "更新紀錄作業失敗：".$pdoe->getMessage();    
    }
    //----------------------------------------------------
    print "<br><a href='bag7-4.html'>上一頁</a>";
?>
</body>
</html>