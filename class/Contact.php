<?php

class Contact{

    /**
     * id de la personne
     * 
     * @var int|string
     */
    private $id;

    /*
    * nom de la personne
    *
    * @var string
    */
    private $name;

    /**
     * email de la personne
     *
     * @var string
     */
    private $email;

    /**
     * numéro de téléphone de la personne
     *
     * @var string
     */
    private $phone_number;

    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     */
    public function setName($name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     */
    public function setEmail($email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of phone_number
     */
    public function getPhoneNumber()
    {
        return $this->phone_number;
    }

    /**
     * Set the value of phone_number
     */
    public function setPhoneNumber($phone_number): self
    {
        $this->phone_number = $phone_number;

        return $this;
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }

    public function __toString()
    {
        return $this->getId().", ". $this->getName().", ". $this->getEmail().", ". $this->getPhoneNumber();
    }
}