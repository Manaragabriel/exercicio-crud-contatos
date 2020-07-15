<?php 

namespace Src\App\Validations;
class PhoneValidation extends BaseValidation{

    public function validate($phone,$checkUnique = true){
        
        $errors = [];

        if( !$this->existsInDatabase('contacts','id',$phone['contact_id']) ){
            $errors['contact_id'][] = 'This contact not exist in database ';

        }  

        if( !$this->isPhone($phone['number'])){
            $errors['number'][] = 'This is not a valid phone number ';

        } 

        if($checkUnique){
            if( !$this->isUnique('phones','number',$phone['number']) ){
                $errors['number'][] = 'This phone already exists';
    
            }
        }
        return $errors;

    }


    
}






?>