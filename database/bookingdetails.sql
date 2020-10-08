CREATE VIEW `v_bookings_details` AS SELECT
    `b`.`id` AS `id`,
    `b`.`start_date` AS `start_date`,
    `b`.`end_date` AS `end_date`,
    TO_DAYS(`b`.`end_date`) - TO_DAYS(`b`.`start_date`) AS `bookingDay`,
    `ca`.`label_en` AS `camper_name_en`,
    `ca`.`label_de` AS `camper_name_de`,
    `ca`.`label_fr` AS `camper_name_fr`,
    `e`.`price_per_day` AS `price_per_day`,
    `c`.`id` AS `client_id`,
    `c`.`client_name` AS `client_name`,
    `c`.`client_last_name` AS `client_last_name`
FROM
    (
        (
            (`bookings` `b`
        JOIN `campers` `e`)
        JOIN `clients` `c`
        )
    JOIN `camper_names` `ca`
    )
WHERE
    `b`.`id_campers` = `e`.`id` AND `b`.`id_clients` = `c`.`id` AND `e`.`id_campers_name` = `ca`.`id`;