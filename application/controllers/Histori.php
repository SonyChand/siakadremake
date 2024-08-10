<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Histori extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
	}
	public function index()
	{
		$data = [
			'user' => $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row(),
			'title' => 'Histori Rekam Medis',
		];

		// if ($data['user']) {
		// 	redirect('dashboard');
		// }

		$this->form_validation->set_rules('histori', 'Nomor Registrasi Medis atau NIK', 'trim|required', [
			'required' => '{field} harus diisi!!'
		]);

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/auth/header', $data);
			$this->load->view('histori/index', $data);
			$this->load->view('templates/auth/footer');
		} else {
			$this->searchHistori();
		}
	}

	private function searchHistori()
	{

		$histori = $this->input->post('histori', true);
		$noRM = $this->db->get_where('medik', ['no_rm' => $histori])->row();
		$nik = $this->db->get_where('pasien', ['nik' => $histori])->row();

		if ($nik) {
			$this->session->set_userdata('nik', 'yes');
			$this->session->set_userdata('id_pasien', $nik->id);
			$this->session->set_flashdata('historit', '<div class="alert alert-success" role="alert">Data ditemukan!!</div>');
			redirect('histori');
		} elseif ($noRM) {
			$nik = $this->db->get_where('pasien', ['id' => $noRM->id_pasien])->row();
			$this->session->set_userdata('nik', 'no');
			$this->session->set_userdata('id_pasien', $nik->id);
			$this->session->set_flashdata('historit', '<div class="alert alert-success" role="alert">Data ditemukan!!</div>');
			redirect('histori');
		} else {
			$this->session->unset_userdata('nik');
			$this->session->unset_userdata('id_pasien');
			$this->session->set_flashdata('histori', '<div class="alert alert-danger" role="alert">Data tidak ditemukan!!</div>');
			redirect('histori');
		}
	}
}
