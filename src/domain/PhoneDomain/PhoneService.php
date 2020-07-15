<?php 

namespace Src\Domain\PhoneDomain;
class PhoneService{




    public function getPhones($data){
      $phone = new Phone();
      if(isset($data['contact_id'])){
         $phone = $phone->where('contact_id',$data['contact_id'] );
      }
      return $phone->get();
    }
    
    public function createPhone($phone){

      return Phone::create($phone);
      
    }

    public function updatePhone($phone){
      $updatedPhone = Phone::where(['id' => $phone['id']])->first();

      if($updatedPhone !== NULL){
          $updatedPhone->number           =     $phone['number'];
          $updatedPhone->contact_id       =     $phone['contact_id'];
          $updatedPhone->save();
          return $updatedPhone;
         }
      return false;
      
     }

    public function deletePhone($phone_id){
        return Phone::where(['id' => $phone_id])->delete();
     }
}



?>