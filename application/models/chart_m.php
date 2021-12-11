<?php
defined('BASEPATH') or exit('No direct script access allowed');

class chart_m extends CI_Model
{
    public function  generalChart($z,$id)
    {
        // $this->db->order_by('studentid', 'asc');
        $this->db->order_by('event_date', 'asc');
        if($z==''&& $id==''){
            $query = $this->db->get('marks');
        }else if($z==''){
            $query = $this->db->where('studentid', $id)->get('marks');
        }else if($id==''){
            $query = $this->db->where('classroomid', $z)->get('marks');
        }else{
            $query = $this->db->where('classroomid', $z)->where('studentid', $id)->get('marks');
        }
        


        if ($query->num_rows() > 0) {
            return $query->result();
            
        } else {
            return false;
        }
    }
}
