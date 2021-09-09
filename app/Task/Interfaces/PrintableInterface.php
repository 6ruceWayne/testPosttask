<?php


namespace App\Task\Interfaces;

/**
 * Objects with this interface may be displayed to the user
 *
 * Interface Printable
 * @package App\Models
 */
interface PrintableInterface
{
    /**
     * Generate $number entries of this type
     *
     * @param int $number
     */
    public function generate(int $number): void;

    /**
     * @return string JSON representation of the model's public fields
     */
    public function toJSON(): string;
}
