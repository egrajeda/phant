#!/usr/bin/env php
<?php
require_once __DIR__ . '/lib/termcolor.php';
require_once __DIR__ . '/lib/var_dump_cli.php';

echo "Phant v1.0\n\n";

$var_dump_function
    = (isset($_SERVER['argv'][1]) && ($_SERVER['argv'][1] === '-c'))
    ? 'var_dump_cli'
    : 'var_dump';

while (true) {
    $input = trim(readline("> "));
    if ($input == "") {
        continue;
    }

    readline_add_history($input);

    if (@eval("\$result = $input;") === FALSE) {
        eval("$input;");
    } else {
        $var_dump_function($result);
    }
}

/* End of file phant.php */