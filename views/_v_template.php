<!DOCTYPE html>
<html>
    <head>
        <title><?php if(isset($title)) echo $title; ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap -->
        <link href="/css/bootstrap.min.css" rel="stylesheet" media="screen">

        <!-- custom styles -->
        <link href="/css/styles.css" rel="stylesheet" media="screen">
        					
        <!-- Controller Specific JS/CSS -->
        <?php if(isset($client_files_head)) echo $client_files_head; ?>
	
    </head>

    <body>	

    <?php if(isset($content)) echo $content; ?>

    <!-- jQuery -->
    <script src="//code.jquery.com/jquery.js"></script>
    <!-- Twitter Bootstrap JS stuff -->
    <script src="/js/bootstrap.min.js"></script>
    <?php if(isset($client_files_body)) echo $client_files_body; ?>
</body>
</html>