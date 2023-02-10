<?php

//Employee Class
class Employee implements JsonSerializable
{
    private $id;
    private $first_name;
    private $last_name;
    private $email;
    private $age;
    private $salary;
    private $designation;
    private $updated_at;

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getFirstName()
    {
        return $this->first_name;
    }
    public function setFirstName($first_name)
    {
        $this->first_name = $first_name;
    }

    public function getLastName()
    {
        return $this->last_name;
    }
    public function setLastName($last_name)
    {
        $this->last_name = $last_name;
    }

    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getAge()
    {
        return $this->age;
    }
    public function setAge($age)
    {
        $this->age = $age;
    }

    public function getSalary()
    {
        return $this->salary;
    }
    public function setSalary($salary)
    {
        $this->salary = $salary;
    }

    public function getDesignation()
    {
        return $this->designation;
    }
    public function setDesignation($designation)
    {
        $this->designation = $designation;
    }

    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;
    }

    public function jsonSerialize(): array
    {
        return get_object_vars($this);
    }
}
