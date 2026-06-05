<!DOCTYPE html>
<html lang="en">
<head>

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-BGEZ5L3EJY"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-BGEZ5L3EJY');
</script>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Persistent Main Navigation Mockup</title>
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/custom.css" rel="stylesheet" type="text/css">
<link href="css/custom-erika.css" rel="stylesheet" type="text/css">
<link href="css/persistent-main-nav-mock.css" rel="stylesheet" type="text/css">
<script>document.documentElement.className += ' wf-loading';</script>
<script src="https://use.typekit.net/srt5jze.js"></script>
<script>try{Typekit.load({ async: true });}catch(e){}</script>
<script>
	navSelected = 6;
	subNavSelected = 1;
</script>
</head>
<body>
<?php include 'includes/main-nav-mock-inc.html';?>

<header class="overview-page-image-style overview-page-image109">
	<div class="overview-quote pull-right"></div>
</header>

<div class="container-fluid page-content padding-50-bottom">
	<div class="row">
		<div class="col-sm-3 padding-20-top"></div>
		<div class="col-sm-7 padding-20-top">
			<h1>Persistent Main Navigation Mockup</h1>
		</div>
		<div class="col-sm-2 padding-20-top"></div>
	</div>

	<div class="row">
		<div class="col-sm-3">
			<div class="nav-leftside-custom">
				<ul class="nav nav-stacked nav-pills nav-leftside-custom padding-left-0 margin-10-top">
					<?php include 'includes/ln-salmon-subnav-sample.html';?>
				</ul>
			</div>
		</div>

		<div class="col-sm-7 padding-20-top content-column">
			<p>This mockup shows a persistent top navigation bar above the existing page layout. The top row keeps the logo and utility links visible. The second row exposes the main chapter navigation that currently lives inside the modal.</p>

			<h2>How this would work</h2>
			<p>Each chapter in the top bar opens a compact panel with the most important destinations. The left navigation still handles movement within the current topic, so the hierarchy becomes chapter navigation at the top and topic navigation in the left rail.</p>

			<h2>What this replaces</h2>
			<p>On desktop, this could replace the modal as the primary navigation. On mobile, the same chapter groups could collapse into an accordion menu or drawer.</p>
		</div>

		<div class="col-sm-2 padding-20-top padding-0-right">
			<div class="right-nav-title">SEE ALSO</div>
			<ul class="nav-rightside-custom">
				<li role="presentation"><a href="sample-subnav.php">Subnav sample</a></li>
				<li role="presentation"><a href="includes/main-nav-mock-inc.html">Mock include file</a></li>
			</ul>
		</div>
	</div>
</div>

<?php include 'includes/footer-inc.html';?>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="js/bootstrap.js"></script>
<script src="js/custom.js"></script>
</body>
</html>
