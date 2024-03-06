<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockSupplier extends Model
{
    protected $fillable = ['stock_id', 'stock_name', 'supplier_id', 'supplier_name'];

    public function stock()
    {
        return $this->belongsTo(Stock::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
