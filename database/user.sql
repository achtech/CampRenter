
ALTER TABLE `users` CHANGE `user_name` `name` VARCHAR(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL;
ALTER TABLE `users` ADD `telephone` VARCHAR(20) NOT NULL AFTER `updated_by`, ADD `adress` TEXT NOT NULL AFTER `telephone`, ADD `id_avatars` INT NOT NULL AFTER `adress`, ADD `role` VARCHAR(20) NOT NULL AFTER `id_avatars`;
ALTER TABLE `users` ADD `remember_token` VARCHAR(100) NOT NULL AFTER `role`;