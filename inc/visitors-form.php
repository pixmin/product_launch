<?php
if (isset($_POST['name']) && isset($_POST['email'])){
    $msg = add_visitor($_POST['name'], $_POST['email']);
}
if (isset($msg) && $msg != ""){
    echo $msg;
    if ($msg == "Your are now registered.") {
        header( "Refresh:2; url=".get_home_url(), true, 303);
    }
}
?>

<form action="" method="post">
    <label for="name">Name: </label>
    <input type="text" name="name" placeholder="Enter your name">
    <label for="email">Email: </label>
    <input type="email" name="email" placeholder="Enter your email address">
    <input type="submit" value="Send">
</form>
