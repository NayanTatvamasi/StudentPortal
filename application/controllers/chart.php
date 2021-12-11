<?php
class Chart extends MY_Controller
{
    public function showGradeChart()
    {
        // $y = $this->session->userdata('category');
        // $z = $this->session->userdata('classroom');
        // $s = $this->session->userdata('subject');

        $z = $this->input->post('classId');
        $id = $this->input->post('studentId');

        $list = $this->chart_m->generalChart($z, $id);
        // $list = $this->chart_m->generalChart($id);


        echo json_encode($list);
    }
}
