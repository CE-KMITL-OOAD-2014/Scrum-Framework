<html>
	<head>
		<link rel="stylesheet" type="text/css" href="{{url('media/css/bootstrap.min.css');}}">
    	<link rel="stylesheet" type="text/css" href="{{url('media/font-awesome/css/font-awesome.min.css');}}">
	</head>
	<body>
			<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
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
						<li id="hometag" class="@if ($uri=='#home') active @endif"><a href="#home">Home</a></li>
						<li id = "scrumtag"class="@if ($uri=='#scrum') active @endif"><a href="#scrum">What's Scrum?</a></li>						
						<li id ="abouttag"class="@if ($uri=='about') active @endif"><a href="#about">About</a></li>
					  </ul>
					</div><!-- /.navbar-collapse -->
					
				</div><!-- /.container-fluid -->
			</nav>
							
			@yield('body')
			
			@yield('login')
			
	<script src="{{url('media/js/jquery-1.11.1.min.js');}}"></script>
    <script src="{{url('media/js/jquery-ui.min.js');}}"></script>		
    <script src="{{url('media/js/bootstrap.min.js');}}"></script>
    <script src="{{url('media/js/angularjs/angular.min.js');}}"></script>
    <script>
    $("#abouttag").click(function() {
   	$('html, body').animate({ scrollTop:$("#about").offset().top}, 500);
	});

	$("#scrumtag").click(function() {
   	$('html, body').animate({ scrollTop:$("#scrum").offset().top}, 500);
	});

	$("#hometag").click(function() {
   	$('html, body').animate({ scrollTop:$("#home").offset().top}, 500);
	});

	$(".nav a").on("click", function(){
   $(".nav").find(".active").removeClass("active");
   $(this).parent().addClass("active");
});
    </script>			
	</body>
</html>
