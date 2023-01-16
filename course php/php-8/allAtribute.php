<?php
#[Attribute(Attribute::TARGET_PROPERTY | Attribute::TARGET_CLASS)]
class NotBlank
{

}
#[Attribute(Attribute::TARGET_PROPERTY)]

class length
{
    public int $min;
    public int $max;
    function __construct(int $min, int $max)
    {
        $this->min = $min;
        $this->max = $max;
    }

}
class loginRequest
{
    #[length(min: 6, max: 12)]
    #[NotBlank]
    public ?string $usernames;

    #[length(min: 6, max: 12)]
    #[NotBlank]
    public ?string $password;

    #[length(min: 6, max: 100)]
    #[NotBlank]
    public ?string $email;
}
function validate(object $object): void
{
    $class = new ReflectionClass($object);
    $properties = $class->getProperties();
    foreach ($properties as $propertie) {
        validateNotBlank($propertie, $object);
        validateLength($propertie, $object);
    }
}
function validateNotBlank(ReflectionProperty $property, object $object): void
{
    $attributes = $property->getAttributes(NotBlank::class);
    if (count($attributes) > 0) {
        if (!$property->isInitialized($object)) {
            throw new Exception("property $property->name is null");
        }
        if ($property->getValue($object) == null) {
            throw new Exception("property $property->name is null");
        }
    }
}
function validateLength(ReflectionProperty $property, object $object): void
{
    if (!$property->isInitialized($object) || $property->getValue($object) == null) {
        return;

    }
    $value = $property->getValue($object);
    $attributes = $property->getAttributes(length::class);
    foreach ($attributes as $attribute) {
        $length = $attribute->newInstance();
        $valueLength = strlen($value);
        if ($valueLength < $length->min) {
            throw new Exception("property $property->name is too short");
        }
        if ($valueLength > $length->max) {
            throw new Exception("property $property->name is too long");
        }
    }
}
$request = new loginRequest();
$request->usernames = "daudssss";
$request->password = "hidayat";
$request->email = "daud@gmail.com";


validate($request);