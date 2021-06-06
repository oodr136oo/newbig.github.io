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
    // 以下開始擷取來自表單資料進行資料庫插入作業
    //--------------------------------------------
    $stuNo = $_GET["stuNo"];
    $stuName = $_GET["stuName"];
    $stuPhone = $_GET["stuPhone"];
    $stuAddress = $_GET["stuAddress"];
    //--------------------------------------------
    $queryString = "insert into student (sno, name, phone, address) values ('$stuNo', '$stuName', '$stuPhone', '$stuAddress')";
	
	//header("Location: bag6-0.php");
	
    try
    {
        $dbLink->exec($queryString);
        print "<kaiText>";
        print "新增紀錄作業成功";
        print "</kaiText>";
    }
    catch (PDOException $pdoe)
    {
        print "新增紀錄作業失敗：".$pdoe->getMessage();    
    }
    //----------------------------------------------------
    print "<br><a href='bag6-0.html'>上一頁</a>";
?>
</body>
</html>