<?php
class data implements IteratorAggregate
{
    var string $first = "first";
    public string $second = "second";
    private string $third = "third";
    protected string $fourth = "fourth";
    // public function getIterator()
    // {
    //     $array = [
    //         "first" => $this->first,
    //         "second" => $this->second,
    //         "third" => $this->third,
    //         "fourth" => $this->fourth,
    //     ];
    //     return  new ArrayIterator($array);
    // }
    public function getIterator(): Iterator
    {

        yield "first" => $this->first;
        yield "second" => $this->second;
        yield "third" => $this->third;
        yield "fourth" => $this->fourth;

    }
}
$data = new Data();
foreach ($data as $key => $value) {
    echo "$key : $value" . PHP_EOL;
}