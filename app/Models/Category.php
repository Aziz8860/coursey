<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    // cara pertama dalam mempersiapkan mass assignment. PK diisi otomatis oleh laravel
    protected $fillable = [
        'name',
        'slug',
        'icon',
    ];

    // cara kedua, memasukkan semua kecuali id karena ia primary key
    // cons: user dapat memasukkan data apa saja yang membahayakan sistem
    // jadi tidak cocok untuk data sensitif seperti password
    protected $guarded = [
        'id',
    ];

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
