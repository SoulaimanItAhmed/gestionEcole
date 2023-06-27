<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Eleve extends Model
{
    protected $table = 'eleves';
    protected $fillable = ['nom','prenom','date_de_naissance','adresse','telephone','classe_id','user_id'];
    use HasFactory;
    public function classe():BelongsTo
    {
        return $this->belongsTo(Classe::class);
    }
    public function matieres()
    {
        return $this->belongsTo(Matiere::class, 'notes')->withPivot('note')->withTimestamps()->using(Note::class);
    }
}
