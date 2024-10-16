<?php
//harus diberi extends agar dapat mengakses fungsi pada Controller.php
class Home extends Controller
{
    //method index pada controller home
    public function index()
    {
        //memasukkan nilai dari parameter ke array data
        $data['judul'] = 'Home';

        //memanggil fungsi view untuk header dan mengirim parameter berupa judul
        $this->view('templates/header', $data);
        //memanggil fungsi view pada Controller.php lalu mengirim parameter
        $this->view('home/index');
        //memanggil fungsi view untuk footer
        $this->view('templates/footer');
    }
}
