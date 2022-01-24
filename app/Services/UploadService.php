<?php

namespace App\Services;

class UploadService
{
    public static function upload($arquivo)
    {
        $arquivo->storeAs('public', $arquivo->getClientOriginalName());
        return '/storage/' . $arquivo->getClientOriginalName();
    }
}