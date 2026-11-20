<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'reviewer_name',
        'company_name',
        'equipment_type',
        'lane_route',
        'rating',
        'comment',
        'is_verified',
    ];
}