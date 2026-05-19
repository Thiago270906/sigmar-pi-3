<?php

class Auth
{
    public static function check()
    {
        if(!isset($_SESSION['usuario']))
        {
            header("Location: /pi-3/public/index.php");

            exit;
        }
    }

    public static function admin()
    {
        self::check();

        if($_SESSION['usuario']['cargo'] != 'admin')
        {
            die("Acesso negado");
        }
    }

    public static function tecnico()
    {
        self::check();

        if($_SESSION['usuario']['cargo'] !== 'tecnico') {

            header("Location: index.php");

            exit;
        }
    }

}

