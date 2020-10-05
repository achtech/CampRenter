CREATE VIEW `v_messages` AS SELECT
    `m`.`id` AS `id`,
    `m`.`email` AS `email`,
    `m`.`telephone` AS `telephone`,
    `m`.`subject` AS `subject`,
    `m`.`message` AS `message`,
    `m`.`status` AS `status`,
    `m`.`send_date` AS `send_date`,
    `c`.`client_name` AS `client_name`,
    `c`.`client_last_name` AS `client_last_name`,
    `a`.`image` AS `image`
FROM
    (
        (
            `messages` `m`
        JOIN `clients` `c` ON
            ((`c`.`id` = `m`.`id_client`))
        )
    JOIN `avatars` `a` ON
        ((`a`.`id` = `c`.`id_avatars`))
    );