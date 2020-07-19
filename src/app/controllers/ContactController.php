<?php 


namespace Src\App\Controllers;
use Src\Domain\ContactDomain\ContactService;
use Src\App\Validations\ContactValidation;
class ContactController {

    private $contactService;
    private $contactValidation;

    public function __construct(){
        $this->contactService = new ContactService();
        $this->contactValidation = new ContactValidation();
    }


    public function getContact($data){
        
        $contact = $this->contactService->getContact($data);
        echo  json_encode($contact);
       
    }
    

    public function getContacts($data){
        
        $contacts = $this->contactService->getContacts($data);
        echo  json_encode($contacts);
       
    }
    
    public function createContact($data){
           
        $validations = $this->contactValidation->validate($data);
        if(empty($validations)){
            $newContact = $this->contactService->createContact($data);
            http_response_code(200);
            echo  json_encode($newContact);
        }else{
            http_response_code(422);
            echo  json_encode($validations);
        }   
       
    }
    
    public function updateContact($data){
  
        $validations = $this->contactValidation->validate($data,false);
        if(empty($validations)){

            $updatedContact = $this->contactService->updateContact($data);
            if(!$updatedContact){
                http_response_code(404);
                echo  json_encode(['error' => 'Contact not found']);
            }else{
                http_response_code(200);
                echo  json_encode($updatedContact);
            }
        }else{
            http_response_code(422);
            echo  json_encode($validations);
        }
        
    }
    
    public function deleteContact($data){
        $this->contactService->deleteContact($data['id']);
        echo  json_encode(['deleted' => true]);
        
    }
}




