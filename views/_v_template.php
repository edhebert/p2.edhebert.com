<!DOCTYPE html>
<html>
    <head>
        <title><?php if(isset($title)) echo $title; ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Google Web Font -->
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,700' rel='stylesheet' type='text/css'>

        <!-- Bootstrap -->
        <link href="/css/bootstrap.min.css" rel="stylesheet" media="screen">

        <!-- custom styles -->
        <link href="/css/styles.css" rel="stylesheet" media="screen">
        					
        <!-- Controller Specific JS/CSS -->
        <?php if(isset($client_files_head)) echo $client_files_head; ?>
	
    </head>

    <body>	

        <!-- Blabbr nav -->
        <header class="navbar navbar-inverse navbar-static-top" role="banner">
            <div class="container">
            <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <a href="/" class="navbar-brand">Blabbr</a>
            </div>
                <nav class="collapse navbar-collapse pull-right" role="navigation">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="../getting-started">Getting started</a>
                        </li>
                        <li>
                            <a href="../css">CSS</a>
                        </li>
                        <li class="active">
                            <a href="../components">Components</a>
                        </li>
                        <li>
                            <a href="../javascript">JavaScript</a>
                        </li>
                        <li>
                            <a href="../customize">Customize</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </header>

        <div class="container">
            <div class="row well well-lg">
                <?php if(isset($content)) echo $content; ?>
            </div>
        </div> <!-- container -->

        <!-- jQuery -->
        <script src="//code.jquery.com/jquery.js"></script>

        <!-- Twitter Bootstrap JS stuff -->
        <script src="/js/bootstrap.min.js"></script>

        <?php if(isset($client_files_body)) echo $client_files_body; ?>
        
    </body>
</html>