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





echo '
  <table border="1" bagcolor="#CCFFFF">

    <tr>
	　　<td width="50" aligen="center">編號</td>
	　　<td width="120" aligen="center">姓名</td>
	　　<td width="120" aligen="center">編號</td>
	　　<td width="50" aligen="center">電話</td>
	　　<td  aligen="center">地址</td>
	　　<td width="200" aligen="center">電子信箱</td>
	　　<td width="120" aligen="center">功能</td>
    </tr>;

  $sql = 'SELECT = FROM '	