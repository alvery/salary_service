<?php
declare(strict_types=1);

namespace App\Service\Salary\Processor;


use App\Entity\Employee;

interface ProcessorInterface
{
    public function process(Employee $employee): void;
}