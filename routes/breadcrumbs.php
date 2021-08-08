<?php

use Diglactic\Breadcrumbs\Breadcrumbs;

// admin
// home 
Breadcrumbs::for('admin',function($trail){
    $trail->push('Home',route('admin'));
});
Breadcrumbs::for('admin.loker',function($trail){
    $trail->parent('admin');
    $trail->push('Lowongan Kerja',route('admin.loker'));
});


