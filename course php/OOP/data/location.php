<?php
namespace data;
abstract class location {
    public string $name;
}

class city extends location{

}
class province extends location{

}
class country extends location
{
}