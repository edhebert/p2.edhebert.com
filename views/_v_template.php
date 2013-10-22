<!DOCTYPE html>
<html>
    <head>
        <title><?php if(isset($title)) echo $title . " | "; ?>Blabbr</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Google Web Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,700' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Snowburst+One' rel='stylesheet' type='text/css'>

        <!-- Bootstrap -->
        <link href="/css/bootstrap.min.css" rel="stylesheet" media="screen">

        <!-- custom styles -->
        <link href="/css/styles.css" rel="stylesheet" media="screen">
        					
        <!-- Controller Specific JS/CSS -->
        <?php if(isset($client_files_head)) echo $client_files_head; ?>
	
    </head>

    <body>
        <!-- Sticky footer wrapper -->	
        <div id="wrap">
            <!-- Blabbr nav -->
            <header class="navbar navbar-inverse navbar-static-top" role="banner">
                <div class="container">
                    <div class="navbar-header">
                        <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        </button>
                        <a href="/" class="navbar-brand"><span class="glyphicon glyphicon-bullhorn"></span>Blabbr</a>
                    </div>
                    <nav class="collapse navbar-collapse pull-right" role="navigation">
                        <ul class="nav navbar-nav">
                            <?php if ($user) : ?>
                                <li>
                                    <a href='/users/logout'>Logout</a>
                                </li>
                                <li>
                                    <a href='/users/profile'>Profile</a>
                                </li>
                            <?php else: ?>
                                <li>
                                    <a href='/users/signup'>Sign up</a>
                                </li>
                                <li>
                                    <a href='/users/login'>Log in</a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </nav>
                </div> <!-- container -->
            </header>

            <div class="container">
                <div class="row well well-lg">
                    <?php if(isset($content)) echo $content; ?>
                </div> <!-- well -->
            </div> <!-- container -->
            
            <div id="push"></div> <!-- sticky footer push -->
            
        </div> <!-- wrap -->   
        
        <div id="footer">
            <div class="container">
                <div class="row">
                    <div class="md-col-3 pull-right">
                        <p>Blabbr&apos;s &apos;PLUS ONE&apos; features include:</p>
                        <ul>
                            <li>Emailing a welcome letter to a new user.</li>
                            <li>Uploading / resizing a user profile image</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div> <!-- footer -->
        
        <!-- jQuery -->
        <script src="//code.jquery.com/jquery.js"></script>

        <!-- Twitter Bootstrap JS stuff -->
        <script src="/js/bootstrap.min.js"></script>

        <?php if(isset($client_files_body)) echo $client_files_body; ?>
        
    </body>
</html>