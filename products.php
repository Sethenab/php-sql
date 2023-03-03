<?php
session_start();
    echo('<pre>'); var_dump($_GET); 
    echo('</pre>');

    [
        'id' => $id,
        'message' => $message,
    ] = $_GET;

    require_once '_inc/header.php';
    require_once '_inc/nav.php';

?>

<h1>Products</h1>

<p>
    Message : <?= $message ?>
</p>

<?php

require_once '_inc/footer.php';

?>