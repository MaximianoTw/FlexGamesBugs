<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Flexgames extends Model
{
    use HasFactory;

    const STATUS_ATIVO = "A";
    const STATUS_INATIVO = "I";
    const STATUS = [
        Flexgames::STATUS_ATIVO => "Aberto",
        Flexgames::STATUS_INATIVO => "Corrigido"
    ];

    protected $table = 'flexgames';
    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $dates = ['created_at', 'updated_at', 'data_publicacao'];

    public function getStatusFormatadoAttribute()
    {
        return Flexgames::STATUS[$this->status];
    }
    public function setDataPublicacaoAttribute($value)
    {
        $this->attributes['data_publicacao'] = Carbon::createFromFormat("d/m/Y", $value)->format("Y-m-d");
    }
}