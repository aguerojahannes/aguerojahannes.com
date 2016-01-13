var Tracking = {};

var _gaq = _gaq || [];
Tracking.Started = Array(); 

/**
Start the IM internal tracking.
*/
Tracking.StartImTracking = function()
{
	var trackerUid = '';
	Tracking.Start(trackerUid, 'UA-21520422-1', '.imcreator.com');
}


/**
Track an IM event in real-time.
Note: we use trackPageview instead of the events API, since events cannot be used in a funnel. See: http://www.google.com/support/forum/p/Google%20Analytics/thread?tid=6f64144370bbe0a1&hl=en
@param {String}		eventString		A unique string which represnets this event. e.g. PublishClicked or ElementAdded?Key=PictureBox
*/
Tracking.TrackImEvent = function(eventString)
{
	var trackerUid = '';
	Tracking.TrackEvent(trackerUid, eventString);
}


/**
Start tracking the specified website.
@param {String}		trackerUid		An arbitrary string which uniquely represents the website we are tracking.
@param {String}		gaAccount		The Google Analytics tracking ID. e.g. UA-12345678-1
*/
Tracking.Start = function(trackerUid, gaAccount)
{
	
	
	Tracking.Started[trackerUid] = 1;
	//alert("Start | " + trackerUid + " | " + gaAccount);
	//_gaq.push([trackerUid + '._setAccount', gaAccount]);

	  _gaq.push(['_setAccount', 'UA-21520422-1']);
	  _gaq.push(['_setAllowLinker', true]);
	  _gaq.push(['_addIgnoredRef', 'imcreator.com']);
	  _gaq.push(['_addIgnoredRef', 'i-m.co']);
	  _gaq.push(['_addIgnoredRef', 'im-creator.appspot.com']);
	  _gaq.push(['_addIgnoredRef', 'im-creator-hr.appspot.com']);
	  _gaq.push(['_setDomainName', '.imcreator.com']);
	  _gaq.push(['_trackPageview']);
	
	
	(function()
	{
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	})();

}


/**
Track a page view in real-time.
@param {String}		trackerUid		An arbitrary string which uniquely represents the website we are tracking.
@param {String}		page			A unique string which represents this page.
*/
Tracking.TrackPageView = function(trackerUid, page)
{
	if (!Tracking.Started[trackerUid])
	{
		debug.error("Not ready yet:" + trackerUid);
	}
	//alert("TrackPageView | " + trackerUid + " | " + page);
	if ((window.location.href.indexOf('localhost') != -1) || (window.location.href.indexOf('gotdns.com') != -1)) return;
	_gaq.push([trackerUid + '._trackPageview', page]);
}

/**
Track an event in real-time.
Note: we use trackPageview instead of the events API, since events cannot be used in a funnel. See: http://www.google.com/support/forum/p/Google%20Analytics/thread?tid=6f64144370bbe0a1&hl=en
@param {String}		trackerUid		An arbitrary string which uniquely represents the website we are tracking.
@param {String}		eventString		A unique string which represents this event. e.g. PublishClicked or ElementAdded?Key=PictureBox
*/
Tracking.TrackEvent = function(trackerUid, eventString)
{
	if (!Tracking.Started[trackerUid])
	{
		debug.error("Not ready yet:" + trackerUid);
	}
	//alert("TrackEvent | " + trackerUid + " | " + eventString);
	if (eventString.indexOf('fb_gen/') == 0)
	{
		console.log("TrackEvent | " + trackerUid + " | " + eventString);
	}
	if ((window.location.href.indexOf('localhost') != -1) || (window.location.href.indexOf('gotdns.com') != -1)) return;
	_gaq.push([trackerUid + '._trackPageview', '/events/' + eventString]);
}
