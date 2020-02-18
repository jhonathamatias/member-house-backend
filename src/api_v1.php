<?php

$group->post('/create', 'Mhouse\Controllers\User:create');
$group->get('/all', 'Mhouse\Controllers\User:all');

$group->get('/auth', 'User:auth');
