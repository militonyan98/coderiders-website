<!DOCTYPE html>
<html lang="en-US">
  <head>
  <title><?= $title ?></title>
    <meta charset="utf-8" />
  </head>
  <body>
		<p> Sender IP: <?= $remoteIP ?></p>
        <p> Name: <?= $name ?></p>
        <p> Email address: <?=$email?></p>
        <p> Company name: <?=$company?></p>
        <?php if($phone!=''){ ?>
            <p>Phone <?=$phone?></p>
        <?php } ?> 
        <?php if($jobTitle!=''){ ?>
            <p>Title <?=$jobTitle?></p>
        <?php } ?> 
        <p> Message: <?=$messageContent?></p>
    </body>
</html>