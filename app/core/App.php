<?php

class App
{
    //mengatur nilai default semisal tidak mengisi controller, method, dan parameternya
    // pada url
    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseurl();
        // var_dump($url);

        //pengecekan apakah ada file dengan nama url[0] di folder controllers
        //kalau ada maka $controller akan diisi dengan $url[0] yang diisi oleh user
        if (file_exists('../app/controllers/' . $url[0] . '.php')) {
            $this->controller = $url[0];
            //lalu url[0] akan dihapus
            unset($url[0]);
            // var_dump($url);
        }

        //mengambil controller pada folder controllers
        require_once '../app/controllers/' . $this->controller . '.php';
        //membuat object
        $this->controller = new $this->controller;

        //pengecekan apakah url[1] ditulis oleh user
        if (isset($url[1])) {
            //kalau iya maka dilakukan pengecekan method pada object $controller
            if (method_exists($this->controller, $url[1])) {
                //kalau ada maka $method ada diisi nilai dengan $url[1] yang diisi user 
                //lalu $url[1] akan dihapus
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        //pengecekan jika url masih berisi nilai / tidak empty 
        if (!empty($url)) {
            //kalau masih berisi nilai maka $params akan diisi dengan array dengan nilai $url 
            $this->params = array_values($url);
        }

        //menjalankan controller & method, serta mengirimkan parameter jika ada
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseurl()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
        // else {
        //     $url[0] = $this->controller;
        //     return $url;
        // }
    }
}
