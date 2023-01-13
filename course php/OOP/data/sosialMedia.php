<?php
class sosialMedia
{
    public string $name;
}
final class facebook extends sosialMedia
{
    final public function login(string $usename, string $password): bool
    {
        return true;
    }
}

?>