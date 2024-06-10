<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{ 
    use HasFactory;

    protected $fillable = [
        'nome',
        'preco',
        'tipo',
        'quantidade',
        'foto'
    ];

    protected $appends = ['links'];

    public function links(): Attribute
    {
        return new Attribute(
            get: fn() => [
                [
                    'rel' => 'self',
                    'url' => "/api/produtos/{$this->id}"
                ],
            ],
        );
    }
}
