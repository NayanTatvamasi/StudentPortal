<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Export extends CI_Controller
{

    // construct
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('userid'))                     //session
            return redirect('login');

        // load model

        $this->load->model('result_m');
    }

    // export xlsx|xls file
    // public function index()
    // {

    //     // $data['title'] = 'Display Feedback Data';
    //     $data['gradeList'] = $this->export->employeeList();

    //     // load view file for output
    //     $this->load->view('users/feedbacklist', $data);
    // }

    // create xlsx


    public function importGrade()
    {
        $this->load->library('excel');
        $config = [
            'upload_path' => './importFiles/',
            'allowed_types' => 'xls|xlsx',
            'remove_spaces' => TRUE
        ];
        $path = './importFiles/';

        $this->load->library('upload', $config);


        if (!$this->upload->do_upload('userGradefile')) {
            $error = array('error' => $this->upload->display_errors());
        } else {
            $data = array('upload_data' => $this->upload->data());
        }
        if (empty($error)) {
            if (!empty($data['upload_data']['file_name'])) {
                $import_xls_file = $data['upload_data']['file_name'];
            } else {
                $import_xls_file = 0;
            }
            $inputFileName = $path . $import_xls_file;

            try {
                $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
                $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($inputFileName);
                $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
                $flag = true;
                $i = 0;
                foreach ($allDataInSheet as $value) {
                    if ($flag) {
                        $flag = false;
                        continue;
                    }

                    $arrayData[$i] = array(
                        'm_id' => $value['A'],
                        'event_date' => $value['B'],
                        'studentid' => $value['C'],
                        'classroomid' => $value['D'],
                        'exam_category' => $value['E'],
                        'subject' => $value['F'],
                        'obtain_m' => $value['G'],
                        'total_m' => $value['H'],
                        'percentage' => $value['I']

                    );

                    $i++;
                }
                // echo '<pre>';
                // print_r($arrayData);
                // exit;

                $result = $this->result_m->addMarks($arrayData);
                if ($result) {
                    echo "Imported successfully";
                } else {
                    echo "ERROR !";
                }
            } catch (Exception $e) {
                die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
                    . '": ' . $e->getMessage());
            }
        } else {
            echo $error['error'];
        }
        return redirect('result');
    }

    public function createTeacherXLS()
    {
        // create file name
        // $y = $this->session->userdata('category');
        // $x = $this->session->userdata('userid');
        $z = $this->session->userdata('classroom');
        $s = $this->session->userdata('subject');
        // $id = $this->input->post('studentid');
        $fileName = 'C' . $z . '_' . $s . '_' . date('d-m-y') . '.csv';


        $this->load->library('excel');

        $gradeList = $this->result_m->exportList($z, $s);

        $object = new PHPExcel();
        $object->setActiveSheetIndex(0);

        // $object->getActiveSheet()->setCellValue('A1', 'Name');
        // $object->getActiveSheet()->setCellValue('B1', 'email');
        // $object->getActiveSheet()->setCellValue('C1', 'Feedback');


        $table_columns = array("m_id", "StudentID", "First Name", "Last Name", "ClassroomId", "subject", "Obtain ", "Total", "Percentage", "Event Date", "Exam Category");

        $column = 0;

        foreach ($table_columns as $field) {
            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
            $column++;
        }


        $excel_row = 2;

        foreach ($gradeList as $list) {
            $ct = 0;
            $object->getActiveSheet()->setCellValueByColumnAndRow($ct, $excel_row, $list->m_id);
            $object->getActiveSheet()->setCellValueByColumnAndRow(++$ct, $excel_row, $list->studentid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(++$ct, $excel_row, $list->firstname);
            $object->getActiveSheet()->setCellValueByColumnAndRow(++$ct, $excel_row, $list->lastname);
            $object->getActiveSheet()->setCellValueByColumnAndRow(++$ct, $excel_row, $list->classroomid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(++$ct, $excel_row, $list->subject);
            $object->getActiveSheet()->setCellValueByColumnAndRow(++$ct, $excel_row, $list->obtain_m);
            $object->getActiveSheet()->setCellValueByColumnAndRow(++$ct, $excel_row, $list->total_m);
            $object->getActiveSheet()->setCellValueByColumnAndRow(++$ct, $excel_row, $list->percentage);
            $object->getActiveSheet()->setCellValueByColumnAndRow(++$ct, $excel_row, $list->event_date);
            $object->getActiveSheet()->setCellValueByColumnAndRow(++$ct, $excel_row, $list->exam_category);

            $excel_row++;
        }

        // $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $fileName . '"');
        header('Cache-Control:max-age=0');
        $object_writer = PHPExcel_IOFactory::createWriter($object, 'CSV');
        $object_writer->save('php://output');
    }


    public function createStudentXLS()
    {
        // create file name
        // $y = $this->session->userdata('category');
        // $x = $this->session->userdata('userid');
        // $z = $this->session->userdata('classroom');
        // $s = $this->session->userdata('subject');
        $id = $this->input->post('estudentid');
        $fileName = 'S_' . $id . '_' . date('d-m-y') . '.csv';


        $this->load->library('excel');

        $gradeList = $this->result_m->smarksList($id);


        $object = new PHPExcel();
        $object->setActiveSheetIndex(0);

        // $object->getActiveSheet()->setCellValue('A1', 'Name');
        // $object->getActiveSheet()->setCellValue('B1', 'email');
        // $object->getActiveSheet()->setCellValue('C1', 'Feedback');


        $table_columns = array("m_id", "StudentID", "First Name", "Last Name", "ClassroomId", "subject", "Obtain ", "Total", "Percentage", "Event Date", "Exam Category");

        $column = 0;

        foreach ($table_columns as $field) {
            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
            $column++;
        }


        $excel_row = 2;


        foreach ($gradeList as $list) {
            $ct = 0;
            $object->getActiveSheet()->setCellValueByColumnAndRow($ct, $excel_row, $list->m_id);
            $object->getActiveSheet()->setCellValueByColumnAndRow(++$ct, $excel_row, $list->studentid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(++$ct, $excel_row, $list->firstname);
            $object->getActiveSheet()->setCellValueByColumnAndRow(++$ct, $excel_row, $list->lastname);
            $object->getActiveSheet()->setCellValueByColumnAndRow(++$ct, $excel_row, $list->classroomid);
            $object->getActiveSheet()->setCellValueByColumnAndRow(++$ct, $excel_row, $list->subject);
            $object->getActiveSheet()->setCellValueByColumnAndRow(++$ct, $excel_row, $list->obtain_m);
            $object->getActiveSheet()->setCellValueByColumnAndRow(++$ct, $excel_row, $list->total_m);
            $object->getActiveSheet()->setCellValueByColumnAndRow(++$ct, $excel_row, $list->percentage);
            $object->getActiveSheet()->setCellValueByColumnAndRow(++$ct, $excel_row, $list->event_date);
            $object->getActiveSheet()->setCellValueByColumnAndRow(++$ct, $excel_row, $list->exam_category);
            $excel_row++;
        }

        // $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $fileName . '"');
        header('Cache-Control:max-age=0');
        $object_writer = PHPExcel_IOFactory::createWriter($object, 'CSV');
        $object_writer->save('php://output');
    }
}
