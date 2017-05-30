<?php
if (isset($_POST['name']) && isset($_POST['email'])){
    $msg = add_visitor($_POST['name'], $_POST['email'], $_POST['format']);
}
if (isset($msg) && $msg != ""){
    echo $msg;
    if ($msg == get_post_meta(6, 'message', true)) {
        header( "Refresh:2; url=".get_home_url(), true, 303);
    }
}
?>

<form action="" method="post">
    <label for="name">Name: </label>
    <input type="text" name="name" placeholder="Enter your name">
    <label for="email">Email: </label>
    <input type="email" name="email" placeholder="Enter your email address">
    <label for="format">Format: </label>
    <select name="format">
        <option value="html">html</option>
        <option value="text">text</option>
    </select>
    <input type="submit" value="Send">
</form>
