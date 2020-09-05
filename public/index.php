<?php

declare(strict_types=1);

require_once('../vendor/autoload.php');

use Hyacinth\Input;
use Hyacinth\Textarea;

$break = '<br><br>';

$input = new Input;
$textarea = new Textarea;

echo $input;
echo $break;
echo $textarea;