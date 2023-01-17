<?php

class address 
{
    public ?string $country;
}
class user 
{
    public ?address $address;
}
//manual null check
// function getCountry(?user $user): ?string
// {
//     if ($user != null){
//         if ($user->address != null){
//             return $user->address->country;
//         }
//     }
//     return null;
// }


//Nullsafe Operator
function getCountry(?user $user): ?string
{
    return $user?->address?->country;
}
echo getCountry(null). PHP_EOL;