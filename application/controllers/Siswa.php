<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        siswa();
        date_default_timezone_set('Asia/Jakarta');
    }

    public function nilai()
    {
        $data = [
            'user' => $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row(),
            'title' => 'Nilai',
        ];

        $siswa = $this->db->get_where('siswa', ['id_user' => $data['user']->id])->row();
        $data['dataTab'] = $this->db->get_where('rapor', ['id_siswa' => $siswa->id])->result();

        $this->load->view('templates/dash/header', $data);
        $this->load->view('templates/dash/sidenav', $data);
        $this->load->view('siswa/index', $data);
        $this->load->view('templates/dash/footer');
    }
}
