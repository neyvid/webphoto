<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriceOfPrint extends Model
{
    use HasFactory;
    protected $guarded=['id'];
    protected $table = 'price_of_print';

}
