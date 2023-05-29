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
    $trail->push('Tambah Data Provinsi', route('province.create'));
});

Breadcrumbs::for('Edit Data Provinsi', function ($trail, $province){
    $trail->parent('dashboard');
    $trail->push('Provinsi', route('province.index'));
    $trail->push('Edit Data Provinsi', route('province.edit', $province));
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