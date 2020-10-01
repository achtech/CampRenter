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
// Commission
Breadcrumbs::for('commission', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Commission', route('commission.index'));
});

// Promotion
Breadcrumbs::for('promotion', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Promotion', route('promotion.index'));
});

// Booking
Breadcrumbs::for('booking', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Booking', route('booking.index'));
});

// Booking details
Breadcrumbs::for('detail_booking', function ($trail,$booking) {
    $trail->parent('booking');
    $trail->push('Booking detail:'.$booking->camperNamer, route('booking.show'));
});

//  Home >Avatar
Breadcrumbs::for('avatar', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Avatar', route('avatar.index'));
});

// Home > Avatar > New avatar
Breadcrumbs::for('add_avatar', function ($trail) {
    $trail->parent('avatar');
    $trail->push('New avatar', route('avatar.create'));
});

// Home > Avatar > ediy [Category]
Breadcrumbs::for('edit_avatar', function ($trail, $category) {
    $trail->parent('avatar');
    $trail->push('Edit avatar', route('avatar.edit'));
});

// Message
Breadcrumbs::for('message', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Message', route('message.index'));
});

// Message
Breadcrumbs::for('add_message', function ($trail) {
    $trail->parent('message');
    $trail->push('New Message', route('message.create'));
});

// Message
Breadcrumbs::for('edit_message', function ($trail) {
    $trail->parent('message');
    $trail->push('Edit Message', route('message.edit'));
});

?>
