<?php
require_once 'Contact.php';

class ContactManager{

    /**
     * Instance of PDO
     *
     * @var PDO
     */
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * Get all contacts
     * 
     * @return array|false 
     */
    public function findAll() : array|false
    {
        $stmt = $this->pdo->query('SELECT * FROM contact');
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Contact');
        return $stmt->fetchAll();
    }

    /**
     * Find a contact by id
     * 
     * @param int $id
     * @return Contact|null
     */
    public function findById(int $id) : Contact|null
    {
        $stmt = $this->pdo->prepare('SELECT * FROM contact WHERE id = :id');
        $stmt->execute(['id' => $id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Contact');
        return $stmt->fetch();
    }

    /**
     * Create a contact
     * 
     * @param Contact $contact
     * @return bool
     */
    public function create(Contact $contact) : bool
    {
        $stmt = $this->pdo->prepare('INSERT INTO contact (name, email, phone_number) VALUES (:name, :email, :phone_number)');
        return $stmt->execute([
            'name' => $contact->getName(),
            'email' => $contact->getEmail(),
            'phone_number' => $contact->getPhoneNumber()
        ]);
    }

    /**
     * delete a contact
     * 
     * @param int $id
     * @return bool
     */
    function delete(int $id) : void {
        $stmt = $this->pdo->prepare('DELETE FROM contact WHERE id = :id');
        $stmt->execute(['id' => $id]);
    }

    function update(Contact $contact) : void {
        $stmt = $this->pdo->prepare('UPDATE contact SET name = :name, email = :email, phone_number = :phone_number WHERE id = :id');
        $stmt->execute([
            'id' => $contact->getId(),
            'name' => $contact->getName(),
            'email' => $contact->getEmail(),
            'phone_number' => $contact->getPhoneNumber()
        ]);
    }
}