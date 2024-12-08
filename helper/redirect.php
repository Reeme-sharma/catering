<?php

function redirect($path)
{
    $path = ROOT . $path; // Combines ROOT(hold base URL) constant with the given $path
    header("location:$path"); // Sends a Location header to redirect the user
}

?>