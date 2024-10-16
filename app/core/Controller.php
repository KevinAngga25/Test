<?php

class Controller
{
    public function view($view, $data = [])
    {
        //mengakses file yang ada di folder pada app/views/ lalu disesuaikan dengan parameternya
        require_once '../app/views/' . $view . '.php';
    }
}
