<?php
/**
 * @var $errno ErrorHandler
 * @var $errstr ErrorHandler
 * @var $errfile ErrorHandler
 * @var $errline ErrorHandler
 */

use shop\ErrorHandler;

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Error</title>
</head>
<body>
<h1>An Error Has Occurred</h1>
<p><strong>Code: </strong> <?php echo $errno; ?> </p>
<p><strong>Message: </strong> <?php echo $errstr; ?> </p>
<p><strong>File: </strong> <?php echo $errfile; ?> </p>
<p><strong>Line: </strong> <?php echo $errline; ?> </p>
</body>
</html>
