<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'suppliers'; // Specify the table name if it's different from the model name
    protected $primaryKey = 'supplier_id'; // Specify the primary key if it's different from 'id'
    protected $fillable = [
        'supplier_name',
        'supplier_email',
        'contact_number',
        'address',
    ];}
