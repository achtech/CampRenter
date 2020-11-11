ALTER TABLE `campers` CHANGE `description_camper` `description_camper` TEXT CHARACTER
SET utf8
COLLATE utf8_unicode_ci NULL DEFAULT NULL;
ALTER TABLE `campers`
ADD `type` VARCHAR
(100) NOT NULL AFTER `brand`;

ALTER TABLE `campers`
ADD `gearbox` VARCHAR
(100) NOT NULL AFTER `availability`;

ALTER TABLE `campers`
ADD `fuel_consumption` VARCHAR
(100) NOT NULL AFTER `gearbox`;
ALTER TABLE `campers`
ADD `capacity_fuel_tank` VARCHAR
(100) NOT NULL AFTER `fuel_consumption`;
ALTER TABLE `campers` CHANGE `included_kilometres` `included_kilometres` VARCHAR
(100) NULL DEFAULT NULL;

ALTER TABLE `campers`
ADD `allowed_total_weight` VARCHAR
(100) NOT NULL AFTER `capacity_fuel_tank`;

ALTER TABLE `campers`
ADD `performance_horse_power` VARCHAR
(100) NOT NULL AFTER `allowed_total_weight`;

ALTER TABLE `campers`
ADD `cylinder_capacity` VARCHAR
(100) NOT NULL AFTER `performance_horse_power`;
ALTER TABLE `campers`
ADD `additional_attributes` VARCHAR
(100) NOT NULL AFTER `cylinder_capacity`;

