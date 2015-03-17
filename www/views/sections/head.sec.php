<?php
	/**
	 * Default head section
	 * @author Antoine De Gieter
	 */
?>

<head>
	<meta charset="utf-8">	
	<title><?php echo DEFAULT_TITLE; ?></title>
	<!-- Uncomment to activate mobile display -->
	<!-- meta name="viewport" content="width=device-width, initial-scale=1.0"-->

	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<!-- STYLESHEETS -->
	<link rel="stylesheet" type="text/css" href="global/css/bootstrap.min.css">
	<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400' rel='stylesheet' type='text/css'>
	<link href="global/css/simple-sidebar.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="global/css/main.css">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
		
	<!-- JAVASCRIPT -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script type="text/javascript" src="global/js/bootstrap.min.js"></script>

	<!-- Menu Toggle Script -->
	<script>
		$("#menu-toggle").click(function(e) {
			e.preventDefault();
			$("#wrapper").toggleClass("toggled");
		});
	</script>

	<!-- Uncomment to activate fancybox -->
	<!--script type="text/javascript" src="global/js/jquery.fancybox.js"></script>
	<script type="text/javascript" src="global/js/jquery.fancybox.pack.js"></script-->
</head>