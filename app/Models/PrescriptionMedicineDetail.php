<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrescriptionMedicineDetail extends Model
{
    use HasFactory;
    protected $fillable = ['prescription_id', 'medicine_name', 'quantity', 'frequency', 'meal_status'];
}
