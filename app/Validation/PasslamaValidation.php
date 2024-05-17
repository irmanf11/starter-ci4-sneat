<?php

namespace App\Validation;

use App\Models\PenggunaModel;

class PasslamaValidation
{
    public function passlama($value)
    {
        $pengguna = new PenggunaModel();
        $result = $pengguna->find(session()->get('id'));

        if (password_verify($value, $result['password'])) {
            return true;
        }

        return false;
    }
}
