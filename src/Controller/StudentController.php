<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Student;
use App\Repository\StudentRepository;

class StudentController extends AbstractController
{
    /**
     * @Route("/student", name="student_show")
     */
    public function show()
    {
        $student = new Student(1, 'matt', 'smith');

        $template = 'student/show.html.twig';
        $args = [
            'student' => $student
        ];
        return $this->render($template, $args);
    }

    /**
     * @Route("/student/list", name="student_list")
     */
    public function listAction()
    {
        $studentRepository = new StudentRepository();
        $students = $studentRepository->findAll();

        $template = 'student/list.html.twig';
        $args = [
            'students' => $students
        ];
        return $this->render($template, $args);
    }
}
