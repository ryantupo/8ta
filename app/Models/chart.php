<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chart extends Model
{
    use HasFactory;
    protected $table = 'charts';

    protected $fillable = [
        'user_id',
        'id',
        'chart_name',
        'config',
        'updated_at',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
