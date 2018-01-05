<?php

require INC_ROOT . '/app/routes/home.php';
require INC_ROOT . '/app/routes/errors/404.php';

require INC_ROOT . '/app/routes/auth/signup.php';
require INC_ROOT . '/app/routes/auth/activate.php';
require INC_ROOT . '/app/routes/auth/currencies.php';
require INC_ROOT . '/app/routes/auth/orders.php';
require INC_ROOT . '/app/routes/auth/rate.php';

require INC_ROOT . '/app/routes/auth/change-password.php';
require INC_ROOT . '/app/routes/auth/password/recover.php';
require INC_ROOT . '/app/routes/auth/password/reset.php';
require INC_ROOT . '/app/routes/auth/logout.php';