<?php

require_once "../app/helpers/Auth.php";

class AdminController
{
    public function dashboard()
    {
        Auth::admin();

        require_once "../app/views/administrador/dashboard/index.php";
    }
}