<?php
session_start();
require('../connection.php');
"SELECT B.user_id,C.name,C.MobileNo
FROM referral_codes A
INNER JOIN referral_codes B
ON A.referral_code=B.referred_from
INNER JOIN register_table C
ON B.user_id = C.Id";
print_r($_SESSION);
?>