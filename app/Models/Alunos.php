<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Alunos extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "alunos";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        "nome",
        "email",
        "data_nascimento",
        "curso_id"
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        "id",
        "created_at",
        "updated_at"
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array<string>
     */
    protected $dates = [
        "created_at",
        "updated_at",
        "data_nascimento"
    ];

    /**
     * Realiza relacionamento com model de Cursos.
     * 
     * @return HasOne
     */
    public function curso() : HasOne
    {
        return $this->hasOne(Cursos::class);
    }
}
