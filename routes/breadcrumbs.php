<?php

// Home

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::for('dashboard', function ($trail) {
    $trail->push(__('backend.dashboard.breadcrumb'), route('dashboard'));
});

// Home > About
Breadcrumbs::for('user', function ($trail) {
    $trail->parent('dashboard');
    $trail->push(__('backend.users.breadcrumb'), route('user.index'));
});

// Home > Blog
Breadcrumbs::for('add_user', function ($trail) {
    $trail->parent('user');
    $trail->push(__('backend.new_user.breadcrumb'), route('user.create'));
});

// Home > Blog > [Category]
Breadcrumbs::for('edit_user', function ($trail, $id) {
    $trail->parent('user');
    $trail->push(__('backend.edit_user.breadcrumb'), route('user.edit', $id));
});
//client
Breadcrumbs::for('client', function ($trail) {
    $trail->parent('dashboard');
    $trail->push(__('backend.client.breadcrumb'), route('admin.client.index'));
});
//billings
Breadcrumbs::for('billing', function ($trail) {
    $trail->parent('dashboard');
    $trail->push(__('backend.billing.breadcrumb'), route('billing.index'));
});
//billings
Breadcrumbs::for('billing_bookings', function ($trail) {
    $trail->parent('billing');
    $trail->push(__('backend.bookings.breadcrumb'), route('billing.index'));
});
//detail client
Breadcrumbs::for('detail_client', function ($trail, $client) {
    $trail->parent('client');
    $trail->push(__('backend.detail_client.breadcrumb'), route('client.detail', $client->id));
});
//detail camper
Breadcrumbs::for('clients_campers', function ($trail, $client) {
    $trail->parent('client');
    $trail->push(__('backend.campers_of.breadcrumb') . $client->client_name . " " . $client->client_last_name, route('client.campers', $client->id));
});
//detail camper
Breadcrumbs::for('client_bookings', function ($trail, $client) {
    $trail->parent('client');
    $trail->push(__('backend.bookings_of.breadcrumb') . $client->client_name . " " . $client->client_last_name, route('client.bookings', $client->id));
});

//rent detail
Breadcrumbs::for('rent_detail', function ($trail, $client) {
    $trail->parent('client');
    $trail->push('Rent Detail', route('client.rentDetail', $client->id));
});

// Dashboard > Insurance
Breadcrumbs::for('insurance', function ($trail) {
    $trail->parent('dashboard');
    $trail->push(__('backend.inssurance.breadcrumb'), route('insurance.index'));
});

// Dashboard > Insurance > Edit Insurance
Breadcrumbs::for('edit_insurance', function ($trail) {
    $trail->parent('insurance');
    $trail->push(__('backend.edit_inssurance.breadcrumb'), route('insurance.edit'));
});

// Dashboard > Insurance > Create Insurance
Breadcrumbs::for('create_insurance', function ($trail) {
    $trail->parent('insurance');
    $trail->push(__('backend.create_inssurance.breadcrumb'), route('insurance.create'));
});

// Dashboard > insurance_extra
Breadcrumbs::for('insurance_extra', function ($trail) {
    $trail->parent('dashboard');
    $trail->push(__('backend.inssurance_extra.breadcrumb'), route('insuranceExtra.index'));
});

// Dashboard > Insurance > Edit Insurance
Breadcrumbs::for('edit_insurance_extra', function ($trail, $data) {
    $trail->parent('insurance_extra');
    $trail->push(__('backend.edit_inssurance_extra.breadcrumb'), route('inssuranceExtra.edit', $data->id));
});

// Dashboard > Insurance > Create Insurance
Breadcrumbs::for('create_insurance_extra', function ($trail) {
    $trail->parent('insurance_extra');
    $trail->push(__('backend.create_inssurance_extra.breadcrumb'), route('insuranceExtra.create'));
});

// Dashboard > Camper
Breadcrumbs::for('camper', function ($trail) {
    $trail->parent('dashboard');
    $trail->push(__('backend.camper.breadcrumb'), route('camper.index'));
});

// Dashboard > Camper > Details Camper
Breadcrumbs::for('details_camper', function ($trail) {
    $trail->parent('camper');
    $trail->push(__('backend.detail_camper.breadcrumb'), route('camper.index'));
});

// Dashboard > Camper > Review Camper
Breadcrumbs::for('camper_reviews', function ($trail, $camper) {
    $trail->parent('camper');
    $trail->push(__('backend.reviews_camper.breadcrumb') . ": " . $camper->camper_name, route('camper.reviews', $camper->id));
});

// settings
Breadcrumbs::for('settings', function ($trail) {
    $trail->push(__('backend.settings.breadcrumb'));
});

// Settings > Fuel
Breadcrumbs::for('fuel', function ($trail) {
    $trail->parent('settings');
    $trail->push(__('backend.fuel.breadcrumb'), route('fuel.index'));
});

// Settings > Fuel > Edit Fuel
Breadcrumbs::for('edit_fuel', function ($trail) {
    $trail->parent('fuel');
    $trail->push(__('backend.edit_fuel.breadcrumb'), route('fuel.index'));
});

// Settings > Fuel > Create Fuel
Breadcrumbs::for('create_fuel', function ($trail) {
    $trail->parent('fuel');
    $trail->push(__('backend.create_fuel.breadcrumb'), route('fuel.index'));
});

// Settings > CamperCategory
Breadcrumbs::for('camperCategory', function ($trail) {
    $trail->parent('settings');
    $trail->push(__('backend.camper_category.breadcrumb'), route('camperCategory.index'));
});

// Settings > CamperCategory > Edit CamperCategory
Breadcrumbs::for('edit_camperCategory', function ($trail) {
    $trail->parent('camperCategory');
    $trail->push(__('backend.edit_camper_category.breadcrumb'), route('camperCategory.index'));
});

// Settings > CamperCategory > Create CamperCategory
Breadcrumbs::for('create_camperCategory', function ($trail) {
    $trail->parent('camperCategory');
    $trail->push(__('backend.create_camper_category.breadcrumb'), route('camperCategory.index'));
});

// Settings > CamperSubCategory
Breadcrumbs::for('camperSubCategory', function ($trail) {
    $trail->parent('settings');
    $trail->push(__('backend.camper_sub_category.breadcrumb'), route('camperSubCategory.index'));
});

// Settings > camperSubCategory > Edit camperSubCategory
Breadcrumbs::for('edit_camperSubCategory', function ($trail) {
    $trail->parent('camperSubCategory');
    $trail->push(__('backend.edit_camper_sub_category.breadcrumb'), route('camperSubCategory.index'));
});

// Settings > CamperCategory > Create CamperCategory
Breadcrumbs::for('create_camperSubCategory', function ($trail) {
    $trail->parent('camperCategory');
    $trail->push(__('backend.create_camper_sub_category.breadcrumb'), route('camperCategory.index'));
});

// Settings > CamperCategory > Edit CamperCategory
Breadcrumbs::for('edit_camperStatus', function ($trail, $data) {
    $trail->parent('camperStatus');
    $trail->push(__('backend.edit_camper_status.breadcrumb'), route('camperStatus.edit', $data->id));
});

// Settings > CamperCategory > Create CamperCategory
Breadcrumbs::for('create_camperStatus', function ($trail) {
    $trail->parent('camperStatus');
    $trail->push(__('backend.create_camper_status.breadcrumb'), route('camperStatus.create'));
});

// Settings > LicenceCategory
Breadcrumbs::for('licenceCategory', function ($trail) {
    $trail->parent('settings');
    $trail->push(__('backend.licence_category.breadcrumb'), route('licenceCategory.index'));
});

// Settings > LicenceCategory > Edit LicenceCategory
Breadcrumbs::for('edit_licenceCategory', function ($trail) {
    $trail->parent('licenceCategory');
    $trail->push(__('backend.edit_licence_category.breadcrumb'), route('licenceCategory.index'));
});

// Settings > LicenceCategory > Create LicenceCategory
Breadcrumbs::for('create_licenceCategory', function ($trail) {
    $trail->parent('licenceCategory');
    $trail->push(__('backend.create_licence_category.breadcrumb'), route('licenceCategory.index'));
});

// Settings > Transmission
Breadcrumbs::for('transmission', function ($trail) {
    $trail->parent('settings');
    $trail->push(__('backend.transmission.breadcrumb'), route('transmission.index'));
});

// Settings > Transmission > Edit Transmission
Breadcrumbs::for('edit_transmission', function ($trail) {
    $trail->parent('transmission');
    $trail->push(__('backend.edit_transmission.breadcrumb'), route('transmission.index'));
});

// Settings > Transmission > Create Transmission
Breadcrumbs::for('create_transmission', function ($trail) {
    $trail->parent('transmission');
    $trail->push(__('backend.create_transmission.breadcrumb'), route('transmission.index'));
});

Breadcrumbs::for('profile', function ($trail) {
    $trail->parent('dashboard');
    $trail->push(__('backend.profile.breadcrumb'), route('user.profile'));
});

Breadcrumbs::for('edit_profile', function ($trail) {
    $trail->parent('profile');
    $trail->push(__('backend.update_profile.breadcrumb'), route('user.updateProfile'));
});
Breadcrumbs::for('change_password', function ($trail) {
    $trail->parent('profile');
    $trail->push(__('backend.change_password.breadcrumb'), route('user.changePassword'));
});

// Promotion
Breadcrumbs::for('promotion', function ($trail) {
    $trail->parent('settings');
    $trail->push(__('backend.promotion.breadcrumb'), route('promotion.index'));
});

// Settings > Transmission > Edit Transmission
Breadcrumbs::for('edit_promotion', function ($trail, $data) {
    $trail->parent('promotion');
    $trail->push(__('backend.edit_promotion.breadcrumb'), route('promotion.edit', $data->id));
});

// Settings > Transmission > Create Transmission
Breadcrumbs::for('create_promotion', function ($trail) {
    $trail->parent('promotion');
    $trail->push(__('backend.create_promotion.breadcrumb'), route('promotion.create'));
});

// Booking
Breadcrumbs::for('booking', function ($trail) {
    $trail->parent('dashboard');
    $trail->push(__('backend.booking.breadcrumb'), route('booking.index'));
});

// Booking details
Breadcrumbs::for('detail_booking', function ($trail, $data) {
    $trail->parent('booking');
    $trail->push(__('backend.booking_detail.breadcrumb'), route('booking.search', $data->owner_name));
});
// Booking details
Breadcrumbs::for('chat_booking', function ($trail, $id) {
    $trail->parent('booking');
    $trail->push(__('backend.chat_detail.breadcrumb'), route('booking.chat', $id));
});

//  Home >Avatar
Breadcrumbs::for('avatar', function ($trail) {
    $trail->parent('settings');
    $trail->push(__('backend.avatar.breadcrumb'), route('avatar.index'));
});

// Home > Avatar > New avatar
Breadcrumbs::for('add_avatar', function ($trail) {
    $trail->parent('avatar');
    $trail->push(__('backend.new_avatar.breadcrumb'), route('avatar.create'));
});

// Home > Avatar > ediy [Category]
Breadcrumbs::for('edit_avatar', function ($trail, $avatar) {
    $trail->parent('avatar');
    $trail->push(__('backend.edit_avatar.breadcrumb'), route('avatar.edit', $avatar->id));
});

//  Home >Blog
Breadcrumbs::for('blog', function ($trail) {
    $trail->parent('dashboard');
    $trail->push(__('backend.blog.breadcrumb'), route('admin.blog.index'));
});

// Home > Blog > New blog
Breadcrumbs::for('add_blog', function ($trail) {
    $trail->parent('blog');
    $trail->push(__('backend.new_blog.breadcrumb'), route('admin.blog.create'));
});

// Home > Blog > edit [Category]
Breadcrumbs::for('show_blog', function ($trail, $blog) {
    $trail->parent('blog');
    $trail->push(__('backend.show_blog.breadcrumb'), route('admin.blog.show', $blog->id));
});

// Home > Blog > edit [Category]
Breadcrumbs::for('edit_blog', function ($trail, $blog) {
    $trail->parent('blog');
    $trail->push(__('backend.edit_blog.breadcrumb'), route('admin.blog.edit', $blog->id));
});

// Message
Breadcrumbs::for('message', function ($trail) {
    $trail->parent('dashboard');
    $trail->push(__('backend.message.breadcrumb'), route('message.index'));
});

// Message
Breadcrumbs::for('add_message', function ($trail) {
    $trail->parent('message');
    $trail->push(__('backend.new_message.breadcrumb'), route('message.create'));
});

// Message
Breadcrumbs::for('edit_message', function ($trail, $messageId) {
    $trail->parent('message');
    $trail->push(__('backend.edit_message.breadcrumb'), route('message.edit', $messageId));
});

// Message
Breadcrumbs::for('detail_message', function ($trail, $id) {
    $trail->parent('message');
    $trail->push(__('backend.detail_message.breadcrumb'), route('message.show', $id));
});
// Message
Breadcrumbs::for('send_message', function ($trail, $id) {
    $trail->parent('detail_message', $id);
    $trail->push(__('backend.send_message.breadcrumb'), route('message.sendEmailToClient', $id));
});
// Settings > backup
Breadcrumbs::for('backup', function ($trail) {
    $trail->parent('settings');
    $trail->push(__('backend.backup.breadcrumb'), route('backup.index'));
});
/************************************************************************************* FRONTEND *************************************************************/
// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push(__('front.home.breadcrumb'), route('home.index'));
});

// Home > my campers
Breadcrumbs::for('myCampers', function ($trail) {
    $trail->parent('home');
    $trail->push(trans('front.myCampers.breadcrumb'), route('frontend.clients.camper'));
});

// Home > my campers
Breadcrumbs::for('bookmarks', function ($trail) {
    $trail->parent('home');
    $trail->push(__('front.bookmarks.breadcrumb'), route('frontend.clients.bookmark'));
});

// Home > bookmarks
Breadcrumbs::for('messages', function ($trail) {
    $trail->parent('home');
    $trail->push(__('front.messages.breadcrumb'), route('frontend.clients.message'));
});

// Home > notification
Breadcrumbs::for('notifications', function ($trail) {
    $trail->parent('home');
    $trail->push(__('front.notifications.breadcrumb'), route('frontend.clients.notification'));
});

// Home > Bookings
Breadcrumbs::for('bookings', function ($trail) {
    $trail->parent('home');
    $trail->push(__('front.bookings.breadcrumb'), route('frontend.clients.booking'));
});

// Home > Bookings > Details
Breadcrumbs::for('bookings_detail', function ($trail, $id) {
    $trail->parent('bookings');
    $trail->push(__('front.bookings_detail.breadcrumb'), route('booking.owner_booking.detail', $id));
});

// Home > Bookings > Process
Breadcrumbs::for('bookings_process', function ($trail, $id) {
    $trail->parent('bookings');
    $trail->push(__('front.bookings_process.breadcrumb'), route('booking.renter_booking.process', $id));
});

// Home > Wallets
Breadcrumbs::for('wallets', function ($trail) {
    $trail->parent('home');
    $trail->push(__('front.wallets.breadcrumb'), route('frontend.clients.wallet'));
});

// Home > Reviews
Breadcrumbs::for('reviews', function ($trail) {
    $trail->parent('home');
    $trail->push(__('front.reviews.breadcrumb'), route('frontend.clients.review'));
});

// Home > Reviews > feedback
Breadcrumbs::for('reviews_feedback', function ($trail, $id) {
    $trail->parent('reviews');
    $trail->push(__('front.reviews_feedback.breadcrumb'), route('frontend.review.add_feedback', $id));
});

// Home > Reviews > edit
Breadcrumbs::for('reviews_edit', function ($trail, $id) {
    $trail->parent('reviews');
    $trail->push(__('front.reviews_edit.breadcrumb'), route('frontend.review.edit_review', $id));
});

// Home > Rent out
Breadcrumbs::for('rentOut', function ($trail) {
    $trail->parent('home');
    $trail->push(__('front.rentOut.breadcrumb'), route('rent_out'));
});

// Home > Profil
Breadcrumbs::for('profil', function ($trail) {
    $trail->parent('home');
    $trail->push(__('front.profil.breadcrumb'), route('clients.user.profile'));
});
