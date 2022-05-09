<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Auditable as AuditableTrait;
use Illuminate\Support\Facades\Event;
use OwenIt\Auditing\Events\AuditCustom;

class Student extends Model implements Auditable
{
    use HasFactory;
    use AuditableTrait;

    protected $fillable = [
        'first_name', 
        'last_name', 
        'id_number', 
        'date_of_birth',
        'home_address',
        'email',
        'phone',
        'school_id'
    ];

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function transferStudent($student)
    {
        $this->auditEvent = 'transfer';
        $this->isCustomEvent = true;
        $this->auditCustomOld = [
            "school" => 'old'
        ];
        $this->auditCustomNew = [
            "school" => 'new'
        ];
        Event::dispatch(AuditCustom::class, [$this]);
    }
}
