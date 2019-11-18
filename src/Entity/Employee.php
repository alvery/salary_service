<?php
declare(strict_types=1);

namespace App\Entity;

class Employee
{
    private const DEFAULT_SALARY_TAX_PERCENT = 20;

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $age;

    /**
     * @var int
     */
    private $kidsAmount;

    /**
     * @var bool
     */
    private $companyCar;

    /**
     * @var int
     */
    private $salary;

    /**
     * @var int
     */
    private $tax;

    public function __construct()
    {
        $this->tax = self::DEFAULT_SALARY_TAX_PERCENT;
    }

    /**
     * @return int
     */
    public function getTax(): int
    {
        return $this->tax;
    }

    /**
     * @param int $tax
     */
    public function setTax(int $tax): void
    {
        $this->tax = $tax;
    }

    /**
     * @param int $salary
     */
    public function setSalary(int $salary): void
    {
        $this->salary = $salary;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }

    /**
     * @return int
     */
    public function getKidsAmount(): int
    {
        return $this->kidsAmount;
    }

    /**
     * @return bool
     */
    public function isCompanyCar(): bool
    {
        return $this->companyCar;
    }

    /**
     * @return int
     */
    public function getSalary(): int
    {
        return $this->salary;
    }
}