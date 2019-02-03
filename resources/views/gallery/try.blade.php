{{Table 'looks4rent_db.order_status' doesn't exist (SQL: select `statuses`.*, `order_status`.`order_id` as `pivot_order_id`, `order_status`.`status_id` as `pivot_status_id`, `order_status`.`name` as `pivot_name`, `order_status`.`created_at` as `pivot_created_at`, `order_status`.`updated_at` as `pivot_updated_at` from `statuses` inner join `order_status` on `statuses`.`id` = `order_status`.`status_id` where `order_status`.`order_id` = 21) }}


$cancel_order_query = "UPDATE orders SET status_id = 3 WHERE id=$id;";

$complete_order_query = "UPDATE orders SET status_id = 2 WHERE id=$id;";



