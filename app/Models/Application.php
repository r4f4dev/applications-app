<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'theme',
        'message',
        'thumbnail',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Returns application image.
     *
     * @return string
     */

    public function getImage(): string
    {
        return asset($this->thumbnail);
    }

    /**
     * Returns application status.
     *
     * @return bool
     */

    public function isChecked(): bool
    {
        return $this->status === 'checked';
    }

    /**
     * Changes application status.
     *
     * @return bool
     */

    public function changeStatus(): void
    {
        $this->status = 'checked';
        $this->save();
    }
}
