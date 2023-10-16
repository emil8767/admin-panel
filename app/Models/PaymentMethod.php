<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    use HasFactory;

    public static $statuses = [true => 'true', false => 'false'];

    protected  $fillable = ['status', 'order', 'segment', 'name', 'max_error'];
}
