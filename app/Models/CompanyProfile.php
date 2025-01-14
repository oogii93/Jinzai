<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyProfile extends Model
{
    protected $fillable=[
        'user_id',
        // 'company_description',
        'industry',

        'website',

        'employee_number',
        'profit',
        'stablished',
        'details'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
