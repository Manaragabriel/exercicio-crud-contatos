<?php 

namespace Src\App\Validations;
use Src\Domain\ContactDomain\ContactService;
use Illuminate\Database\Capsule\Manager as DB;
abstract class BaseValidation{

    private $contactService;
    abstract public function validate($contact);

    public function __construct(){
        $this->contactService = new ContactService();
    }

    protected function minLength($size,$value){
        if(strlen($value) < $size){
            return false;
        }
        return true;
    }

    
    protected function maxLength($size,$value){
        if(strlen($value) > $size){
            return false;
        }
        return true;
    }

    protected function isEmail($email){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }

    protected function isUnique($table, $column, $value){
        $data= DB::table($table)->where($column, $value)->first();
        if(!empty($data)){
            return false;
        }
        return true;
    }

    protected function existsInDatabase($table, $column, $value){
        $data= DB::table($table)->where($column, $value)->first();
        
        if($data !== NULL){
            return true;
        }
        return false;
    }

    protected function isPhone($phone){
        $phone= trim(str_replace('/', '', str_replace(' ', '', str_replace('-', '', str_replace(')', '', str_replace('(', '', $phone))))));

        $regexPhone = "/^[0-9]{11}$/";
    
        if (preg_match($regexPhone, $phone)) {
            return true;
        }else{
            return false;
        }
    }

    protected function isRequired($value){
        if(strlen($value) < 1){
            return false;
        }
        return true;
    }
 

    
}

?>