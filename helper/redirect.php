<?php

function redirect($path)
{
    $path = ROOT.$path; // Combines ROOT(hold base URL) constant with the given $path
    echo <<<JS
    <script>
     location.href='$path';
    </script> 
    JS;
}


function islogin()
{
    if(!Session::get('logindtl'))
    {
        redirect('user');
        exit;
    }
}

?>