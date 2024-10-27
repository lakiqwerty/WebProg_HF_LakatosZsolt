<?php

namespace HF5;

class Student
{
    private string $name;
    private string $studentNumber;
    private array $grades = [];

    public function __construct(string $name, string $studentNumber)
    {
        $this->name = $name;
        $this->studentNumber = $studentNumber;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getStudentNumber(): string
    {
        return $this->studentNumber;
    }

    public function addGrade(Subject $subject, float $grade): void
    {
        $this->grades[$subject->getCode()] = $grade;
    }

    public function getAvgGrade(): float
    {
        if (empty($this->grades)) {
            return 0.0;
        }
        return array_sum($this->grades) / count($this->grades);
    }

    public function printGrades(): void
    {
        echo "Grades for {$this->name} (Student Number: {$this->studentNumber}):\n";
        foreach ($this->grades as $subjectCode => $grade) {
            echo "Subject {$subjectCode}: {$grade}\n";
        }
        echo "Average Grade: " . $this->getAvgGrade();
        echo "<br>";
    }
}
