<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'user_role')->using(UserRole::class);
    }
    
    public function hasRole(string $slug): bool
    {
        return $this->roles()->where('slug', $slug)->exists();
    }
    
    public function assignRoles(array $slugs): void
    {
        $newRoles = Role::whereIn('slug', $slugs)->pluck('id')->toArray();
        $this->roles()->syncWithoutDetaching($newRoles);
    }
    
    public function sendEmailVerificationNotification(): void
    {
        VerifyEmail::toMailUsing(static function ($notifiable, string $verificationUrl) {
            return (new MailMessage)
                ->subject('Ověření emailové adresy')
                ->line('Pro ověření vaší emailové adresy stiskněte tlačítko níže.')
                ->action('Ověřit emailovou adresu', $verificationUrl)
                ->line('Pokud jste nevytvářeli uživatelský účet, není nutná žádná další akce.');
        });
    
        parent::sendEmailVerificationNotification();
    }       
}
