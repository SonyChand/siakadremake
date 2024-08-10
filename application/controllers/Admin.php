<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		supreme();
		date_default_timezone_set('Asia/Jakarta');
	}

	public function pengguna()
	{
		$data = [
			'user' => $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row(),
			'title' => 'Pengguna',
			'crumb' => 'Admin',
			'dataTab' => $this->db->get_where('pengguna', ['email !=' => $this->session->userdata('email')])->result()
		];

		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim', [
			'required' => '<strong>{field}</strong> tidak boleh kosong!'
		]);
		$this->form_validation->set_rules('email', 'Alamat Email', 'required|trim|valid_email|is_unique[pengguna.email]', [
			'required' => '<strong>{field}</strong> tidak boleh kosong!',
			'valid_email' => 'Gunakan <strong>{field}</strong> yang valid!',
			'is_unique' => '<strong>{field}</strong> "' . $this->input->post('email', true) . '" sudah terdaftar!'
		]);
		$this->form_validation->set_rules('no_hp', 'No Handphone', 'required|trim', [
			'required' => '<strong>{field}</strong> tidak boleh kosong!'
		]);
		$this->form_validation->set_rules('role', 'Akses Pengguna', 'required|trim', [
			'required' => '<strong>{field}</strong> tidak boleh kosong!'
		]);
		$this->form_validation->set_rules('status', 'Status Akun', 'required|trim', [
			'required' => '<strong>{field}</strong> tidak boleh kosong!'
		]);
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim', [
			'required' => '<strong>{field}</strong> tidak boleh kosong!'
		]);

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/dash/header', $data);
			$this->load->view('templates/dash/sidenav', $data);
			$this->load->view('admin/pengguna/index', $data);
			$this->load->view('templates/dash/footer');
		} else {

			$dataUser = [
				'nama' => $this->input->post('nama', true),
				'email' => $this->input->post('email', true),
				'password' => password_hash($this->input->post('email', true), PASSWORD_DEFAULT),
				'image' => 'default',
				'role' => $this->input->post('role', true),
				'no_hp' => str_replace(' ', '', str_replace('+', '', $this->input->post('no_hp', true))),
				'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
				'tgl_dibuat' => time(),
				'status' => $this->input->post('status', true)
			];

			$this->db->insert('pengguna', $dataUser);

			$this->session->set_flashdata('pengguna', '<div class="alert alert-success">Pengguna baru dengan email <strong>' . $this->input->post('email', true) . '</strong> berhasil ditambahkan!!</div>');
			redirect('admin/pengguna');
		}
	}


	public function ubahPengguna($id = '')
	{
		$data = [
			'user' => $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row(),
			'title' => 'Ubah Pengguna',
			'crumb' => 'Admin',
			'oneData' => $this->db->get_where('pengguna', ['id' => $id])->row(),
		];

		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim', [
			'required' => '<strong>{field}</strong> tidak boleh kosong!'
		]);
		$this->form_validation->set_rules('no_hp', 'No Handphone', 'required|trim', [
			'required' => '<strong>{field}</strong> tidak boleh kosong!'
		]);
		$this->form_validation->set_rules('role', 'Akses Pengguna', 'required|trim', [
			'required' => '<strong>{field}</strong> tidak boleh kosong!'
		]);
		$this->form_validation->set_rules('status', 'Status Akun', 'required|trim', [
			'required' => '<strong>{field}</strong> tidak boleh kosong!'
		]);
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim', [
			'required' => '<strong>{field}</strong> tidak boleh kosong!'
		]);
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/dash/header', $data);
			$this->load->view('templates/dash/sidenav', $data);
			$this->load->view('admin/pengguna/ubah', $data);
			$this->load->view('templates/dash/footer');
		} else {

			$dataUser = [
				'nama' => $this->input->post('nama', true),
				'role' => $this->input->post('role', true),
				'no_hp' => str_replace(' ', '', str_replace('+', '', $this->input->post('no_hp', true))),
				'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
				'status' => $this->input->post('status', true)
			];

			$this->db->where('id', $data['oneData']->id);
			$this->db->update('pengguna', $dataUser);


			$this->session->set_flashdata('pengguna', '<div class="alert alert-success">Pengguna dengan email <strong>' . $data['oneData']->email . '</strong> berhasil diubah!!</div>');
			redirect('admin/pengguna');
		}
	}

	public function hapusPengguna($id)
	{
		$pel = $this->db->get_where('pengguna', ['id' => $id])->row();

		$this->db->delete('pengguna', ['id' => $id]);

		$this->session->set_flashdata('pengguna', '<div class="alert alert-warning">Data Pengguna <strong>' . $pel->email . '</strong> berhasil dihapus!!</div>');
		redirect('admin/pengguna');
	}

	public function pasien()
	{
		$data = [
			'user' => $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row(),
			'title' => 'Pasien',
			'dataTab' => $this->db->get('pasien')->result()
		];

		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim', [
			'required' => '<strong>{field}</strong> tidak boleh kosong!'
		]);
		$this->form_validation->set_rules('tpt_lhr', 'Tempat Lahir', 'required|trim', [
			'required' => '<strong>{field}</strong> tidak boleh kosong!'
		]);
		$this->form_validation->set_rules('tgl_lhr', 'Tanggal Lahir', 'required|trim', [
			'required' => '<strong>{field}</strong> tidak boleh kosong!'
		]);
		$this->form_validation->set_rules('nik', 'NIK', 'required|trim', [
			'required' => '<strong>{field}</strong> tidak boleh kosong!'
		]);
		$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required|trim', [
			'required' => '<strong>{field}</strong> tidak boleh kosong!'
		]);
		$this->form_validation->set_rules('suku', 'Suku', 'required|trim', [
			'required' => '<strong>{field}</strong> tidak boleh kosong!'
		]);
		$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required|trim', [
			'required' => '<strong>{field}</strong> tidak boleh kosong!'
		]);
		$this->form_validation->set_rules('no_hp', 'No Handphone', 'required|trim', [
			'required' => '<strong>{field}</strong> tidak boleh kosong!'
		]);
		$this->form_validation->set_rules('no_telp', 'No Telepon', 'required|trim', [
			'required' => '<strong>{field}</strong> tidak boleh kosong!'
		]);
		$this->form_validation->set_rules('alamat1', 'Alamat Rumah', 'required|trim', [
			'required' => '<strong>{field}</strong> tidak boleh kosong!'
		]);
		$this->form_validation->set_rules('alamat2', 'Alamat Kantor', 'required|trim', [
			'required' => '<strong>{field}</strong> tidak boleh kosong!'
		]);

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/dash/header', $data);
			$this->load->view('templates/dash/sidenav', $data);
			$this->load->view('admin/pasien/index', $data);
			$this->load->view('templates/dash/footer');
		} else {

			$dataUser = [
				'id_rm' => kodeRM($this->input->post('nama', true), $this->input->post('nik', true)),
				'nama' => $this->input->post('nama', true),
				'tpt_lhr' => $this->input->post('tpt_lhr', true),
				'tgl_lhr' => strtotime($this->input->post('tgl_lhr', true)),
				'nik' => $this->input->post('nik', true),
				'suku' => $this->input->post('suku', true),
				'pekerjaan' => $this->input->post('pekerjaan', true),
				'no_telp' => str_replace(' ', '', str_replace('+', '', $this->input->post('no_telp', true))),
				'no_hp' => str_replace(' ', '', str_replace('+', '', $this->input->post('no_hp', true))),
				'jk' => $this->input->post('jk', true),
				'alamat1' => $this->input->post('alamat1', true),
				'alamat2' => $this->input->post('alamat2', true),
				'tgl_dibuat' => time(),
			];

			$this->db->insert('pasien', $dataUser);

			$cariPasien = $this->db->get_where('pasien', ['id_rm' => $dataUser['id_rm']])->last_row();

			$dataMedik = [
				'no_rm' => $dataUser['id_rm'],
				'id_pasien' => $cariPasien->id,
			];
			$this->db->insert('medik', $dataMedik);


			$this->session->set_flashdata('pasien', '<div class="alert alert-success">Pasien baru dengan ID RM <strong>' . $dataUser['id_rm'] . '</strong> berhasil ditambahkan!!</div>');
			redirect('admin/pasien');
		}
	}


	public function ubahPasien($id = '')
	{
		$data = [
			'user' => $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row(),
			'title' => 'Ubah Pasien',
			'oneData' => $this->db->get_where('pasien', ['id' => $id])->row(),
		];

		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim', [
			'required' => '<strong>{field}</strong> tidak boleh kosong!'
		]);
		$this->form_validation->set_rules('tpt_lhr', 'Tempat Lahir', 'required|trim', [
			'required' => '<strong>{field}</strong> tidak boleh kosong!'
		]);
		$this->form_validation->set_rules('tgl_lhr', 'Tanggal Lahir', 'required|trim', [
			'required' => '<strong>{field}</strong> tidak boleh kosong!'
		]);
		$this->form_validation->set_rules('nik', 'NIK', 'required|trim', [
			'required' => '<strong>{field}</strong> tidak boleh kosong!'
		]);
		$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required|trim', [
			'required' => '<strong>{field}</strong> tidak boleh kosong!'
		]);
		$this->form_validation->set_rules('suku', 'Suku', 'required|trim', [
			'required' => '<strong>{field}</strong> tidak boleh kosong!'
		]);
		$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required|trim', [
			'required' => '<strong>{field}</strong> tidak boleh kosong!'
		]);
		$this->form_validation->set_rules('no_hp', 'No Handphone', 'required|trim', [
			'required' => '<strong>{field}</strong> tidak boleh kosong!'
		]);
		$this->form_validation->set_rules('no_telp', 'No Telepon', 'required|trim', [
			'required' => '<strong>{field}</strong> tidak boleh kosong!'
		]);
		$this->form_validation->set_rules('alamat1', 'Alamat Rumah', 'required|trim', [
			'required' => '<strong>{field}</strong> tidak boleh kosong!'
		]);
		$this->form_validation->set_rules('alamat2', 'Alamat Kantor', 'required|trim', [
			'required' => '<strong>{field}</strong> tidak boleh kosong!'
		]);


		if ($this->form_validation->run() == false) {
			$this->load->view('templates/dash/header', $data);
			$this->load->view('templates/dash/sidenav', $data);
			$this->load->view('admin/pasien/ubah', $data);
			$this->load->view('templates/dash/footer');
		} else {

			$dataUser = [
				'nama' => $this->input->post('nama', true),
				'tpt_lhr' => $this->input->post('tpt_lhr', true),
				'tgl_lhr' => strtotime($this->input->post('tgl_lhr', true)),
				'nik' => $this->input->post('nik', true),
				'suku' => $this->input->post('suku', true),
				'pekerjaan' => $this->input->post('pekerjaan', true),
				'no_telp' => str_replace(' ', '', str_replace('+', '', $this->input->post('no_telp', true))),
				'no_hp' => str_replace(' ', '', str_replace('+', '', $this->input->post('no_hp', true))),
				'jk' => $this->input->post('jk', true),
				'alamat1' => $this->input->post('alamat1', true),
				'alamat2' => $this->input->post('alamat2', true),
			];

			$this->db->where('id', $data['oneData']->id);
			$this->db->update('pasien', $dataUser);


			$this->session->set_flashdata('pasien', '<div class="alert alert-success">Pasien dengan RM <strong>' . $data['oneData']->id_rm . '</strong> berhasil diubah!!</div>');
			redirect('admin/pasien');
		}
	}

	public function hapusPasien($id)
	{
		$pel = $this->db->get_where('pasien', ['id' => $id])->row();

		$this->db->delete('pasien', ['id' => $id]);

		$this->session->set_flashdata('pasien', '<div class="alert alert-warning">Data Pasien RM <strong>' . $pel->id_rm . '</strong> berhasil dihapus!!</div>');
		redirect('admin/pasien');
	}

	public function dokter()
	{
		$data = [
			'user' => $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row(),
			'title' => 'Dokter',
			'dataTab' => $this->db->get('dokter')->result(),
			'data1' => $this->db->get_where('pengguna', ['role' => 2, 'image' => 'default'])->result()
		];

		$this->form_validation->set_rules('id_user', 'Akun Pengguna', 'required|trim');
		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim');
		$this->form_validation->set_rules('spesialisasi', 'Spesialisasi Dokter', 'required|trim');
		$this->form_validation->set_rules('sip', 'Nomor Surat Izin Praktik', 'trim');
		$this->form_validation->set_rules('str', 'Nomor Surat Tanda Praktik', 'trim');
		$this->form_validation->set_rules('no_hp', 'Nomor Handphone', 'required|trim');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
		$this->form_validation->set_rules('status', 'Status Aktif Dokter', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/dash/header', $data);
			$this->load->view('templates/dash/sidenav', $data);
			$this->load->view('admin/dokter/index', $data);
			$this->load->view('templates/dash/footer');
		} else {
			$image = $_FILES['image']['name'];

			if ($image) {

				$config['file_name'] = md5(sha1(time() . '-' . strtolower(str_replace(' ', '', $this->input->post('nama', true))) . "@gmail.com"));
				$config['encrypt_name'] = TRUE;
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size']      = '5000';
				$config['upload_path'] = './assets/img/user/';

				if (is_dir($config['upload_path']) != true) {
					mkdir($config['upload_path'], 0777, TRUE);
				}

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('image')) {
					$img = $this->upload->data('file_name');
				} else {
					$img = 'default';
				}
			}

			if ($this->input->post('id_user', true) == "buatkan") {
				$data1 = [
					'nama' => $this->input->post('nama', true),
					'email' => strtolower(str_replace(' ', '', $this->input->post('nama', true))) . "@gmail.com",
					'password' => password_hash(strtolower(str_replace(' ', '', $this->input->post('nama', true))) . "@gmail.com", PASSWORD_DEFAULT),
					'image' => $img,
					'role' => 2,
					'no_hp' => str_replace(' ', '', str_replace('+', '', $this->input->post('no_hp', true))),
					'jenis_kelamin' => 'L',
					'tgl_dibuat' => time(),
					'status' => 1
				];

				$this->db->insert('pengguna', $data1);
				$cariIdUser = $this->db->get_where('pengguna', ['nama' => $this->input->post('nama', true), 'email' => $data1['email'], 'image' => $data1['image']])->last_row()->id;
			} else {
				$cariIdUser = $this->input->post('id_user', true);
			}


			$dataUser = [
				'id_user' => $cariIdUser,
				'nama' => $this->input->post('nama', true),
				'spesialisasi' => $this->input->post('spesialisasi', true),
				'sip' => $this->input->post('sip', true),
				'str' => $this->input->post('str', true),
				'no_hp' => str_replace(' ', '', str_replace('+', '', $this->input->post('no_hp', true))),
				'alamat' => $this->input->post('alamat', true),
				'status' => $this->input->post('status', true),
				'tgl_dibuat' => time(),
			];

			$this->db->insert('dokter', $dataUser);

			$this->session->set_flashdata('dokter', '<div class="alert alert-success">Dokter baru dengan Nama <strong>' . $dataUser['nama'] . '</strong> berhasil ditambahkan!!</div>');
			redirect('admin/dokter');
		}
	}


	public function ubahDokter($id = '')
	{
		$data = [
			'user' => $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row(),
			'title' => 'Ubah Dokter',
			'oneData' => $this->db->get_where('dokter', ['id' => $id])->row(),
			'data1' => $this->db->get_where('pengguna', ['role' => 2, 'image' => 'default'])->result()
		];

		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim');
		$this->form_validation->set_rules('spesialisasi', 'Spesialisasi Dokter', 'required|trim');
		$this->form_validation->set_rules('sip', 'Nomor Surat Izin Praktik', 'trim');
		$this->form_validation->set_rules('str', 'Nomor Surat Tanda Praktik', 'trim');
		$this->form_validation->set_rules('no_hp', 'Nomor Handphone', 'required|trim');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
		$this->form_validation->set_rules('status', 'Status Aktif Dokter', 'required|trim');


		if ($this->form_validation->run() == false) {
			$this->load->view('templates/dash/header', $data);
			$this->load->view('templates/dash/sidenav', $data);
			$this->load->view('admin/dokter/ubah', $data);
			$this->load->view('templates/dash/footer');
		} else {

			$upload_image = $_FILES['image']['name'];
			if ($data['oneData']->id_user) {
				$email = $this->db->get_where('pengguna', ['id' => $data['oneData']->id_user])->row()->email;
			} else {
				$email = strtolower(str_replace(' ', '', $this->input->post('nama', true))) . "@gmail.com";
			}
			$blabla = $this->db->get_where('pengguna', ['email' => $email])->row();

			if ($upload_image) {

				if ($_FILES['image']['size'] > 5120000) {
					$isiPesan = '
            <div class="alert alert-danger alert-dismissible fade show border border-dark" role="alert">
                        <strong>Ukuran Gambar</strong> tidak bisa melebihi <strong>5 MB</strong>
            </div>';
					$this->session->set_flashdata('dokter', $isiPesan);
					redirect('dokter');
				}

				$config['file_name'] = time() . '_' . md5(sha1(base64_encode($email))) . time();
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size']      = '5012';
				$config['upload_path'] = './assets/img/user/';

				$this->load->library('upload', $config);
				if ($this->upload->do_upload('image')) {
					$old_image = $blabla->image;

					unlink(FCPATH . 'assets/img/user/' . $old_image);

					// if (unlink(FCPATH . 'assets/img/user/' . $old_image) == false) {
					//     redirect('dokter');
					// }

					$new_image = $this->upload->data('file_name');
					$this->db->where('id', $blabla->id);
					$this->db->update('pengguna', ['image' => $new_image]);
				} else {
					redirect('dokter');
				}
			}

			$dataUser = [
				'nama' => $this->input->post('nama', true),
				'spesialisasi' => $this->input->post('spesialisasi', true),
				'sip' => $this->input->post('sip', true),
				'str' => $this->input->post('str', true),
				'no_hp' => str_replace(' ', '', str_replace('+', '', $this->input->post('no_hp', true))),
				'alamat' => $this->input->post('alamat', true),
				'status' => $this->input->post('status', true),
			];

			$this->db->where('id', $data['oneData']->id);
			$this->db->update('dokter', $dataUser);


			$this->session->set_flashdata('dokter', '<div class="alert alert-success">Dokter dengan Nama <strong>' . $data['oneData']->nama . '</strong> berhasil diubah!!</div>');
			redirect('admin/dokter');
		}
	}

	public function hapusDokter($id)
	{
		$pel = $this->db->get_where('dokter', ['id' => $id])->row();

		$this->db->delete('dokter', ['id' => $id]);

		$this->session->set_flashdata('dokter', '<div class="alert alert-warning">Data Dokter dengan Nama <strong>' . $pel->nama . '</strong> berhasil dihapus!!</div>');
		redirect('admin/dokter');
	}

	public function Pembayaran()
	{
		$data = [
			'user' => $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row(),
			'title' => 'Pembayaran',
			'dataTab' => $this->db->get('pembayaran')->result(),
			'dataMod' => $this->db->get('pasien')->result(),
		];

		$this->form_validation->set_rules('id_pasien', 'Pasien', 'required|trim');
		$this->form_validation->set_rules('nominal', 'Nominal', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/dash/header', $data);
			$this->load->view('templates/dash/sidenav', $data);
			$this->load->view('admin/pembayaran/index', $data);
			$this->load->view('templates/dash/footer');
		} else {

			$dataPasien = $this->db->get_where('pasien', ['id' => $this->input->post('id_pasien', true)])->row();

			$dataUser = [
				'id_pasien' => $this->input->post('id_pasien', true),
				'invoice' => invoiceKode($dataPasien->nama, $dataPasien->id_rm),
				'nominal' => $this->input->post('nominal', true),
				'status' => 0,
				'tgl_dibuat' => time(),
			];

			$this->db->insert('pembayaran', $dataUser);

			$this->session->set_flashdata('pembayaran', '<div class="alert alert-success">Pembayaran dengan Invoice <strong>' . $dataUser['invoice'] . '</strong> berhasil ditambahkan!!</div>');
			redirect('admin/pembayaran');
		}
	}


	public function ubahPembayaran($id = '')
	{
		$data = [
			'user' => $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row(),
			'title' => 'Ubah Pembayaran',
			'oneData' => $this->db->get_where('pembayaran', ['id' => $id])->row(),
			'dataMod' => $this->db->get('pasien')->result(),
		];
		$data['pasien'] = $this->db->get_where('pasien', ['id' => $data['oneData']->id_pasien])->row();

		$this->form_validation->set_rules('id_pasien', 'Pasien', 'required|trim');
		$this->form_validation->set_rules('nominal', 'Nominal', 'required|trim');
		$this->form_validation->set_rules('status', 'Status', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/dash/header', $data);
			$this->load->view('templates/dash/sidenav', $data);
			$this->load->view('admin/pembayaran/ubah', $data);
			$this->load->view('templates/dash/footer');
		} else {

			$dataUser = [
				'id_pasien' => $this->input->post('id_pasien', true),
				'nominal' => $this->input->post('nominal', true),
				'status' => $this->input->post('status', true),
			];

			$this->db->where('id', $data['oneData']->id);
			$this->db->update('pembayaran', $dataUser);


			$this->session->set_flashdata('pembayaran', '<div class="alert alert-success">Pembayaran Invoice <strong>' . $data['oneData']->invoice . '</strong> berhasil diubah!!</div>');
			redirect('admin/pembayaran');
		}
	}

	public function selesaiPembayaran($id)
	{
		$pel = $this->db->get_where('pembayaran', ['id' => $id])->row();

		$data = [
			'status' => 2,
		];

		$this->db->where('id', $pel->id);
		$this->db->update('pembayaran', $data);

		$this->session->set_flashdata('pembayaran', '<div class="alert alert-success">Data Pembayaran Invoice <strong>' . $pel->invoice . '</strong> ditandai <strong>Selesai</strong> </div>');
		redirect('admin/pembayaran');
	}

	public function hapusPembayaran($id)
	{
		$pel = $this->db->get_where('pembayaran', ['id' => $id])->row();

		$this->db->delete('pembayaran', ['id' => $id]);

		$this->session->set_flashdata('pembayaran', '<div class="alert alert-warning">Data Pembayaran Invoice <strong>' . $pel->invoice . '</strong> berhasil dihapus!!</div>');
		redirect('admin/pembayaran');
	}
}
