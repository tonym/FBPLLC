<!DOCTYPE html>
<html lang="en" xmlns:fb="http://www.facebook.com/2008/fbml" xmlns:og="http://opengraphprotocol.org/schema/">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta name="description" content />

		<link rel="icon" type="image/png" href="/img/favicon.png" />
		<link rel="apple-touch-icon" href="/img/apple-touch-icon.png" />

		<title>Samplomatic - a resume supplement by Tony M</title>

		<meta property="og:image" content="/img/tile_big.png" />
		<meta property="og:title" content="Samplomatic by Tony M" />
		<meta property="og:url" content="<?php echo $_SERVER['PATH_INFO']; ?>" />
		<meta property="og:site_name" content="Samplomatic" />
		<meta property="og:type" content="website"/>

		<link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" type="text/css" href="css/override.css" />
		<link rel="stylesheet" type="text/css" href="css/main.css" />
		<link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap-responsive.min.css" />

		<script type="text/javascript" src="lib/jquery/jquery-1.8.2.min.js"></script>
		<script type="text/javascript" src="lib/cufon/cufon-yui.js"></script>
		<script type="text/javascript" src="lib/cufon/yesteryear_400.font.js"></script>
		<script type="text/javascript" src="lib/cufon/futura_400.font.js"></script>
		<script type="text/javascript" src="js/global.js"></script>
		<script type="text/javascript">

			// Custom fonts.
			Cufon.replace('.navbar h1', { fontFamily: 'yesteryear' });
			Cufon.replace('.navbar h2', { fontFamily: 'futura' });
			Cufon.replace('.navbar p', { fontFamily: 'futura' });

			//jQuery
			$(document).ready(function() {
				$('#data-test').submit(function() {
					event.preventDefault();
					$.post($(this).attr("action"), $(this).serialize(), function(data) {
						$('#data-test-container').html(data);
					});
					return false;
				});
			});
		</script>
	</head>

	<body>
		<div class="navbar navbar-inverse navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container">
					<div class="row">
						<div class="span9">
							<a class="brand" href="#">
								<h1>Samplo-matic</h1>
								<h2>Code samples and tests</h2>
							</a>
						</div>
						<div class="span3">
							<p>Tony Maxymillian | Portland, OR<br />503-901-5099 tony@fbpllc.com</p>
						</div>
					</div>
				</div>
			</div>
			<div class="navbar-inner s-navbar-secondary">
				<div class="container">
					<div class="fb-like" data-send="true" data-layout="button_count" data-width="450" data-show-faces="true"></div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="span4">
					<h3>Social Integration</h3>
					<p>
						TODO: add Open Graph integration test;
					</p>
					<p>
						TODO: add Twitter API test
					</p>
					<p>
						TODO: add Pinterest API test
					</p>
				</div>
				<div class="span4">
					<h3>Javascript/jQuery/AJAX</h3>
					<p>
						A sample code featuring jQuery and an AJAX request to a PHP page which does nothing with the data.
						My concern is the AJAX request, so if you test this form please understand no data is saved.
					</p>
					<div id="data-test-container">
						<form name="data-test" id="data-test" action="application/" method="post">
							<legend>AJAX request test</legend>
							<label>Enter anything</label>
							<input type="text" name="data" placeholder="String value" />
							<span class="help-block">Enter any string you like. Nothing is saved, it's only sent to the server, cleaned and sent back with a nice message and some pretty markup.
							<input type="hidden" name="action" value="input" />
							<button type="submit" class="btn" id="data-test-submit">Submit</button>
						</form>
					</div>
				</div>
				<div class="span4">
					<h3>About This Page</h3>
					<p>
						This page is a playground.
						I use this small website as a place to test or experiment with new code and techniques.
						Since I change it often, it is never the same.
					</p>
					<p>
						The current version is a test of the Twitter Bootstrap CSS boilerplate and is currently used to test the CSS layout possibilities.
						Feel free to review the source code.
					</p>
				</div>
			</div>
		</div>
		<div id="fb-root"></div>
		<script>
			(function(d, s, id) {
				var js, fjs = d.getElementsByTagName(s)[0];
				if (d.getElementById(id)) return;
				js = d.createElement(s); js.id = id;
				js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=287905411327495";
				fjs.parentNode.insertBefore(js, fjs);
			}
			(document, 'script', 'facebook-jssdk'));
	</script>
</body>
</html>
