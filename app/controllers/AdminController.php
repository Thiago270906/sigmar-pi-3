<?php

require_once __DIR__ . "/../app/helpers/Auth.php";

class AdminController
{
    public function dashboard()
    {
        Auth::admin();

        require_once __DIR__ . "/../app/views/administrador/dashboard/index.php";
    }
}