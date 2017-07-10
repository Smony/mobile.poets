<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, minimal-ui">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <link rel="apple-touch-startup-image" media="(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2)" href="apple-touch-startup-image-640x1096.png">

    <?php vendor\core\base\View::getMeta();?>

    <link rel="stylesheet" href="/mobile/css/framework7.css">
    <link rel="stylesheet" href="/mobile/style.css">
    <link rel="stylesheet" href="/mobile/css/colors/red.css">
    <link type="text/css" rel="stylesheet" href="/mobile/css/swipebox.css" />
    <link type="text/css" rel="stylesheet" href="/mobile/css/animations.css" />
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,700,900' rel='stylesheet' type='text/css'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet' type='text/css'>

</head>
<body id="mobile_wrap">

<?php echo $content; ?>

<script type="text/javascript" src="/mobile/js/jquery-1.10.1.min.js"></script>
<script type="text/javascript" src="/mobile/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="/mobile/js/framework7.js"></script>
<script type="text/javascript" src="/mobile/js/my-app.js"></script>
<script type="text/javascript" src="/mobile/js/jquery.swipebox.js"></script>
<script type="text/javascript" src="/mobile/js/email.js"></script>
<?php foreach ($scripts as $script){echo $script;} ?>
</body>
</html>