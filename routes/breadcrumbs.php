<?php // routes/breadcrumbs.php

use Diglactic\Breadcrumbs\Breadcrumbs;
// dashboard
Breadcrumbs::for('dashboard', function ($trail){
    $trail->push('Dashboard', route('dashboard'));
});

Breadcrumbs::for('Provinsi', function ($trail){
    $trail->parent('dashboard');
    $trail->push('Provinsi', route('province.index'));
});

Breadcrumbs::for('Tambah Data Provinsi', function ($trail){
    $trail->parent('dashboard');
    $trail->push('Provinsi', route('province.index'));
    $trail->push('Tambah Data', route('province.create'));
});

Breadcrumbs::for('Edit Data Provinsi', function ($trail, $province){
    $trail->parent('dashboard');
    $trail->push('Provinsi', route('province.index'));
    $trail->push('Edit Data', route('province.edit', $province));
});

Breadcrumbs::for('Kabupaten/Kota', function ($trail, $province){
    $trail->parent('dashboard');
    $trail->push('Provinsi', route('province.index'));
    $trail->push('Kabupaten/Kota', route('city.index', $province));
});

Breadcrumbs::for('Tambah Data', function ($trail, $province){
    $trail->parent('dashboard');
    $trail->push('Provinsi', route('province.index'));
    $trail->push('Kabupaten/Kota', route('city.index', $province));
    $trail->push('Tambah Data', route('city.create', $province));
});

Breadcrumbs::for('Edit Data', function ($trail, $province, $city){
    $trail->parent('dashboard');
    $trail->push('Provinsi', route('province.index'));
    $trail->push('Kabupaten/Kota', route('city.index', $province));
    $trail->push('Edit Data', route('city.edit', [$province, $city]));
});

Breadcrumbs::for('Wisata', function ($trail){
    $trail->parent('dashboard');
    $trail->push('Wisata', route('content.index'));
});

Breadcrumbs::for('Tambah Data Wisata', function ($trail){
    $trail->parent('dashboard');
    $trail->push('Wisata', route('content.index'));
    $trail->push('Tambah Data', route('content.create'));
});

Breadcrumbs::for('Edit Data Wisata', function ($trail, $content){
    $trail->parent('dashboard');
    $trail->push('Wisata', route('content.index'));
    $trail->push('Edit Data', route('content.edit', $content));
});

Breadcrumbs::for('Edit Status', function ($trail, $content){
    $trail->parent('dashboard');
    $trail->push('Wisata', route('content.index'));
    $trail->push('Edit Status', route('content.editStatus', $content));
});

Breadcrumbs::for('Lihat Data Wisata', function ($trail, $content){
    $trail->parent('dashboard');
    $trail->push('Wisata', route('content.index'));
    $trail->push('Lihat Data', route('content.show', $content));
});

Breadcrumbs::for('User', function ($trail){
    $trail->parent('dashboard');
    $trail->push('User', route('user.index'));
});

Breadcrumbs::for('Tambah Data User', function ($trail){
    $trail->parent('dashboard');
    $trail->push('User', route('user.index'));
    $trail->push('Tambah Data', route('user.create'));
});

Breadcrumbs::for('Edit Data User', function ($trail, $user){
    $trail->parent('dashboard');
    $trail->push('User', route('user.index'));
    $trail->push('Edit Data', route('user.edit', $user));
});