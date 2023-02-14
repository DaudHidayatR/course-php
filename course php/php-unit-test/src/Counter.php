<?php
namespace Daudhidayatramadhan\BelajarPhpUnitTest;

class counter
{
    private int $counter = 0;

    public function increment(): void
    {
        $this->counter++;
    }
    public function getCounter(): int
    {
        return $this->counter;
    }
}