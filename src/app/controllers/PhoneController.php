<?php 


namespace Src\App\Controllers;
use Src\Domain\PhoneDomain\PhoneService;
use Src\App\Validations\PhoneValidation;
class PhoneController {

    private $phoneService;
    private $phoneValidation;

    public function __construct(){
        $this->phoneService = new PhoneService();
        $this->phoneValidation = new PhoneValidation();
    }

    public function getPhones($data){
         
        $phones = $this->phoneService->getPhones($data);
        echo  json_encode($phones);
    
    }
    
    public function createPhone($data){
        
        $validations = $this->phoneValidation->validate($data);

        if(empty($validations)){
            $newPhone = $this->phoneService->createPhone($data);
            http_response_code(200);
            echo  json_encode($newPhone);
        }else{
            http_response_code(422);
            echo  json_encode($validations);
        } 
        
    }
    
    public function updatePhone($data){
         
        $validations = $this->phoneValidation->validate($data, false);
        
        if(empty($validations)){
            $updatedPhone = $this->phoneService->updatePhone($data);
            if(!$updatedPhone){
                http_response_code(404);
                echo  json_encode(['error' => 'Phone not found']);
            }else{
                http_response_code(200);
                echo  json_encode($updatedPhone);
            }
        }else{
            http_response_code(422);
            echo  json_encode($validations);
        } 
        
      
    }
    
    public function deletePhone($data){
        $this->phoneService->deletePhone($data['id']);
        echo  json_encode(['deleted' => true]);    
    }
}


