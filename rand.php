<?php
	$fonts = Array( 'georgia', 'arial', 'helvetica', 'serif', 'sans-serif', 'monospace' );

	function randomFontSize() {
		return rand( 12, 50 );
	}
	
	function randomColor() {
		$max = 16581375;
		$decHex = rand( 0, $max );
		$hexDec = decHex( $decHex );
		return '#' . $hexDec;
	}
	
	function randomFont( $array ) {
		return $array[ rand( 0, count( $array ) - 1 ) ];
	}
	
	function doTextStyle( $fonts ) {
		return "font-size:" . randomFontSize() . "px;color:" . randomColor() . ";font-family:" . randomFont( $fonts );
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Random CSS</title>
	</head>
	
	<body style="background:<?=randomColor();?>">
		<h1 style="<?=doTextStyle( $fonts );?>">
			Random CSS, This Is The Title
		</h1>
		<p style="<?=doTextStyle( $fonts );?>">
			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sit amet urna tincidunt, porttitor lacus tristique, imperdiet erat. Nulla accumsan at massa ac interdum. Ut id sapien id enim lacinia pellentesque. Nulla orci libero, placerat at ante nec, sodales euismod nisi. Nunc ornare massa vitae dictum congue. Vestibulum id dui eu neque ultrices bibendum sit amet a felis. Aliquam condimentum accumsan ligula, nec fermentum velit posuere ut. Donec consequat accumsan nisi, quis placerat tellus vulputate eu. Nullam sed tortor a nisi ultricies imperdiet. Donec magna elit, fringilla id quam vitae, pharetra ultrices mi. Phasellus at massa eget lorem pellentesque fringilla imperdiet non lacus.
		</p>
		
		<p style="<?=doTextStyle( $fonts );?>">
		Donec fermentum ante quis enim molestie, quis facilisis risus rutrum. Nullam congue vel risus nec tincidunt. Nunc egestas lorem ut quam feugiat, id semper nulla sodales. Quisque aliquet diam quis egestas consequat. Nam volutpat laoreet lacus. Ut suscipit aliquet lorem, sit amet facilisis felis gravida id. Cras vel est euismod, condimentum massa sed, adipiscing nisi. Maecenas facilisis rutrum mi id rutrum. Praesent iaculis turpis eu mauris gravida, aliquam pharetra massa cursus. Ut vitae aliquet mi, luctus cursus dolor. Duis a metus tempus nisi aliquam accumsan. Nullam et lorem lorem. Sed porta sem vitae viverra dignissim. Curabitur non metus vehicula, facilisis nisi a, pretium nisl.
		</p>
	</body>
</html>