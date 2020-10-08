<?php

// Home
Breadcrumbs::for('dashboard', function ($trail) {
    $trail->push('Dashboard', route('dashboard'));
});

// Home > About
Breadcrumbs::for('user', function ($trail) {
    $trail->parent('dashboard');
    $trail->push(__('backend.users.breadcrumb'), route('user.index'));
});

// Home > Blog
Breadcrumbs::for('add_user', function ($trail) {
    $trail->parent('user');
    $trail->push('New user', route('user.create'));
});

// Home > Blog > [Category]
Breadcrumbs::for('edit_user', function ($trail, $id) {
    $trail->parent('user');
    $trail->push('Edit user', route('user.edit',$id));
});
//client
Breadcrumbs::for('client', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Client', route('client.index'));
});
//billings
Breadcrumbs::for('billing', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Billing', route('billing.index'));
});
//detail client
Breadcrumbs::for('detail_client', function ($trail, $client) {
    $trail->parent('client');
    $trail->push('Detail Client', route('client.detail', $client->id));
});
//detail camper
Breadcrumbs::for('detail_camper', function ($trail, $client) {
    $trail->parent('client');
    $trail->push('Detail Camper', route('client.camperDetail', $client->id));
});

//rent detail
Breadcrumbs::for('rent_detail', function ($trail, $client) {
    $trail->parent('client');
    $trail->push('Rent Detail', route('client.rentDetail', $client->id));
});

// Dashboard > Insurance
Breadcrumbs::for('insurance', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Insurances', route('insurance.index'));
});

// Dashboard > Insurance > Edit Insurance
Breadcrumbs::for('edit_insurance', function ($trail) {
    $trail->parent('insurance');
    $trail->push('Edit Insurance', route('insurance.index'));
});

// Dashboard > Insurance > Create Insurance
Breadcrumbs::for('create_insurance', function ($trail) {
    $trail->parent('insurance');
    $trail->push('Create Insurance', route('insurance.index'));
});

// Dashboard > insurance_company
Breadcrumbs::for('insurance_company', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Insurances company', route('inssuranceCompany.index'));
});

// Dashboard > Insurance > Edit Insurance
Breadcrumbs::for('edit_insurance_company', function ($trail,$data) {
    $trail->parent('insurance_company');
    $trail->push('Edit Insurance company', route('inssuranceCompany.edit', $data->id));
});

// Dashboard > Insurance > Create Insurance
Breadcrumbs::for('create_insurance_company', function ($trail) {
    $trail->parent('insurance_company');
    $trail->push('Create Insurance company', route('inssuranceCompany.create'));
});

// Dashboard > Camper
Breadcrumbs::for('camper', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Camper', route('camper.index'));
});

// Dashboard > Camper > Details Camper
Breadcrumbs::for('details_camper', function ($trail) {
    $trail->parent('camper');
    $trail->push('Details Camper', route('camper.index'));
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

// Settings > Fuel > Edit Fuel
Breadcrumbs::for('edit_fuel', function ($trail) {
    $trail->parent('fuel');
    $trail->push('Edit Fuel', route('fuel.index'));
});

// Settings > Fuel > Create Fuel
Breadcrumbs::for('create_fuel', function ($trail) {
    $trail->parent('fuel');
    $trail->push('Create Fuel', route('fuel.index'));
});

// Settings > CamperCategory
Breadcrumbs::for('camperCategory', function ($trail) {
    $trail->parent('settings');
    $trail->push('Camper Category', route('camperCategory.index'));
});

// Settings > CamperCategory > Edit CamperCategory
Breadcrumbs::for('edit_camperCategory', function ($trail) {
    $trail->parent('camperCategory');
    $trail->push('Edit Camper Category', route('camperCategory.index'));
});

// Settings > CamperCategory > Create CamperCategory
Breadcrumbs::for('create_camperCategory', function ($trail) {
    $trail->parent('camperCategory');
    $trail->push('Create Camper Category', route('camperCategory.index'));
});


// Settings > Camper Names
Breadcrumbs::for('camperNames', function ($trail) {
    $trail->parent('settings');
    $trail->push('Camper names', route('camperNames.index'));
});

// Settings > CamperCategory > Edit CamperCategory
Breadcrumbs::for('edit_camperNames', function ($trail, $data) {
    $trail->parent('camperNames');
    $trail->push('Edit Camper names', route('camperNames.edit',$data->id));
});

// Settings > CamperCategory > Create CamperCategory
Breadcrumbs::for('create_camperNames', function ($trail) {
    $trail->parent('camperNames');
    $trail->push('Create Camper Names', route('camperNames.create'));
});

// Settings > Camper Names
Breadcrumbs::for('camperStatus', function ($trail) {
    $trail->parent('settings');
    $trail->push('Camper status', route('camperStatus.index'));
});

// Settings > CamperCategory > Edit CamperCategory
Breadcrumbs::for('edit_camperStatus', function ($trail, $data) {
    $trail->parent('camperStatus');
    $trail->push('Edit Camper Status', route('camperStatus.edit',$data->id));
});

// Settings > CamperCategory > Create CamperCategory
Breadcrumbs::for('create_camperStatus', function ($trail) {
    $trail->parent('camperStatus');
    $trail->push('Create Camper Status', route('camperStatus.create'));
});

// Settings > LicenceCategory
Breadcrumbs::for('licenceCategory', function ($trail) {
    $trail->parent('settings');
    $trail->push('Licence Category', route('licenceCategory.index'));
});

// Settings > LicenceCategory > Edit LicenceCategory
Breadcrumbs::for('edit_licenceCategory', function ($trail) {
    $trail->parent('licenceCategory');
    $trail->push('Edit Licence Category', route('licenceCategory.index'));
});

// Settings > LicenceCategory > Create LicenceCategory
Breadcrumbs::for('create_licenceCategory', function ($trail) {
    $trail->parent('licenceCategory');
    $trail->push('Create Licence Category', route('licenceCategory.index'));
});

// Settings > Transmission
Breadcrumbs::for('transmission', function ($trail) {
    $trail->parent('settings');
    $trail->push('Transmission', route('transmission.index'));
});

// Settings > Transmission > Edit Transmission
Breadcrumbs::for('edit_transmission', function ($trail) {
    $trail->parent('transmission');
    $trail->push('Edit Transmission', route('transmission.index'));
});

// Settings > Transmission > Create Transmission
Breadcrumbs::for('create_transmission', function ($trail) {
    $trail->parent('transmission');
    $trail->push('Create Transmission', route('transmission.index'));
});

Breadcrumbs::for('profile', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Profile', route('user.profile'));
});

Breadcrumbs::for('edit_profile', function ($trail) {
    $trail->parent('profile');
    $trail->push('Update profile', route('user.updateProfile'));
});
Breadcrumbs::for('change_password', function ($trail) {
    $trail->parent('profile');
    $trail->push('Change password', route('user.changePassword'));
});
// Commission
Breadcrumbs::for('commission', function ($trail) {
    $trail->parent('settings');
    $trail->push('Commission', route('commission.index'));
});

// Promotion
Breadcrumbs::for('promotion', function ($trail) {
    $trail->parent('settings');
    $trail->push('Promotion', route('promotion.index'));
});

// Booking
Breadcrumbs::for('booking', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Booking', route('booking.index'));
});

// Booking details
Breadcrumbs::for('detail_booking', function ($trail,$data) {
    $trail->parent('booking');
    $trail->push('Booking detail', route('booking.search',$data->client_name));
});
// Booking details
Breadcrumbs::for('chat_booking', function ($trail,$id) {
    $trail->parent('booking');
    $trail->push('Chat detail', route('booking.chat',$id));
});


//  Home >Avatar
Breadcrumbs::for('avatar', function ($trail) {
    $trail->parent('settings');
    $trail->push('Avatar', route('avatar.index'));
});

// Home > Avatar > New avatar
Breadcrumbs::for('add_avatar', function ($trail) {
    $trail->parent('avatar');
    $trail->push('New avatar', route('avatar.create'));
});

// Home > Avatar > ediy [Category]
Breadcrumbs::for('edit_avatar', function ($trail, $avatar) {
    $trail->parent('avatar');
    $trail->push('Edit avatar', route('avatar.edit',$avatar->id));
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
Breadcrumbs::for('edit_message', function ($trail,$messageId) {
    $trail->parent('message');
    $trail->push('Edit Message', route('message.edit',$messageId));
});

// Message
Breadcrumbs::for('detail_message', function ($trail,$id) {
    $trail->parent('message');
    $trail->push('Detail Message', route('message.show',$id));
});

?>
