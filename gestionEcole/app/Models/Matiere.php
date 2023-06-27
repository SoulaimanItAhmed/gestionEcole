<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Matiere extends Model
{
    use HasFactory;
    // public function enseignant()
    // {
    //     return $this->belongsTo(Enseignant::class);
    // }
    public function enseignant():BelongsTo
    {
        return $this->belongsTo(Enseignant::class);
    }
    public function eleves()
    {
        return $this->belongsToMany(Eleve::class, 'notes')->withPivot('note')->withTimestamps()->using(Note::class);
    }
}
