
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<meta charset="utf-8" />
	
<style>	
	#block2
{
	position:absolute;
	top:40px; 
	left:10px;
	width:700px;
	height:420px;
  background-image:url(https://www.pension.org.tw/images/classroom/t-3-1.jpg);
    background-repeat:no-repeat;	

    background-size:cover;
	
} 
	</style>	
</head>
<body id="block2">

   
    <div class="container">
        <h1> <bdo dir="ltr" lang="en">人壽股份有限公司</bdo>
		</h1>
		
		<font size="8" ></font>
		
		
		
        <div class="row">
            <div class="col-md-2">
                帳號
            </div>
            <div class="col-md-6">
                <input type="text" id="uname" name="uname" class="form-control" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                密碼
            </div>
            <div class="col-md-6">
                <input type="password" id="password" name="password" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <button type="button" id="login" class="btn btn-lg">登入</button>
            </div>
        </div>
    </div>
</body>
</html>
<script>
    alldata = $('input');
    uname = $('#uname');
    password = $('#password');
    login = $('#login');
    function logining(uname, password, checkCode) 
	{
       //document.location.href="bag1-1.html";

	   $.post("login.php",
		{
			uname: uname,
			password: password,
			checkCode: checkCode
		},
		function (data, status) {                
			if (data.status == "login") 
			{
				alert("登入成功");
				document.location.href="bag1-0.html";
			}
			else 
			{
				alert("登入失敗");
				alldata.val("");
			}
		}, "json");
    }
    login.on('click', function () 
	{	
        logining(uname.val(), password.val(), "checkCode")
    });
</script>
