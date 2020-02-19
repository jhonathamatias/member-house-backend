<?php

//Routes for users
$group->post('/user/create', 'Mhouse\Controllers\User:create');
$group->get('/user/auth', 'Mhouse\Controllers\User:auth');
$group->get('/user/all', 'Mhouse\Controllers\User:all');