<?php

namespace App\Traits;

trait DataTransferObject
{
    public function __construct(array $data)
    {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }

    /**
     * Convert current DTO object into associative array.
     *
     * @return array
     */
    public function toArray(): array
    {
        return get_object_vars($this);
    }

    /**
     * Sets the default value for a specific attribute on the DTO.
     *
     * @param string $attribute
     * @param mixed $value
     * @return void
     */
    public function setDefault(string $attribute, mixed $value): void
    {
        if (property_exists($this, $attribute) || is_null($this->$attribute)) {
            $this->$attribute = $value;
        }
    }
}
