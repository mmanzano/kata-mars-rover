<?php

namespace Code;

require_once '../vendor/autoload.php';

$input = file_get_contents("WhateverInput");

$Request = new Rover($input);