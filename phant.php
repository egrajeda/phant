#!/usr/bin/env php
<?php

echo "Phant v1.0\n\n";

while (true) {
    $input = trim(readline("> "));
    if ($input == "") {
        continue;
    }

    readline_add_history($input);

    if (@eval("\$result = $input;") === FALSE) {
        eval("$input;");
    } else {
        var_dump($result);
    }
}
