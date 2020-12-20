<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @ORM\Table(name="`user`")
 * @UniqueEntity(fields={"username"}, message="There is already an account with this username")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $sold;

    /**
     * @ORM\Column(type="integer")
     */
    private $centimes;

    /** 
    * @var date $birthday 
    * 
    * @ORM\Column(name="birthday", type="date", nullable=true) 
    */ 
    private $birthday;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $username;

     /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $name;

     /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $iban;


    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

     /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getIban(): string
    {
        return (string) $this->iban;
    }

    public function setIban(string $iban): self
    {
        $this->iban = $iban;

        return $this;
    }

   

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getName(): string
    {
        return (string) $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Set sold
     *
     * @param integer $sold
     *
     *
     */
    public function setSold($sold)
    {
        $this->sold = $sold;

        return $this;
    }

    /**
     * Get sold
     *
     * @return integer
     */
    public function getSold()
    {
        return $this->sold;
    }

    

    /** 
    * Set birthday 
    * 
    * @param \DateTime|null $birthday 
    */ 
    public function setBirthday(\DateTime $birthday = null) 
    { 
        $this->birthday = $birthday ? clone $birthday : null; 
    } 

    /** 
    * Get birthday 
    * 
    * @return \DateTime|null 
    */ 
    public function getBirthday() 
    { 
        return $this->birthday ? clone $this->birthday : null; 
    } 

     /**
     * Set centimes
     *
     * @param integer $centimes
     *
     *
     */
    public function setCentimes($centimes)
    {
        $this->centimes = $centimes;

        return $this;
    }

    /**
     * Get centimes
     *
     * @return integer
     */
    public function getCentimes()
    {
        return $this->centimes;
    }


    
    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    

 
    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }
}
