<?php


namespace App\Task\Interfaces;

use Jenssegers\Date\Date;

require_once 'PostInterface.php';

/**
 * Interface MediaPost
 * @package App\Models
 *
 * Public fields:
 *
 * @property string $image  # Use a set of stock images or a random pic generator for this
 *
 */
interface MediaPostInterface extends PostInterface
{
    public function getComments(): array;
}
