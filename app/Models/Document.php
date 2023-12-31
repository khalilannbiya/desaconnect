<?php

namespace App\Models;

use App\Models\DocumentRequirement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Document extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'request_number',
        'document_type',
        'status',
        'response',
    ];

    public function documentRequirement()
    {
        return $this->hasMany(DocumentRequirement::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
