<!DOCTYPE html>
<html lang="en">
<head>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-K5R1WLJ6VJ"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-K5R1WLJ6VJ');
</script>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>2023 Puget Sound Partnership</title>
<!-- Bootstrap -->
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/custom.css" rel="stylesheet" type="text/css">
<link href="css/custom-erika.css" rel="stylesheet" type="text/css">
<!-- loads the wf-loading class right away to minimize FOUT -->
<script>document.documentElement.className += ' wf-loading';</script>
<!-- Font PRENTON TYPEKIT -->
<script src="https://use.typekit.net/srt5jze.js"></script>
<script>try{Typekit.load({ async: true });}catch(e){}</script>
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<?php include 'includes/modal-inc.html';?>
<!-- START IMAGE HEADER --> 
<header class="overview-page-image-style overview-page-image120">
 	
	<div class="overview-quote pull-right"><h3>&nbsp;</h3></div>
 	
</header>
<div class="container-fluid page-content padding-50-bottom">
	<div class="row">
		<div class="col-sm-3 padding-20-top"></div>
		<div class="col-sm-7 padding-20-top">
<h1>JSON Data Display</h1>
			</div>
		<div class="col-sm-2 padding-20-top"></div>
	</div>
	
	<div class="row"> 
		<div class="col-sm-3">
			<div class="nav-leftside-custom">
				<ul class="nav nav-stacked nav-pills nav-leftside-custom padding-left-0 margin-10-top">
<!--<?php include 'includes/ln-HEAL.html';?>-->
			</ul>
			</div>
		</div>
		 
		<div class="col-sm-7 padding-20-top content-column">
			
		



<div class="filter-buttons">
    <button onclick="filterTable('Goal1')">Goal1</button>
    <button onclick="filterTable('Goal2')">Goal2</button>
    <button onclick="filterTable('Goal3')">Goal3</button>
    <button onclick="filterTable('Goal4')">Goal4</button>
    <button onclick="filterTable('Goal5')">Goal5</button>
    <button onclick="filterTable('')">Show All</button>
</div>

<table id="jsonTable">
    <thead>
        <tr>
            <th>Sponsor</th>
            <th>Entity</th>
            <th>Date</th>
            <th>Title</th>
            <th>Grant</th>
            <th>Description</th>
            <th>Goal1</th>
            <th>Goal2</th>
            <th>Goal3</th>
            <th>Goal4</th>
            <th>Goal5</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>
		</div>
		
		<div class="col-sm-2 padding-20-top padding-0-right">
<ul class="nav-rightside-custom">
</ul>
			<div class="right-nav-title margin-0-top ">For more information:</div>
			<ul class="nav-rightside-custom">
				<p> <strong>Ahren Stroming</strong> <br>
					Special Assistant for Federal Affairs<br>
					360.918.1337   	    <a href="mailto:ahren.stroming@psp.wa.gov">ahren.stroming@psp.wa.gov</a><br>
					</p>
			</ul>
			</div>
	</div>
	<!--END OF ROW --> 
</div>
<!--END OF CONTENT CONTAINER -->

<?php include 'includes/footer-inc.html';?>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="js/jquery-1.11.2.min.js"></script> 

<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="js/bootstrap.js"></script> 
<!-- custom js --> 
<script src="js/custom.js"></script> 
<script src="js/sciencefunding.js"></script> 
<!-- Google Tracking  --> 
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-69373425-1', 'auto');
  ga('send', 'pageview');

</script>
</body>
</html>
