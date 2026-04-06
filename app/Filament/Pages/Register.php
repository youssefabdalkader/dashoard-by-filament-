<?php

namespace App\Filament\Pages;
use Filament\Pages\Auth\Register as BaseRegister;

use Filament\Pages\Page;


class Register extends BaseRegister
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';


    protected static string $view = 'filament.pages.register';

     protected function handleRegistration(array $data): \Illuminate\Database\Eloquent\Model
    {
        $user = parent::handleRegistration($data);

        $user->assignRole('user'); // 👈 role افتراضي

        return $user;
    }
}
