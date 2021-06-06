 
  function MenuOn(x){
  	if (x>1 && x!=8 ) {
  	   obj=document.getElementById("submenu"+x).style.visibility="visible";  	  	   
    }  	
  	obj=document.getElementById("menu"+x).style.color="#ffffff";  	
  	}
  function MenuOff(x){
  	if (x>1 && x!=8 ){
  	   obj=document.getElementById("submenu"+x).style.visibility="hidden";
    }       
  	obj=document.getElementById("menu"+x).style.color="#000000";
  }

	document.write("<div class='menu'>");
		document.write("<div id='menu1' onMouseOver='MenuOn(1)' onMouseOut='MenuOff(1)'>");
		    document.write("<a href='bag1-0.html' >關於我們</a>");		   		    	    
		document.write("</div>");		  
   
		
		document.write("<div id='menu2' onMouseOver='MenuOn(2)' onMouseOut='MenuOff(2)'>");
		    document.write("<a href='bag2-0.html'>商品資訊</a>");
		    document.write("<div class='submenu1' id='submenu2'>");			
			document.write("<a href='bag2-1.html' >壽險保障</a><span>|</span>");			
		    document.write("<a href='bag2-2.html' >健康醫療</a><span>|</span>");
		    document.write("<a href='bag2-3.html' >意外傷害</a><span>|</span>");
		    document.write("<a href='bag2-4.html' >年金保險</a><span>|</span>");
		    document.write("<a href='bag2-5.html' >投資型保險</a><span>|</span>");
		    document.write("<a href='bag2-6.html' >團體險商品</a><span>|</span>");
		    document.write("<a href='bag2-7.html' >高齡化商品</a><span>|</span>");
		    document.write("<a href='bag2-8.html' >旅行平安險</a><span>|</span>");			
						
		   document.write("</div>");
		document.write("</div>");
		document.write("<div id='menu3' onMouseOver='MenuOn(3)' onMouseOut='MenuOff(3)'>");
		    document.write("<a href='bag3-0.html'>理財投資</a>");
		    document.write("<div class='submenu1' id='submenu3'>");			
			document.write("<a href='bag3-1.html' >房屋貸款</a><span>|</span>");	
			document.write("<a href='bag3-2.html' >汽車貸款</a><span>|</span>");
			document.write("<a href='bag3-3.html' >利率與匯率公告</a><span>|</span>");		
						
		   document.write("</div>");
		document.write("</div>");
		document.write("<div id='menu4' onMouseOver='MenuOn(4)' onMouseOut='MenuOff(4)'>");
		    document.write("<a href='bag4-0.php'>新增加值服務</a>");
		    document.write("<div class='submenu1' id='submenu4'>");			 
			  document.write("<a href='bag4-1.html' >查詢加值新增服務</a><span>|</span>");
			  document.write("<a href='bag_print.php' >轉成PDF表單</a><span>|</span>");
			  document.write("<a href='bag4-3.html' >海外急難救助</a><span>|</span>");
			  document.write("<a href='bag4-4.html' >VIP服務專區</a><span>|</span>");
		    document.write("</div>");
		document.write("</div>");
		
		document.write("<div id='menu5' onMouseOver='MenuOn(5)' onMouseOut='MenuOff(5)'>");
		    document.write("<a href='bag5-0.html'>菁英招募</a>");
		    document.write("<div class='submenu1' id='submenu5'>");			 
			  document.write("<a href='bag5-1.html'  >業務缺職</a><span>|</span>");
			  document.write("<a href='bag5-2.html'  >一般缺職</a><span>|</span>");
			  document.write("<a href='bag5-3.html'  >電話行銷</a><span>|</span>");			 
		    document.write("</div>");
		document.write("</div>");
		
		
		document.write("<div id='menu6' onMouseOver='MenuOn(6)' onMouseOut='MenuOff(6)'>");
		    document.write("<a href='bag6-0.html'>網路投保新增</a>");
		    document.write("<div class='submenu1' id='submenu6'>");
			  document.write("<a href='bag6-1.html'  >旅遊平安險</a><span>|</span>");
			   document.write("<a href='bag6-2.html'  >意外傷害險</a><span>|</span>");
			  document.write("<a href='bag6-3.html'  >定期壽險</a><span>|</span>");			
			  document.write("<a href='bag6-4.html' >年金險</a><span>|</span>");	
			  document.write("<a href='bag6-5.html'>小額終身壽險</a><span>|</span>");	
			//  document.write("<a href='bag253.htm' >生產計劃表</a><span>|</span>");
			//  document.write("<a href='bom.htm' >物料需求計畫報表</a><span>|</span>");
			 // document.write("<a href='bag63.htm' >已出貨對帳單</a><span>|</span>");
		    document.write("</div>");
		document.write("</div>");
		
		document.write("<div id='menu7' onMouseOver='MenuOn(7)' onMouseOut='MenuOff(7)'>");
		    document.write("<a href='bag7-0.html'>最新消息</a>");
		    document.write("<div class='submenu1' id='submenu7'>");
			  document.write("<a href='bag7-1.html' >查詢</a><span>|</span>");
			  document.write("<a href='bag7-2.html' >刪除</a><span>|</span>");
			  document.write("<a href='bag7-3.html' >更新</a><span>|</span>");
			  document.write("<a href='bag7-4.html' >中獎名單</a><span>|</span>");
			  document.write("<a href='bag7-5.html' >系統維護</a><span>|</span>");
			//  document.write("<a href='bag76.htm' >流程維護</a><span>|</span>");
			
			//  document.write("<a href='bag262.htm' >製作流程維護</a><span>|</span>");
			//  document.write("<a href='bag263.htm' >營養成分維護</a><span>|</span>");
			  
			//  document.write("<a href='bag265.htm' >開設公司及成員維護	</a><span>|</span>");			 
		    document.write("</div>");
		document.write("</div>");
		
		document.write("<div id='menu8' onMouseOver='MenuOn(8)' onMouseOut='MenuOff(8)'>");
		    document.write("<a href='login.html' >回登錄畫面</a>");	
		  //  document.write("<a href='ECF_FULLT-ADD.html' >回登錄畫面</a>");				
		document.write("</div>");
	document.write("</div>"); 
	
	
	
	
	
	
	                                           