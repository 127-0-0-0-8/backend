<?php

require_once __DIR__.'/router.php';

// ##################################################
// ##################################################
// ##################################################

get('/login', 'login.php');
post('/login', 'login.php');

get('/signup', 'signup.php');
post('/signup', 'signup.php');

get('/logout', 'logout.php');
post('/logout', 'logout.php');

get('/todo', 'todo.php');
post('/todo', 'todo.php');

get('/captcha/captchaImage', 'captcha/captchaImage.php');
get('/captcha/captchaImage.php', 'captcha/captchaImage.php');