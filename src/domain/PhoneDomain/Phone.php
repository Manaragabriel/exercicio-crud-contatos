<?php 



namespace Src\Domain\PhoneDomain;
use Illuminate\Database\Eloquent\Model;


class Phone extends Model{
    protected $fillable = ['contact_id', 'number','reference'];

    public $timestamps = false;

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }
}