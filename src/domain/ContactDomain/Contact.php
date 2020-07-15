<?php 



namespace Src\Domain\ContactDomain;
use Illuminate\Database\Eloquent\Model;
use Src\Domain\PhoneDomain\Phone;

class Contact extends Model{
    protected $fillable = ['name', 'email', 'address'];

    public $timestamps = false;

    public function phones()
    {
        return $this->hasMany(Phone::class);
    }
}