<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;
    
    /**
     * @ORM\Column(type="string", length=125)
     */
    private string $firstname;
    
    /**
     * @ORM\Column(type="string", length=150)
     */
    private string $lastname;
    
    /**
     * @ORM\Column(type="string", unique=true, length=175)
     */
    private string $email;
    
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
    public function getFirstname(): string
    {
        return $this->firstname;
    }
    
    /**
     * @param string $firstname
     */
    public function setFirstname(string $firstname): void
    {
        $this->firstname = $firstname;
    }
    
    /**
     * @return string
     */
    public function getLastname(): string
    {
        return $this->lastname;
    }
    
    /**
     * @param string $lastname
     */
    public function setLastname(string $lastname): void
    {
        $this->lastname = $lastname;
    }
    
    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }
    
    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }
    
}
