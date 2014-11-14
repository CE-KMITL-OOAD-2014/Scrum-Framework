<html ng-app="scrumFramework">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="{{url('media/css/bootstrap.min.css');}}">
    <link rel="stylesheet" type="text/css" href="{{url('media/select/css/bootstrap-select.min.css');}}">
    <link rel="stylesheet" type="text/css" href="{{url('media/font-awesome/css/font-awesome.min.css');}}">
    <style>
            .pink{
                color: #fff;
                background-color:#F4726D;
            }
            .concrete{
                padding : 2%;
                background-color:#e3e3e3;
                border-bottom: 1px solid #dcdcdc;
            }
            .comment{
                padding : 2%;
                background-color:#fff;
                border-radius: 3px;
                margin-top:1%;    
            }
            .pink:hover{
                color: #fff;
                background-color:#FA726D;
            }
            .word{
                word-wrap: break-word;
            }
            .btn{border-radius:0px;}
    </style>
</head>
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
                    <li class="active"><a href="{{ url('/main') }}">Home</a></li>
                    <li><a href="#">What's Scrum Framework</a></li>						
                    <li><a href="#">About</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">		
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">+Board <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Board1</a></li>
                            <li><a href="#">Board2</a></li>
                            <li><a href="#">Board3</a></li>
                            <li class="divider"></li>
                            <center><button type="button" class="btn pink"  data-toggle="modal" data-target="#myModal">Add new board</button></center>
                        </ul>
                        <!--<li><a>Username</a></li>-->
                    </li>
                    <li><a href="#">{{{ $email or Session::get('email')}}}</a></li>
                    <li><a href="{{ url('/logout') }}"><i class="fa fa-sign-out"> Sign out</i></a></li>
                </ul> 
            </div><!-- /.navbar-collapse -->				
        </div><!-- /.container-fluid -->
    </nav>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form role="form" method="post" action="{{url('/taskboard')}}">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">Create new board</h4>
                    </div>
                    <div class="modal-body row">
                        <div class="form-group">
                            <div ng-controller="ShowteamController">
                                <div class="col-xs-12">
                                    <div class="col-xs-6">
                                        <label for="BoardName">Board name</label>
                                        <input type="text" class="form-control" id="board_name" placeholder="Board name" name="boardname" required>
                                    </div>
                                    <div class="col-xs-3">
                                        <label for="BoardName">Select Team</label> 
                                        <select class="btn btn-info" ng-model="myTeam" ng-options="team.name for team in teams"></select>
                                        <input type="hidden" name="team" value="@{{myTeam._id}}" >
                                    </div>
                                </div>    
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn" style="background-color:#f4726d; color:#fff;" value="Submit">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>			
    @yield('slidebar')

    @yield('body')

    <script src="{{url('media/js/jquery-1.11.1.min.js');}}"></script>
    <script src="{{url('media/js/jquery-ui.min.js');}}"></script>		
    <script src="{{url('media/js/bootstrap.min.js');}}"></script>
    <script src="{{url('media/select/js/bootstrap-select.min.js');}}"></script>
    <script src="{{url('media/js/bootstrap-angular-select.js');}}"></script>
    <script src="{{url('media/js/angularjs/angular.min.js');}}"></script>
    <script src="{{url('media/js/angularjs/angular-dragdrop.min.js');}}"></script>
    <script src="{{url('media/js/angularjs/scrumframework.js');}}"></script>
    <script src="{{url('media/js/angularjs/selectteam.js');}}"></script>
    <script src="{{url('media/js/angularjs/showteam.js');}}"></script>
</body>
</html>
