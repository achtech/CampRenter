<?php

// Home
Breadcrumbs::for('dashboard', function ($trail) {
    $trail->push('Dashboard', route('dashboard'));
});

// Home > About
Breadcrumbs::for('user', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Users', route('user.index'));
});

// Home > Blog
Breadcrumbs::for('add_user', function ($trail) {
    $trail->parent('user');
    $trail->push('New user', route('user.create'));
});

// Home > Blog > [Category]
Breadcrumbs::for('edit_user', function ($trail, $category) {
    $trail->parent('user');
    $trail->push('Edit user', route('user.edit'));
});

// Dashboard > Insurance
Breadcrumbs::for('insurance', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Insurances', route('insurance.index'));
});

// settings
Breadcrumbs::for('settings', function ($trail) {
    $trail->push('Settings');
});

// Settings > Fuel
Breadcrumbs::for('fuel', function ($trail) {
    $trail->parent('settings');
    $trail->push('Fuel', route('fuel.index'));
});

// Settings > EquipmentCategory
Breadcrumbs::for('equipmentCategory', function ($trail) {
    $trail->parent('settings');
    $trail->push('Equipment Category', route('equipmentCategory.index'));
});

// Settings > LicenceCategory
Breadcrumbs::for('licenceCategory', function ($trail) {
    $trail->parent('settings');
    $trail->push('Licence Category', route('licenceCategory.index'));
});

/*
Breadcrumbs::for('edit_user', function ($trail, $category) {
    $trail->parent('user');
    $trail->push($category->title, route('category', $category->id));
});

// Home > Blog > [Category] > [Post]
Breadcrumbs::for('post', function ($trail, $post) {
    $trail->parent('category', $post->category);
    $trail->push($post->title, route('post', $post->id));
});
*/
?>