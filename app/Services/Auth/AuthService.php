<?php

namespace App\Services\Auth;

use App\Enums\User\UserTypeEnum;
use App\Models\User;
use Illuminate\Support\Facades\URL;

class AuthService
{
    public function login(
        string $username,
        string $password,
        UserTypeEnum $userType,
    ): bool {
        $success = auth()->attempt([
            'email' => $username,
            'password' => $password,
        ]);

        if ($success) {
            $unauthorizedAdminLogin = $userType === UserTypeEnum::ADMIN
                && ! auth()->user()->isActiveUser();
            $unauthorizedStaffLogin = $userType === UserTypeEnum::STAFF
                && ! auth()->user()->isActiveUser();

            if ($unauthorizedAdminLogin || $unauthorizedStaffLogin) {
                auth()->logout();
                $success = false;
            } else {
                session()->regenerate();
            }
        }

        return $success;
    }
}
