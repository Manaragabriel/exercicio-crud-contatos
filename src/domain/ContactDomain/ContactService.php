<?php 

namespace Src\Domain\ContactDomain;
use Illuminate\Database\Capsule\Manager as DB;
class ContactService{

    
   public function getContact($data){
      return Contact::where('id', $data['id'])->get();

   }
   public function getContacts($data){
      $page = isset($_GET['page']) ? $_GET['page'] : 1;
      return DB::table('contacts')->orderBy('name', 'asc')->paginate(8,['*'],'page', $page);
    }
    
    public function createContact($contact){
       return Contact::create($contact);
    }

    public function updateContact($contact){
        $updatedContact = Contact::where(['id' => $contact['id']])->first();
        if($updatedContact !== NULL){
            $updatedContact->name    =     $contact['name'];
            $updatedContact->email   =     $contact['email'];
            $updatedContact->address =     $contact['address'];
            $updatedContact->save();
            return $updatedContact;
        }
        return false;
     } 

    public function deleteContact($contact_id){
        return Contact::where(['id' => $contact_id])->delete();
     }
}



?>

