<?php
defined('BASEPATH') or exit('No direct script access allowed');

class chart_m extends CI_Model
{
    public function  generalChart($z, $id)
    {
        // $this->db->order_by('studentid', 'asc');
        // $this->db->order_by('event_date', 'asc');
        $this->db->order_by('classroomid', 'asc');
        $this->db->order_by('studentid', 'asc');
        $this->db->order_by('subject', 'asc');
        if ($z == '' && $id == '') {
            $query = $this->db->get('marks');
        } else if ($z == '') {
            $query = $this->db->where('studentid', $id)->get('marks');
        } else if ($id == '') {
            $query = $this->db->where('classroomid', $z)->get('marks');
        } else {
            $query = $this->db->where('classroomid', $z)->where('studentid', $id)->get('marks');
        }

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function stdId()
    {
        $this->db->order_by('studentid', 'asc');
        $this->db->select('studentid');
        $this->db->distinct();
        $query = $this->db->get('marks');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }
    // public function labelChart()
    // {
    //     // SELECT DISTINCT studentid FROM marks;
    //     $this->db->order_by('studentid', 'asc');
    //     $query = $this->db->select('studentid')->distinct('studentid')->get('marks');
    //     if ($query->num_rows() > 0) {
    //         return $query->result();
    //     } else {
    //         return false;
    //     }
    // }
}
