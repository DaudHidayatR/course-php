<?php
class students
{
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
    public function __toString(): string
    {
        return "Student id: $this->id,  name: $this->name, address: $this->address";
    }

    public function __invoke(... $arguments):void
    {
        $join = join(",", $arguments);
        echo "invoke student with arguments $join".PHP_EOL;
    }
    public function __debugInfo()
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "address" => $this->address,
            "sample" => $this->sample,
            "AUTHOR"=>"DAUD",
            "version" => "1.0",
        ];
    }
}