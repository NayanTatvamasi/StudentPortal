<?php
defined('BASEPATH') or exit('No direct script access allowed');

class result_m extends CI_Model
{
	public function formData($x)
	{

		$q = $this->db->select('')
			->from('student')
			->join('teacher', 'teacher.classroomid=student.classroomid')
			->join('subject', 'teacher.subjectid=subject.subjectid')
			// ->join('events','events.teacher_id=teacher.teacher_id')
			->where(['teacher.teacher_id' => $x])
			->get();
		return $q->result_array();
		// echo "<pre>";
		// print_r($q->result_array());
		// exit;
	}

	public function eventData($x)
	{
		$this->db->order_by('event_date', 'asc');
		$query = $this->db->join('teacher', 'teacher.teacher_id=events.teacher_id')
			->where(['teacher.teacher_id' => $x])
			->get('events');
		if ($query->num_rows() > 0) {

			return $query->result_array();
		} else {
			return false;
		}
	}

	public function addMarks($dataArray)
	{
		foreach($dataArray as $row){
		$this->db->insert('marks', $row);
		}
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function deleteGrade()
	{
		$id = $this->input->get('mid');
		$this->db->where('m_id ', $id);
		$this->db->delete('marks');
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function editGrade()
	{
		$id = $this->input->get('mid');
		$this->db->where('m_id', $id);
		$query = $this->db->get('marks');
		if ($query->num_rows() > 0) {
			return $query->row();
		} else {
			return false;
		}
	}

	public function updateGrade()
	{
		$id = $this->input->post('m_id');
		$field = $this->input->post();
		// print_r($field);
		// exit;
		$this->db->where('m_id', $id)
			->update('marks', $field);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function  marksList()
	{
		$this->db->order_by('event_date', 'asc');
		$query = $this->db->get('marks');
		if ($query->num_rows() > 0) {
			return $query->result_array();
		} else {
			return false;
		}
	}
	public function  tmarksList($z, $s, $id)
	{
		$this->db->order_by('event_date', 'asc');
		$query = $this->db->where('classroomid', $z)->where('subject', $s)->where('studentid', $id)->get('marks');
		if ($query->num_rows() > 0) {
			return $query->result();
			// echo "<pre>";
			// print_r($query->result_array());
			// exit;
		} else {
			return false;
		}
	}

	public function  exportList($z, $s)
	{
		$this->db->order_by('student.studentid', 'asc');
		$query = $this->db->join('student', 'student.studentid=marks.studentid')->where('marks.classroomid', $z)->where('marks.subject', $s)->get('marks');
		if ($query->num_rows() > 0) {
			return $query->result();
			// echo "<pre>";
			// print_r($query->result_array());
			// exit;
		} else {
			return false;
		}
	}

	public function  smarksList($x)
	{
		$month = $this->input->post('monthSelect');
		// print_r($month);
		// exit;
		$this->db->order_by('event_date', 'asc');
		if ($month == '') {
			$query = $this->db->join('student', 'student.studentid=marks.studentid')->where('marks.studentid', $x)->get('marks');
		} else {
			$query = $this->db->join('student', 'student.studentid=marks.studentid')->where('marks.studentid', $x)->where('MONTH(marks.event_date)',$month)->get('marks');
		}
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return false;
		}
	}

	public function  assignment_List($x)
	{
		$this->db->order_by('as_date', 'asc');
		$query = $this->db->where('teacher_id', $x)->get('assignment');
		if ($query->num_rows() > 0) {
			return $query->result_array();
			// echo "<pre>";
			// print_r($query->result_array());
			// exit;
		} else {
			return false;
		}
	}

	public function  assignment_sList($z)
	{
		$this->db->order_by('as_date', 'asc');
		$query = $this->db->where('classroomid', $z)->get('assignment');
		if ($query->num_rows() > 0) {
			return $query->result_array();
			// echo "<pre>";
			// print_r($query->result_array());
			// exit;
		} else {
			return false;
		}
	}

	public function addAssignment($dataArray)
	{
		$this->db->insert('assignment', $dataArray);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function editAssignment($id)
	{
		// $id = $this->input->get('aid');
		$this->db->where('as_id', $id);
		$query = $this->db->get('assignment');
		if ($query->num_rows() > 0) {
			return $query->row();
		} else {
			return false;
		}
	}

	public function  checkImportant($id)
	{
		$this->db->where('as_id', $id);
		$query = $this->db->get('assignment');
		if ($query->num_rows() > 0) {
			return $query->row();
		} else {
			return false;
		}
	}

	public function setCheckImportant($data)
	{
		$id = $data['as_id'];
		$field = $data['ascheck'];
		$this->db->where('as_id', $id)->set('as_check', $field)->update('assignment');

		// $q = "update assignment set as_check = '$field' where as_id=$id";
		// $query = $this->db->query($q);

		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}


	public function updateAsssignment($field)
	{
		$id = $this->input->post('as_id');

		// print_r($field);
		// exit;
		$this->db->where('as_id', $id)
			->update('assignment', $field);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function deleteAssignment()
	{
		$id = $this->input->get('aid');
		$this->db->where('as_id ', $id);
		$this->db->delete('assignment');
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
}
