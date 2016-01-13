
setTimeout(function() {createDiv();},1250);
//$("#the_footer").remove();



function createDiv(){
	$(".footer").remove();
	
	
//CHECK FOR IFRAMES
	
	var connectedDomain = $("body").attr('domain');
	var currentDomain = window.top.location.href ;
	var insideAnIframe = false;
	var tkDomain = tk;
	
	if (window.top != window) { insideAnIframe = true } else { insideAnIframe = false }
	if ( tkDomain == true ) { insideAnIframe = false; }
	
	var homeLink = "http://www.imcreator.com/?utm_source=footer&utm_medium=footer&utm_content=footer&utm_campaign=footer"
	var logoUrl = "/sttc/imc_icon.png"
		
	if(tkDomain == true){
		homeLink = "http://www.imcreator.tk/?utm_source=footer_tk&utm_medium=footer_tk&utm_content=footer_tk&utm_campaign=footer_tk"
		logoUrl = "/sttc/tk_icon.png"
	}
	
	
	//console.log(insideAnIframe);
	//console.log("index of tk is ", currentDomain.indexOf(".tk"), currentDomain );
	
	var htmlCode = "";
	
	if ($("#the_footer").length > 0 ) {
		
		$("#the_footer").remove();
		
		htmlCode = '<div id="the_footer" style="position:fixed; width: 100%; height: 50px; background-color:black; margin: 0px; padding: 0px; bottom:0px;">'+
		'<div style="position:absolute; left: 15px; top: 13px; background-color:black; z-index:9999;"><a href="'+homeLink+'"><img src="'+logoUrl+'"></a></div>'+
		'<div style="position:absolute; right:0px; width: 950px; top: 15px; float: right;">'+
		'<a class="footer_text" style="padding-top:15px;" href="http://www.imcreator.com"> Create a website </a>'+
		'<a class="footer_text" style="margin:0px; padding:0px; padding-top:15px; padding-right:5px; padding-left:5px;"> - a simple & elegant HTML website builder  (and its free)</p>'+
		'<div id="start_footer" class="btn_box" style="width:125px;"><a class="footer_text" href="'+homeLink+'">Start Now</a></div>'+
		'<div id="submit_footer" class="btn_box" style="width:280px; margin-left:1px;"><a class="footer_text" href="javascript:void(0)">Upgrade and Remove this footer</a></div>'+
		
		'<form action="https://im-creator-hr.appspot.com/upgrade" method="post" name="paypalform" class="paypal-form">'+
		'<input type="hidden" class="username" name="username" value="">'+
		'<input type="hidden" class="vbid" name="vbid" value="">'+
		'<input type="hidden" class="plan" name="plan" value="Yearly payment">'+
		'<input type="hidden" class="contractId" name="contractId" value="3071124">'+
		'<input type="hidden" class="plan_full_name" name="plan_full_name" value="Premium Yearly">'+
		
		'</form>'+
		'</div>'
		
	}
	
	

	
	var pageWidth = parseInt($(".page").css('width'));
	
	if (pageWidth != 480) {
		$("body").append(htmlCode);
	}
	
	
	

	
	var noCode = 
		'<div id="noiFrame" style="position:fixed; width: 700px; height: 450px; z-index:999999; background-color:black; padding: 0px; top:20%;">'+
	
	'<div style="position:absolute; left: 280px; top: 80px; background-color:black; z-index:9999;">'+
	'<a href="http://www.imcreator.com/?utm_source=iframepop&utm_medium=iframepop&utm_content=iframepop&utm_campaign=iframepop"><img id="footer_logo" src="/sttc/logo.png"></a>'+
	'</div>'+
	
	'<div style="position:absolute; left:155px; width: 400px; top: 260px; text-align: center;">'+
	'<p class="titleiframe" style="margin: 5px; font-family: arial; color: white; font-size: 20px; padding-top:3px;">iFrames are not allowed</p>'+
	'<div id="submit_no" class="btn_no_box" style="margin-top:10px; margin-left:42px; font-family: arial; color: white; font-size: 14px;"><a class="footer_text" href="javascript:void(0)">Please upgrade to remove this alert</a></div>'+
			
	'<form action="https://im-creator-hr.appspot.com/upgrade" method="post" name="paypalform" class="paypal-form">'+
	'<input type="hidden" class="username" name="username" value="">'+
	'<input type="hidden" class="vbid" name="vbid" value="">'+
	'<input type="hidden" class="plan" name="plan" value="Yearly payment">'+
	'<input type="hidden" class="contractId" name="contractId" value="3071124">'+
	'<input type="hidden" class="plan_full_name" name="plan_full_name" value="Premium Yearly">'+
	'</form>'+

	'</div>'+
	
'</div>'


	
	
	//var isOnIm = actualDomain.find('i-m')
	
	if (connectedDomain == 'http://app.imcreator.com' && insideAnIframe ) {
		$("body").append(noCode);
		$("#noiFrame").css("left", (parseInt($(document).width())-700)/2)
	}
	
	
	
	
	
	$('#the_footer').delay(1000).animate({
	    height: 75,
	  }, 2000, function() {
	    // Animation complete.
	  });
	
	 
	var trackingB = setTimeout(
			function(){
				_gaq.push(['b._setAccount', 'UA-31912219-1']); 
				_gaq.push(['b._setDomainName', 'i-m.co']);
				_gaq.push(['b._setAllowLinker', true]); 
				_gaq.push(['b._trackPageview']); }
				
			, 2000);
	
	$('#the_footer #submit_footer').click(function ()
			{
				//Tracking.TrackImEvent("editor_click_buy_hosting_from_footer/")
				
				Tracking.StartImTracking();
				Tracking.TrackImEvent("editor_click_buy_hosting_from_footer/")
		
				$('.paypal-form .username').val($("body").attr("vbid"));
				$('.paypal-form .vbid').val($("body").attr("vbid"));
				
				$('.paypal-form').submit();

			});
	
	
	$('#submit_no').click(function ()
			{
				//Tracking.TrackImEvent("editor_click_buy_hosting_from_footer/")
				
				Tracking.StartImTracking();
				Tracking.TrackImEvent("editor_click_buy_hosting_from_footer/")
		
				$('.paypal-form .username').val($("body").attr("vbid"));
				$('.paypal-form .vbid').val($("body").attr("vbid"));
				
				$('.paypal-form').submit();

			});

}