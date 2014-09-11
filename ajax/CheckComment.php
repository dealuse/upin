<?php

require_once(dirname(dirname(__FILE__)) . '/app.php');
if ($login_user_id) {
    $selector = 'commented';
    $sql = "SELECT 
  o.id AS oid,
  t.id as tid,
  t.`product` AS title,
  t.`image` AS image ,
  o.`origin` as origin
FROM
  `order` o 
  LEFT JOIN team t 
    ON t.`id` = o.`team_id` 
WHERE o.`user_id` = {$login_user_id} 
  AND o.`comment_content` IS NULL 
  AND o.state = 'pay'
ORDER BY o.`id` DESC ";
    $comment = DB::GetQueryResult($sql, true);
    if ($comment && $comment['origin']>0) {
        die(json_encode(
                        array(
                            'state' => 'Y',
                            'title' => $comment['title'],
                            'sore' => abs(round($comment['origin']))
        )));
    }
}
die(json_encode(
                array(
                    'state' => 'N'
)));
?>
