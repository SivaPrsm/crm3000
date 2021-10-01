<?php

namespace App\Entity;

use App\Repository\CustomerRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CustomerRepository::class)
 */
class Customer
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $first_name;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $last_name;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $mail;

    /**
     * @ORM\Column(type="datetime", options={"default": "CURRENT_TIMESTAMP"})
     */
    private $created_on;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $last_mail_on;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $has_answered;

    /**
     * @ORM\Column(type="boolean", options={"default": false})
     */
    private $has_consumed;

	public function __construct()
	{
		$this->created_on = new \DateTime();
	}

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->first_name;
    }

    public function setFirstName(string $first_name): self
    {
        $this->first_name = $first_name;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->last_name;
    }

    public function setLastName(string $last_name): self
    {
        $this->last_name = $last_name;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getCreatedOn(): ?\DateTimeInterface
    {
        return $this->created_on;
    }

    public function setCreatedOn(\DateTimeInterface $created_on): self
    {
        $this->created_on = $created_on;

        return $this;
    }

    public function getLastMailOn(): ?\DateTimeInterface
    {
        return $this->last_mail_on;
    }

    public function setLastMailOn(?\DateTimeInterface $last_mail_on): self
    {
        $this->last_mail_on = $last_mail_on;

        return $this;
    }

    public function getHasAnswered(): ?bool
    {
        return $this->has_answered;
    }

    public function setHasAnswered(?bool $has_answered): self
    {
        $this->has_answered = $has_answered;

        return $this;
    }

    public function getHasConsumed(): ?bool
    {
        return $this->has_consumed;
    }

    public function setHasConsumed(bool $has_consumed): self
    {
        $this->has_consumed = $has_consumed;

        return $this;
    }
}
