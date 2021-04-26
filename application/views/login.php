<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Welcome to CodeIgniter</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url('public/css/style.css') ?>">
</head>
<body>

<div id="container">
    <h1>Welcome to CodeIgniter!</h1>

    <div id="body">
        <?= form_open() ?>
            <div><label>Username</label></div>
            <div><?= form_input(array('name' => 'username', 'placeholder' => 'Username')) ?></div>
            <div><label>Password</label></div>
            <div><?= form_password(array('name' => 'password', 'placeholder' => 'Password', 'autocomplete' => 'new-password')) ?></div>
            <div><?= form_submit(array('value' => 'Login')) ?></div>
        <?= form_close() ?>
        <hr />
        Demo (Username/Password)
        <hr />
        yunanhelmi/yunanhelmi
        <br />fadlitn/fadlitn
        <br />inwepo/inwepo

    </div>

    <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>