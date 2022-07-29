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
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        "id",
        "curso_id",
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
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        "data_nascimento" => "date:Y-m-d"
    ];

    /**
     * Realiza relacionamento com model de Cursos.
     *
     * @return HasOne
     */
    public function curso() : HasOne
    {
        return $this->hasOne(Cursos::class, "id", "curso_id");
    }
}
