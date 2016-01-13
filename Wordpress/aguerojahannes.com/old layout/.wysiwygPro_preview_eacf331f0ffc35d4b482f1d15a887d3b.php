<?php
if ($_GET['randomId'] != "GYuGRdE6I66uJS99kXAwyQz13gaeMHMrhLU_u2Ebc1obGin2FLC7NNFh7_HJB7Kc") {
    echo "Access Denied";
    exit();
}

// display the HTML code:
echo stripslashes($_POST['wproPreviewHTML']);

?>