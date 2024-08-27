<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        kepala();
        date_default_timezone_set('Asia/Jakarta');
    }
    public function index()
    {
        $data = [
            'user' => $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row(),
            'title' => 'Laporan',
            'data1' => $this->db->get('siswa')->result(),
            'data2' => $this->db->get('mata_pelajaran')->result(),
            'data3' => $this->db->get('kelas')->result(),
        ];

        $this->load->view('templates/dash/header', $data);
        $this->load->view('templates/dash/sidenav', $data);
        $this->load->view('laporan/index', $data);
        $this->load->view('templates/dash/footer');
    }
}
