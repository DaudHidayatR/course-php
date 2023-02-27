<?php

namespace Daudhidayatramadhan\LoginManagement\Model;

class UserUpdatePasswordRequest
{
    public  ?string $id = null;
    public  ?string $oldPassword = null;
    public  ?string $newPassword = null;
}