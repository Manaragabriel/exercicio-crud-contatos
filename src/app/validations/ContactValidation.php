<?php 

namespace Src\App\Validations;
class ContactValidation extends BaseValidation{

    public function validate($contact,$checkUnique = true){
        
        $errors = [];
        if( !$this->minLength(3, $contact['name']) ){
            $errors['name'][] = 'Name field need at least 3 characteres ';

        }

        if( !$this->maxLength(50, $contact['name']) ){
            $errors['name'][] = 'Name field should contain maximum 50 characteres';

        }


        if( !$this->isEmail($contact['email']) ){
            $errors['email'][] = 'Email field is not a valid email ';

        }

        if( !$this->maxLength(50, $contact['email']) ){
            $errors['email'][] = 'Email field should contain maximum 50 characteres';

        }

        if($checkUnique){
            if( !$this->isUnique('contacts','email',$contact['email']) ){
                $errors['email'][] = 'This email already exists';
    
            }
        }
      

        return $errors;

    }


    
}






?>