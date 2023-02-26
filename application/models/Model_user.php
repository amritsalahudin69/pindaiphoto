<?php

class Model_user extends CI_Model
{
    public function login($kode)
    {
        $this->db->select('
                            id,
                            kodeuser,
                            id_role,
                            user,
                            email,
                            password,
                            status
                        ');
        $this->db->from('db_user');
        $this->db->where('kodeuser', $kode);
        return $this->db->get()->row();
    }

    public function id($id)
    {
        $this->db->select('
                            id,
                            kodeuser,
                            id_role,
                            user,
                            email,
                            status
                        ');
        $this->db->from('db_user');
        $this->db->where('id', $id);
        return $this->db->get()->row();
    }

    public function pw($id)
    {
        $this->db->select('
                            password
                        ');
        $this->db->from('db_user');
        $this->db->where('id', $id);
        return $this->db->get()->row();
    }

    public function gantipass($id, $kodeuser, $id_role, $user, $email, $enpass, $status)
    {
        $data = array(
            'kodeuser'  => $kodeuser,
            'id_role'   => $id_role,
            'user'      => $user,
            'email'     => $email,
            'password' => $enpass,
            'status'    => $status
        );
        $this->db->where('id', $id);
        return $this->db->update('db_user', $data);
    }
}
