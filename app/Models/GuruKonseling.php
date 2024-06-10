<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuruKonseling extends Model
{
    use HasFactory;
    protected $table = 'guru_konselings';
	protected $guarded = [];
}
