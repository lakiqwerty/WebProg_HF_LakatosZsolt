<?php

namespace HF5;

abstract class AbstractUniversity
{
    protected array $subjects = [];

    public function getSubjects(): array
    {
        return $this->subjects;
    }

    abstract public function addSubject(string $code, string $name): Subject;
    abstract public function addStudentOnSubject(string $subjectCode, Student $student);
    abstract public function getStudentsForSubject(string $subjectCode): array;
    abstract public function getNumberOfStudents(): int;
    abstract public function print(): void;
}
