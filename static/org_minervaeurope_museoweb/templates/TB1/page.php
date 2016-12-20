<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="it"> <!--<![endif]-->
<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php print($doctitle) ?>
	<?php print($metaTags) ?>
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
	<link href="assets/css/styles.css" rel="stylesheet" type="text/css" media="all" />	
	<!--[if IE 5]>
	<link href="assets/css/ie5.css" rel="stylesheet" type="text/css" media="screen" />
	<![endif]-->
	<!--[if IE 6]>
	<link href="assets/css/ie6.css" rel="stylesheet" type="text/css" media="screen" />
	<![endif]-->
	<link href="assets/css/print.css" rel="stylesheet" type="text/css" media="print" />
	<!--favicon-->
	<link rel="shortcut icon" href="assets/images/favicon.ico">
	<?php print($head) ?>
</head>
<body>
	<div id="skip" class="hide"><?php print($hiddenNav) ?></div>
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php print($linkLogo) ?>" target="_blank">
                   <img src="<?php print($logoUrl) ?>" alt="Logo Biblioteca" class="img-responsive">
                </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-menu">
                <?php print($topNav) ?>

                <?php print($languages) ?>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>	
	<div id="header">
        <!--div class="headerLogo"><?php print($logo) ?></div-->	
    </div>
<div id="wrap"  class="container">
	<div class="row">
		<div id="content" class="col-md-9  col-md-push-3">
			<div id="internalWrap">
				<div id="breadcrumbs" class="breadcrumb"><?php print($breadcrumbs) ?></div>
				<a name="top"></a>
				<?php print($content) ?>
				<div class="afterContent">
				<?php print($afterContent) ?>
				</div>
			</div>
		</div>
		<div id="leftSidebar" class="col-md-3 col-md-pull-9 sidebar">
			<?php print($leftSidebar) ?>
			<!-- ?php print($boxLink) ? -->
		</div>
	</div><!--end of row-->
	<footer>
		<div class="row">
			<div class="col-md-6">
				<?php print($sidebarAddress) ?>
				<a href="http://www.minervaeurope.org" title="<?php print __T('MW_EXTERNALLINK_MAIN_PAGE');?>Minerva Europe"><img class="img-thumbnail" src="assets/images/logo_minerva.gif" alt="Minerva Europe" width="68" height="50" style="margin: 5px" /></a>
				<a href="http://www.minervaeurope.org/structure/workinggroups/userneeds/prototipo/museoweb.html" title="<?php print __T('MW_EXTERNALLINK_MAIN_PAGE');?>Museo &amp; Web" ><img class="img-thumbnail" src="assets/images/logo_museoWeb.gif" alt="Museo &amp; Web" width="50" height="50" style="margin: 5px" /></a>
			</div>
			<div class="col-md-6">
			<?php print($footer) ?>
			</div>
		</div>
	</footer>
</div>
<?php print($tail) ?>
	<script src="assets/javascripts/bootstrap.min.js"></script>
</body>
</html>

