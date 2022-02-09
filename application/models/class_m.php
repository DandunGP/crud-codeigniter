<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Class_m extends CI_Model
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
    public function getDataClass()
    {
        return $this->db->get('class')->result_array();
    }

    public function getByIdClass($id)
    {
        $this->db->where('id_class', $id);
        return $this->db->get('class')->row_array();
    }

    public function update($id, $data)
    {
        $this->db->where('id_class', $id);
        $this->db->update('class', $data);
    }

    public function insertClass($data)
    {
        $this->db->insert('class', $data);
    }

    public function deleteClass($id)
    {
        $this->db->where('id_class', $id);
        $this->db->delete('class');
    }
}
