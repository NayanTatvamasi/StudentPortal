<?php
defined('BASEPATH') or exit('No direct script access allowed');

class student_m extends CI_Model
{

	public function addStudent($array)
	{
		$this->db->insert('student', $array);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
	public function addTeacher($array)
	{
		$q = $this->db->insert('teacher', $array);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
	public function addEvent($array, $x)
	{
		$arry = array(
			'event_title' => $array['event_title'],
			'event_body' => $array['event_body'],
			'place' => $array['place'],
			'event_date' => $array['event_date'],
			'event_time' => $array['event_time'],
			'teacher_id' => $x,
		);
		// print_r($arry);
		// exit;
		$this->db->insert('events', $arry);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function deleteEvent()
	{
		$id = $this->input->get('eid');
		$this->db->where('eventid', $id);
		$this->db->delete('events');
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function editEvent()
	{
		$id = $this->input->get('eid');
		$this->db->where('eventid', $id);
		$query = $this->db->get('events');
		if ($query->num_rows() > 0) {
			return $query->row();
		} else {
			return false;
		}
	}

	public function updateEvent()
	{
		$id = $this->input->post('eventid');
		$field = $this->input->post();
		// print_r($field);
		// exit;
		$q=$this->db->where('eventid', $id)
			->update('events', $field);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function deleteStudent()
	{
		$id = $this->input->get('sid');
		$this->db->where('studentid', $id);
		$this->db->delete('student');
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function editStudent()
	{
		$id = $this->input->get('sid');
		$this->db->where('studentid', $id);
		$query = $this->db->get('student');
		if ($query->num_rows() > 0) {
			return $query->row();
		} else {
			return false;
		}
	}

	public function updateStudent()
	{
		$id = $this->input->post('studentid');
		$field = $this->input->post();
		// print_r($field);
		// exit;
		$this->db->where('studentid', $id)
			->update('student', $field);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function deleteTeacher()
	{
		$id = $this->input->get('tid');
		$this->db->where('teacher_id', $id);
		$this->db->delete('teacher');
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function editTeacher()
	{
		$id = $this->input->get('tid');
		$this->db->where('teacher_id', $id);
		$query = $this->db->get('teacher');
		if ($query->num_rows() > 0) {
			return $query->row();
		} else {
			return false;
		}
	}

	public function updateTeacher()
	{
		$id = $this->input->post('teacher_id');
		$field = $this->input->post();
		// print_r($field);
		// exit;
		$this->db->where('teacher_id', $id)
			->update('teacher', $field);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}


	public function isvalidate($category, $userid, $pass)
	{
		if ($category == '1') {
			$x = 'studentid';
			$y = 'student';
		} else {
			$x = 'teacher_id';
			$y = 'teacher';
		}
		$q = $this->db->where([$x => $userid, 'password' => $pass])
			->get($y);

		//select * from users where username=$username and password=$password

		if ($q->num_rows()) {
			return $q->row()->$x;
		} else {
			return false;
		}

		//True
	}

	public function classRoom($userid, $category)
	{

		if ($category == '1') {
			$x = 'studentid';
			$y = 'student';
		} else {
			$x = 'teacher_id';
			$y = 'teacher';
		}
		$q = $this->db->select('classroomid')
			->from($y)
			->where([$x => $userid])
			->get();

		//select * from users where username=$username and password=$password

		if ($q->num_rows()) {
			return $q->row()->classroomid;
		} else {
			return false;
		}
	}

	public function pdetails($uid)
	{

		$q = $this->db->select('')
			->from('student')
			->where(['studentid' => $uid])
			->get();

		return $q->row();
	}

	public function subjects($x)
	{
		$q = $this->db->select('')
			->from('teacher')
			->join('subject', 'teacher.subjectid=subject.subjectid')
			->where(['teacher_id' => $x])
			->get();
		return $q->row();
	}

	public function allStudent($session)
	{
		$x = $session['category'];
		$z = $session['classroom'];
		$y=$session['userid'];
		$this->db->order_by('studentid', 'asc');
		if ($x == '2') {
			$query = $this->db->where('classroomid', $z)->get('student');
		} else if($x=='1'){
			$query = $this->db->where('studentid',$y)->get('student');
		}else{
			$query = $this->db->get('student');
		}

		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return false;
		}
	}
	public function allTeacher()
	{
		$this->db->order_by('teacher_id', 'asc');
		$query = $this->db->select('')
			->from('teacher')
			->join('subject', 'teacher.subjectid=subject.subjectid')
			->get();

		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return false;
		}
	}

	public function eventDetails()
	{
		$this->db->order_by('event_date', 'asc');
		$query = $this->db->join('teacher', 'teacher.teacher_id=events.teacher_id')
			->get('events');
		if ($query->num_rows() > 0) {

			return $query->result();
		} else {
			return false;
		}
	}

	public function myeventDetails($x)
	{
		$this->db->order_by('event_date', 'asc');
		$query = $this->db->where('teacher_id',$x)
			->get('events');
		if ($query->num_rows() > 0) {

			return $query->result();
		} else {
			return false;
		}
	}
}
