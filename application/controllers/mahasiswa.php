<?php
class mahasiswa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_mahasiswa');
    }
    function index()
    {
        $data['mahasiswa'] = $this->m_mahasiswa->tampilData()->result();
        $this->load->view('mahasiswa', $data);
    }
    function hapus($nim)
    {
        $this->m_mahasiswa->hapus($nim);
        $data['mahasiswa'] = $this->m_mahasiswa->tampilData()->result();
        $this->load->view('mahasiswa', $data);
    }

    function insert(){
        $data['mahasiswa'] = $this->m_mahasiswa->tampilData()->result();
        $this->load->view('insert', $data);
    }

    function insertData(){
		$nim = $this->input->post('nim');
		$nama = $this->input->post('nama');
		$jurusan = $this->input->post('jurusan');
        $alamat = $this->input->post('alamat');
 
		$data = array(
			'nim' => $nim,
			'nama' => $nama,
			'jurusan' => $jurusan,
            'alamat' => $alamat
			);
		$this->m_mahasiswa->input_data($data,'mahasiswa');
		redirect('http://localhost/MyCi/index.php/mahasiswa');
	}
 


}