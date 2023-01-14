<?php
class students{
    public string $name;
    public string $id;
    public string $address;

    private string $sample;

    public function setSample($sample)
    {
        $this->sample = $sample;

        return $this;
    }

    public function __clone()
    {
        unset($this->sample);
    }
}