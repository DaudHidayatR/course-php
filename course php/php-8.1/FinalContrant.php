<?php
class foo{
    final const XX = "foo";
}
class  Bar extends Foo{
//    const  XX = "Bar";
}
var_dump(Bar::XX);