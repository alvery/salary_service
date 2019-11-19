<?php

declare(strict_types=1);

namespace App\Tests\Service\Salary\Processor;

use App\Entity\Employee;
use App\Service\Salary\Processor\AgeProcessor;
use PHPUnit\Framework\TestCase;

class AgeProcessorTest extends TestCase
{
    public function employeeProvider()
    {
        return [
            [new Employee("Mark", 26, 0, false, 10000), 10000],
            [new Employee("Mark", 55, 0, false, 10000), 10700],
        ];
    }

    /**
     * @dataProvider employeeProvider
     * @param Employee $employee
     * @param int $expectedSalary
     */
    public function testProcess(Employee $employee, int $expectedSalary): void
    {
        $processor = new AgeProcessor();
        $processor->process($employee);

        $this->assertEquals($expectedSalary, $employee->getSalary());
    }
}