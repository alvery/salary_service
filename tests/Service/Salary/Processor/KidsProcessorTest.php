<?php

declare(strict_types=1);

namespace App\Tests\Service\Salary\Processor;

use App\Entity\Employee;
use App\Service\Salary\Processor\AgeProcessor;
use App\Service\Salary\Processor\KidsProcessor;
use PHPUnit\Framework\TestCase;

class KidsProcessorTest extends TestCase
{
    public function employeeProvider()
    {
        return [
            [new Employee("Mark", 26, 1, false, 10000), 20],
            [new Employee("Mark", 55, 3, false, 10000), 18],
            [new Employee("Mark", 55, 3, false, 10000, 10), 8],
            [new Employee("Mark", 55, 1, false, 10000, 10), 10],
        ];
    }

    /**
     * @dataProvider employeeProvider
     * @param Employee $employee
     * @param int $expectedTax
     */
    public function testProcess(Employee $employee, int $expectedTax): void
    {
        $processor = new KidsProcessor();
        $processor->process($employee);

        $this->assertEquals($expectedTax, $employee->getTax());
    }
}