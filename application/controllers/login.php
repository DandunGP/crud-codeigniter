<?php
defined('BASEPATH') or exit('No direct script access allowed');

class login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("student");
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function misal()
	{
		var_dump('login');
	}

	public function student()
	{
		// $data['student'] = $this->student->getData();
		$data['student'] = $this->student->join()->result_array();
		// var_dump($this->student->getData());
		return $this->load->view('tabel', $data);
	}

	public function edit($id)
	{
		$data['class'] = $this->student->getClass();
		$data['student'] = $this->student->getById($id);
		$this->form_validation->set_rules('nama', 'nama', 'required');
		$this->form_validation->set_rules('alamat', 'alamat', 'required');
		$this->form_validation->set_rules('kelas', 'kelas', 'required');
		if ($this->form_validation->run() == FALSE) {
			return $this->load->view('edit', $data);
		} else {
			$post = $this->input->post();
			$student = [
				'nama' => $post['nama'],
				'alamat' => $post['alamat'],
				'kelas' => $post['kelas']
			];
			$this->student->update($id, $student);
			redirect('login/student/');
		}
	}

	public function insert()
	{
		$data['class'] = $this->student->getClass();
		return $this->load->view('insert', $data);
	}

	public function tambah()
	{
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$kelas = $this->input->post('kelas');

		$data = array(
			'id' => null,
			'nama' => $nama,
			'alamat' => $alamat,
			'kelas' => $kelas
		);

		$this->student->insert($data);
		redirect('login/student/');
	}

	public function delete($id)
	{
		$data['student'] = $this->student->getById($id);
		$this->student->delete($id, 'student');
		redirect('login/student/');
	}
}
