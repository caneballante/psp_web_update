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
<title>Sample Subnav Page</title>
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/custom.css" rel="stylesheet" type="text/css">
<link href="css/custom-erika.css" rel="stylesheet" type="text/css">
<script>document.documentElement.className += ' wf-loading';</script>
<script src="https://use.typekit.net/srt5jze.js"></script>
<script>try{Typekit.load({ async: true });}catch(e){}</script>
<script>
	/* Top-level nav item to open and highlight. */
	navSelected = 6;

	/* Nested nav item to highlight. Use "non" when no subpage is active. */
	subNavSelected = 1;
</script>
</head>
<body>
<?php include 'includes/modal-inc.html';?>

<header class="overview-page-image-style overview-page-image109">
	<div class="overview-quote pull-right"></div>
</header>

<div class="container-fluid page-content padding-50-bottom">
	<div class="row">
		<div class="col-sm-3 padding-20-top"></div>
		<div class="col-sm-7 padding-20-top">
			<h1>Sample Subnav Page</h1>
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
			<p>This page demonstrates the nested left navigation pattern. The parent item, Planning, opens because <code>navSelected = 6;</code>. The nested item, Sample subpage, is highlighted because <code>subNavSelected = 1;</code>.</p>

			<h2>How to use this pattern</h2>
			<p>Put the nested links inside the relevant left-nav include. Each top-level item keeps its existing <code>nav#</code> ID. Each child link gets a <code>subnav#</code> ID inside a nested <code>ul</code>.</p>

<pre><code>&lt;li id="nav6" class="has-subnav" role="presentation"&gt;
	&lt;a href="salmon-recovery-planning.php"&gt;PLANNING&lt;/a&gt;
	&lt;ul class="nav nav-stacked nav-pills left-subnav"&gt;
		&lt;li id="subnav1" role="presentation"&gt;&lt;a href="sample-subnav.php"&gt;Sample subpage&lt;/a&gt;&lt;/li&gt;
	&lt;/ul&gt;
&lt;/li&gt;</code></pre>

			<p>On a child page, set both variables. On a normal top-level page, set <code>subNavSelected = "non";</code> or omit it.</p>
		</div>

		<div class="col-sm-2 padding-20-top padding-0-right">
			<div class="right-nav-title">SEE ALSO</div>
			<ul class="nav-rightside-custom">
				<li role="presentation"><a href="includes/ln-salmon-subnav-sample.html">Sample include file</a></li>
				<li role="presentation"><a href="salmon-recovery-planning.php">Planning parent page</a></li>
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
