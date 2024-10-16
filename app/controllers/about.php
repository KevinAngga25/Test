<?php
//harus diberi extends agar dapat mengakses fungsi pada Controller.php
class about extends Controller
{
    //di kedua method ini memiliki parameter default jika tidak diisi

    //sebagai pengkondisian jika method tidak diisi
    public function index($nama = 'Kevin', $umur = '19')
    {
        //memasukkan nilai dari parameter ke array data
        $data['nama'] = $nama;
        $data['umur'] = $umur;
        $data['judul'] = 'Index';

        //memanggil fungsi view untuk header dan mengirim parameter berupa judul
        $this->view('templates/header', $data);
        //memanggil fungsi view pada Controller.php lalu mengirim parameter
        $this->view('about/index', $data);
        //memanggil fungsi view untuk footer
        $this->view('templates/footer');
    }

    public function identitas($pekerjaan = 'Mahasiswa', $umur = '19')
    {
        //memasukkan nilai dari parameter ke array data
        $data['pekerjaan'] = $pekerjaan;
        $data['umur'] = $umur;
        $data['judul'] = 'Identitas';

        //memanggil fungsi view untuk header dan mengirim parameter berupa judul 
        $this->view('templates/header', $data);
        //memanggil fungsi view pada Controller.php lalu mengirim parameter
        $this->view('about/identitas', $data);
        //memanggil fungsi view untuk footer
        $this->view('templates/footer');
    }
}
