<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Classroom extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("class_m");
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

	public function class()
	{
		$data['class'] = $this->class_m->getDataClass();
		// var_dump($this->student->getData());
		return $this->load->view('class/tabelClass', $data);
	}

	public function editClass($id)
	{
		$data['class'] = $this->class_m->getByIdClass($id);
		$this->form_validation->set_rules('namaclass', 'namaclass', 'required');
		if ($this->form_validation->run() == FALSE) {
			return $this->load->view('class/editClass', $data);
		} else {
			$post = $this->input->post();
			$class = [
				'name_class' => $post['namaclass'],
			];
			$this->class_m->update($id, $class);
			redirect('classroom/class/');
		}
	}

	public function insert()
	{
		return $this->load->view('class/insertClass');
	}

	public function tambahClass()
	{
		$nama = $this->input->post('namaclass');

		$data = array(
			'id_class' => null,
			'name_class' => $nama
		);

		$this->class_m->insertClass($data);
		redirect('classroom/class/');
	}

	public function deleteClass($id)
	{
		$data['class'] = $this->class_m->getByIdClass($id);
		$this->class_m->deleteClass($id, 'class');
		redirect('classroom/class/');
	}
}
