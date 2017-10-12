<?php

require 'menu.php';
require 'helpers.php';

// Create an image resource.
$img_resource = imagecreatefromjpeg('./camping.jpg');
var_dump($img_resource);

// Save image resource.
imagepng($img_resource, './' . time() . '.png');