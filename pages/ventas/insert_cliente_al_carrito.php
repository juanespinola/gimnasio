<?php
session_start();

print_r($_POST['alumno']);

echo '<pre>';
print_r($_SESSION);
echo '</pre>';


//TODO: debemos encontrar la manera de poner 2 form en 1 solo