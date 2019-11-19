<?php

declare(strict_types=1);

namespace App\Tests\Service\Salary\Processor;

use App\Entity\Employee;
use App\Service\Salary\Processor\AgeProcessor;
use App\Service\Salary\Processor\CarProcessor;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class CarProcessorTest extends TestCase
{
    public function employeeProvider()
    {
        return [
            [new Employee("Mark", 26, 0, false, 10000), 10000, false],
            [new Employee("Mark", 26, 0, true, 10000), 9500, false],
            [new Employee("Mark", 26, 0, true, 400), 0, true],
        ];
    }

    /**
     * @dataProvider employeeProvider
     * @param Employee $employee
     * @param int $expectedSalary
     * @param bool $exception
     */
    public function testProcess(Employee $employee, int $expectedSalary, bool $exception): void
    {
        if ($exception) {
            $this->expectException(InvalidArgumentException::class);
        }

        $processor = new CarProcessor();
        $processor->process($employee);

        $this->assertEquals($expectedSalary, $employee->getSalary());
    }
}