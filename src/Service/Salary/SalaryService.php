<?php

namespace App\Service\Salary;

use App\Entity\Employee;
use App\Service\Salary\Processor\ProcessorInterface;

class SalaryService
{
    /**
     * @var ProcessorInterface[]
     */
    private $processors;

    public function __construct()
    {
    }

    public function addProcessor(ProcessorInterface $processor) {
        $this->processors[] = $processor;
    }

    public function calculateSalary(Employee $employee): int {
        foreach ($this->processors as $processor) {
            $processor->process($employee);
        }

        return $employee->getSalary() * $employee->getTax() / 100;
    }

}