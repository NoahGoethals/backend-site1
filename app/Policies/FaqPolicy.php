<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Faq;

class FaqPolicy
{
    public function viewAny(User $user)
    {
        return true; // Iedereen mag FAQ's zien
    }

    public function view(User $user, Faq $faq)
    {
        return true;
    }

    public function create(User $user)
    {
        return $user->is_admin === 1;
    }

    public function update(\App\Models\User $user, \App\Models\Faq $faq)
    {
        return $user->is_admin === 1;
    }

    public function delete(User $user, Faq $faq)
    {
        return $user->is_admin === 1;
    }
}
