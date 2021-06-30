<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FinancingDetail extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    /**
     * Get the 'co-applicant' of financing detail record
     */
    public function co_applicant()
    {
        return $this->hasOne(FinancingDetail::class, 'co_applicant_parent_id', 'id');
    }
}
