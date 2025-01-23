<?php
require_once 'DBConnect.php';

class Command{

    private ContactManager $contactManager;


    public function __construct(ContactManager $contactManager)
    {
        $this->contactManager = $contactManager;
    }

    public function list(){
        echo "Liste des contacts :\n";
        echo "id, name, email, phone number\n";
        foreach($this->contactManager->findAll() as $contact) {
            echo $contact . "\n";
        }
    }

    public function detail($id){
        $contact = $this->contactManager->findById($id);
        if ($contact === null) {
            echo "Contact not found\n";
        } else {
            echo $contact . "\n";
        }
    }

    public function create($name, $email, $phone_number){
        $contact = new Contact();
        $contact->setName($name);
        $contact->setEmail($email);
        $contact->setPhoneNumber($phone_number);
        $this->contactManager->create($contact);
    }

    public function delete($id){
        $contact = $this->contactManager->findById($id);
        if ($contact === null) {
            echo "Contact not found\n";
        } else {
            $this->contactManager->delete($id);
            echo "Contact ". $contact ." is deleted\n";
        }
    }

    public function modify($id, $name, $email, $phone_number){
        $contact = $this->contactManager->findById($id);
        if ($contact === null) {
            echo "Contact not found\n";
        } else {
            $contact->setName($name);
            $contact->setEmail($email);
            $contact->setPhoneNumber($phone_number);
            $this->contactManager->update($contact);
            echo "Contact ". $contact ." is updated\n";
        }
    }

    public function init()
    {
        DBConnect::init();
        echo "Database initialized\n";
    }

    public function help()
    {
        echo "Available commands:\n";
        echo "init: initialize the database\n";
        echo "list: list all contacts\n";
        echo "detail <id>: show contact detail\n";
        echo "create <name>, <email>, <phone_number>: create a contact\n";
        echo "delete <id>: delete a contact\n";
        echo "modify <id>, <name>, <email>, <phone_number>: modify a contact\n";
        echo "exit: exit the program\n";
    }
}