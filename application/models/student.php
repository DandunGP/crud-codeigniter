<?php
defined('BASEPATH') or exit('No direct script access allowed');

class student extends CI_Model
{

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
    public function getData()
    {
        return $this->db->get('student')->result_array();
    }

    public function getById($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('student')->row_array();
    }

    public function update($id, $student)
    {
        $this->db->where('id', $id);
        $this->db->update('student', $student);
    }

    public function insert($student)
    {
        $this->db->insert('student', $student);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('student');
    }

    public function join()
    {
        $this->db->select('*');
        $this->db->from('student');
        $this->db->join('class', 'class.id_class = student.kelas');
        $query = $this->db->get();
        return $query;
    }

    public function getClass()
    {
        $query = $this->db->query('SELECT * FROM class');
        return $query->result_array();
    }
}
