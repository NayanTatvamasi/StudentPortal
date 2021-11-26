<?php
$config = [

     'signup_rules' => [
          [
               'field' => 'studentid',
               'label' => 'Enrollment Number',
               'rules' => 'required|integer|is_unique[student.studentid]',
          ],
          [
               'field' => 'password',
               'label' => 'Password',
               'rules' => 'required|min_length[8]',
          ],
          [
               'field' => 'firstname',
               'label' => 'Firstname',
               'rules' => 'required',
          ],
          [
               'field' => 'lastname',
               'label' => 'Lastname',
               'rules' => 'required',
          ],
          [
               'field' => 'email',
               'label' => 'Email',
               'rules' => 'required|valid_email|is_unique[student.email]',
          ],
          [
               'field' => 'contact_no',
               'label' => 'Contact',
               'rules' => 'required|integer|is_unique[student.contact_no]|min_length[10]|max_length[10]',
          ],
          [
               'field' => 'gender',
               'label' => 'Gender',
               'rules' => 'required',
          ],
          [
               'field' => 'dob',
               'label' => 'Date',
               'rules' => 'required',
          ],
          [
               'field' => 'standard',
               'label' => 'Standard',
               'rules' => 'required',
          ],
          [
               'field' => 'classroomid',
               'label' => 'class Room',
               'rules' => 'required',
          ],
          [
               'field' => 'batch',
               'label' => 'Batch',
               'rules' => 'required',
          ]

     ],
     'teacher_signup' => [
          [
               'field' => 'teacher_id',
               'label' => 'Teacher ID',
               'rules' => 'required|integer|is_unique[teacher.teacher_id]',
          ],
          [
               'field' => 'password',
               'label' => 'Password',
               'rules' => 'required|min_length[8]',
          ],
          [
               'field' => 'firstname',
               'label' => 'Firstname',
               'rules' => 'required',
          ],
          [
               'field' => 'lastname',
               'label' => 'Lastname',
               'rules' => 'required',
          ],
          [
               'field' => 'email',
               'label' => 'Email',
               'rules' => 'required|valid_email|is_unique[teacher.email]',
          ],
          [
               'field' => 'contact_no',
               'label' => 'Contact',
               'rules' => 'required|integer|is_unique[teacher.contact_no]|min_length[10]|max_length[10]',
          ],
          [
               'field' => 'dob',
               'label' => 'Date',
               'rules' => 'required',
          ],
          [
               'field' => 'subjectid',
               'label' => 'Subject',
               'rules' => 'required',
          ],
          [
               'field' => 'classroomid',
               'label' => 'Class Room',
               'rules' => 'required',
          ]

     ],
     'login_rules' => [
          [
               'field' => 'userid',
               'label' => 'User Id',
               'rules' => 'required|integer'
          ],
          [
               'field' => 'pass',
               'label' => 'Password',
               'rules' => 'required|max_length[12]'
          ],
          [
               'field' => 'category',
               'label' => 'Category',
               'rules' => 'required'
          ]
     ],
     'eventAdd' => [
          [
               'field' => 'event_title',
               'label' => 'Title',
               'rules' => 'required',
          ],
          [
               'field' => 'event_body',
               'label' => 'Content',
               'rules' => 'required',
          ],
          [
               'field' => 'event_date',
               'label' => 'Date',
               'rules' => 'required',
          ],
          [
               'field' => 'place',
               'label' => 'Place',
               'rules' => 'required',
          ],
          [
               'field' => 'event_time',
               'label' => 'Time',
               'rules' => 'required',
          ]

     ],
     'marks_add' => [
          [
               'field' => 'studentid',
               'label' => 'Studentid',
               'rules' => 'required'
          ],
          [
               'field' => 'event_date',
               'label' => 'Exam Date',
               'rules' => 'required'
          ],
          [
               'field' => 'obtain_m',
               'label' => 'Marks',
               'rules' => 'required|integer'
          ],
          [
               'field' => 'total_m',
               'label' => 'Marks',
               'rules' => 'required|integer'
          ],
          [
               'field' => 'percentage',
               'label' => 'Percentage',
               'rules' => 'required'
          ],
          [
               'field' => 'exam_category',
               'label' => 'Category',
               'rules' => 'required'
          ],
          [
               'field' => 'classroomid',
               'label' => 'Class',
               'rules' => 'required'
          ]

     ]


];
