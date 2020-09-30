SELECT
    `b`.`id` AS `id`,
    `b`.`dateFrom` AS `dateFrom`,
    `b`.`dateTo` AS `dateTo`,
    (
        TO_DAYS(`b`.`dateTo`) - TO_DAYS(`b`.`dateFrom`)
    ) AS `bookingDay`,
    `e`.`equipment_name_en` AS `equipment_name_en`,
    `e`.`equipment_name_de` AS `equipment_name_de`,
    `e`.`equipment_name_fr` AS `equipment_name_fr`,
    `e`.`price_per_day` AS `price_per_day`,
    `c`.`id` AS `client_id`,
    `c`.`client_name` AS `client_name`,
    `c`.`client_last_name` AS `client_last_name`
FROM
    (
        (
            `camp`.`bookings` `b`
        JOIN `camp`.`equipments` `e`
        )
    JOIN `camp`.`clients` `c`
    )
WHERE
    (
        (`b`.`id_equipments` = `e`.`id`) AND(`b`.`id_clients` = `c`.`id`)
    )