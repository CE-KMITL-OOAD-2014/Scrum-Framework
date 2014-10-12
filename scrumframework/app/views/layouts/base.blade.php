<html>
	<head>
	<link rel="stylesheet" type="text/css" href="media/css/bootstrap.min.css">	
	<head>
	<body>
			<nav class="navbar navbar-default" role="navigation" style="margin-bottom:0px;">
				<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
					  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					  </button>
					  <a class="navbar-brand" href="#">Scrum Framework 1.0</a>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					  <ul class="nav navbar-nav">
						<li class="active"><a href="#">Home</a></li>
						<li><a href="#">What's Scrum Framework</a></li>						
						<li><a href="#">About</a></li>
					  </ul>
					</div><!-- /.navbar-collapse -->
					
				</div><!-- /.container-fluid -->
			</nav>
							
			@yield('body')
			
			@yield('login')
			
		<script src="media/js/jquery-1.11.1.min.js"></script>
		<script src="media/js/jquery-1.11.1.min.map"></script>		
		<script src="media/js/bootstrap.min.js"></script>
		<script src="media/js/angularjs/angular.min.js"></script>				
	</body>
</html>
