<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $hidden = ['type', 'created_at', 'updated_at', 'deleted_at'];
    protected $appends = ['tech_gen', 'is_accessory', 'is_preset_filter', 'actual_price'];

    public function getImageAttribute($value)
    {
        return asset('images/' . $value);
    }

    public function getTechGenAttribute()
    {
        if($this->technology && $this->generation)
            return $this->technology . ' GEN ' . $this->generation;

        return null;
    }

    public function getIsAccessoryAttribute()
    {
        return $this->type == 'ACCESSORY';
    }

    public function getIsPresetFilterAttribute()
    {
        return $this->type == 'PRESET_FILTER';
    }

    public function getActualPriceAttribute()
    {
        if ($this->promo_id)
            return $this->getRawOriginal('price');

        return null;
    }

    public function getPriceAttribute($value)
    {
        if ($this->promo_id) {
            $promo = $this->promo()->first();
            return $value - $this->promoDiscount($promo->discount_unit, $promo->discount_value, $value);
        }
        return $value;
    }

    private function promoDiscount($discount_unit, $discount_value, $amount)
    {
        if ($discount_unit == 'PERCENTAGE') {
            return $amount * $discount_value / 100;
        } else if ($discount_unit == 'AMOUNT') {
            return $discount_value < $amount ? $discount_value : $amount;
        }
    }

    public function promo()
    {
        return $this->belongsTo(Promo::class);
    }
}
