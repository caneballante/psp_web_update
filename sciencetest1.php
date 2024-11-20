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
<title>science funding test</title>
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
	
	
	<style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
            text-align: left;
        }
        .filter-buttons {
            margin-bottom: 10px;
        }
        .filter-buttons button {
            margin-right: 5px;
        }
        /* CSS to hide the columns in #jsonTable only */
        #jsonTable th.hidden, 
        #jsonTable td.hidden {
            display: none;
        }
    </style>
	
	
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
<h1><span data-contrast="none" xml:lang="EN-US" lang="EN-US"><span data-ccp-parastyle="heading 1">Science and Evaluation Funding</span></span><span data-ccp-props="{'134245418':true,'134245529':true,'335559738':360,'335559739':80}"> </span></h1>
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
    	<p>The Puget Sound Partnership Science and Evaluation team  makes strategic investments in research, modeling, and monitoring contributing  to the knowledge basis for Puget Sound ecosystem recovery. The Partnership  funds projects every biennium through three solicitations in the form of  Requests for Information. The Puget Sound Scientific Research solicitation  funds projects that address priority information needs described in the Science  Work Plan. The <a href="https://psp.wa.gov/monitoring-accelerate-recovery.php" target="_blank">Monitoring to Accelerate Recovery</a> solicitation funds  projects that address priority monitoring information needs and support the  objectives of the Puget Sound Ecosystem Monitoring Program&rsquo;s strategic plan and  Action Agenda. The <a href="https://psp.wa.gov/salmon-science-investigations.php" target="_blank">Salmon  Science Investigations</a> solicitation funds projects that will advance Puget  Sound salmon recovery efforts and the Puget Sound Salmon Recovery Plan.</p>
    	<p>Partnership funded investigations cover a broad range of  topics related to Puget Sound ecosystem recovery that contribute to the  Partnership&rsquo;s statutory recovery goals of a healthy human population, vibrant  quality of life, thriving species and food web, functioning habitat, and  healthy water quality. Select a recovery goal below to learn more about the  funded projects that support each goal.&nbsp;&nbsp;&nbsp;</p>
		<p paraid="921025832" paraeid="{2d556153-ffaf-4db4-aed3-ee06156d9a7c}{168}">&nbsp;</p>
 
    
    <!-- Buttons for Filtering by Primary Goal -->
    <div id="filter-buttons"></div>

    <!-- Table to Display JSON Data -->
    <table id="data-table" border="1">
        <thead>
            <tr>
                <th>Point of Contact</th>
                <th>Affiliation</th>
                <th>Biennium</th>
                <th>Title</th>
                <th>Funding Source</th>
                <th>Description</th>
                <th>Project Factsheet</th>
            </tr>
        </thead>
        <tbody>
            <!-- Rows will be dynamically generated here -->
        </tbody>
    </table>
			<br>







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
<script defer src="js/sciencefunding1.js"></script>
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
