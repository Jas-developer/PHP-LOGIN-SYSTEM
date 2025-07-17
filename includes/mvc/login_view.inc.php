<?php

declare(strict_types =1 );

// login inputs

function check_login_errors()
{
    if(isset($_SESSION["errors_login"]))
        {
           $erros = $_SESSION["errors_login"];
           echo "<br>";

           foreach($erros as $error)
           {
             echo '<p class="form-error">'.$error.'</p>';
           };

        }
};