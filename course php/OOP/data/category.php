<?php

class Category
{
    private string $name;
    private string $expensive;

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        if(trim($name)!=""){
            $this->name = $name;
        }


        return $this;
    }

    public function getExpensive()
    {
        return $this->expensive;
    }

    public function setExpensive($expensive)
    {
        $this->expensive = $expensive;

        return $this;
    }
}
