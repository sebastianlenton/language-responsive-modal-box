<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Language-Responsive Modal Box Demo | by Sebastian Lenton</title>
        <meta name="description" content="">
        
<!--		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">-->
        
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        
        <meta name="HandheldFriendly" content="true"/>  
        <meta name="MobileOptimized" content="320"/>

		<link rel="stylesheet" type="text/css" href="css/style.css" media="all" />
        
		<link rel="apple-touch-icon" href="/img/apple-icon-touch.png">
		<link rel="icon" href="/img/favicon.png">
		
		<meta name="msapplication-TileColor" content="#f7f7f7">
		<meta name="msapplication-TileImage" content="/img/win8-tile-icon.png">
<script>

  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-45455136-1', 'sebastianlenton.com');
  ga('send', 'pageview');

</script>
    </head>
    <body>
    	<div id="banner" class="">
    		<div class="wrap">
	    		<p>Please allow access to your microphone to begin this demo.</p>
    		</div>
    	</div>
		<header>
    	<div class="wrap clearfix">
	        <h1 class="logo">
        		Language-Responsive Modal Box Demo
			</h1>
    	</div>
    				</header>
		<div class="wrap content clearfix">
	        <p>
	        	By <a href="http://www.sebastianlenton.com">Sebastian Lenton</a>
	        </p>
	        <hr />
			<article class="mainContent clearfix">
		        <p>
		        	This is a demo which uses the Google Web Speech API to enable an overlaid modal box to be dismissed via voice. The box will disappear if sworn at or told to go away. You must allow the use of your microphone for this to work.
		        </p>
				<p>
					This experiment was inspired by various talks at Canvas Conference 2013. For more information, <a href="http://www.sebastianlenton.com/responsive-future">please read this post</a>. In particular, it explores the idea that it should be possible to develop web applications which respond to user input other than that entered via traditional methods (mouse & keyboard, or touch). Applications could be developed which respond intelligently to ambient input- for example, retail sites could learn which visitors are happy to see overlaid offers, and which aren't.
		        </p>
		        <p>
		        	Currently this implementation has a few caveats, due to limitations of the API:
		        </p>
		        <ul>
		        	<li>It only works in Chrome 25+ on desktop, at time of writing (11/02/2013 - if this is no longer true, then <a href="http://www.sebastianlenton.com/contact">please let me know</a>).</li>
					<li>At the beginning of each session, you have to enable the microphone (though this also ensures websites aren't silently recording everything you're saying). According to <a href="http://updates.html5rocks.com/2013/01/Voice-Driven-Web-Apps-Introduction-to-the-Web-Speech-API">this article</a>, pages hosted via HTTPS do not need to repeatedly ask for permission.</li>
					<li>Each session only lasts for 60 seconds.</li>
					<li>The speech recognition is currently a bit poor.</li>
		        </ul>
	        </article>
			<hr />
	        <aside class="left column">
	        	<h3>
	        		Download Via GitHub
	        	</h3>
	        	<p>
					The code for this is available <a href="https://github.com/sebastianlenton/language-responsive-modal-box">right here</a>, via GitHub.
				</p>
	        </aside>
			<aside class="right column">
	        	<h3>
	        		About the Author
	        	</h3>
				<p>
					I'm a web developer/designer based in Birmingham, UK. Visit my site <a href="http://www.sebastianlenton.com">here</a>.
				</p>
	        </aside>
		</div>
		<div class="clearfix"></div>
		<?php
			include( 'parts/footerScripts.php' );
			
			include( 'parts/overlay.php' );
		?>
    </body>
</html>
