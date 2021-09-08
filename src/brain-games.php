<?php

namespace Brain\Games\Brain\Games;

use function cli\line;
use function cli\prompt;

function greet(): void
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
}
