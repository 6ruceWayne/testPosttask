<?php


namespace App\Task\Interfaces;

use Jenssegers\Date\Date;

require_once 'PrintableInterface.php';
/**
 * Interface Post
 * @package App\Models
 *
 * Public fields:
 *
 * @property Date $created_at
 * @property string $text
 * @property int $views
 * @property null|array<Comment> $comments     Tip: if using Laravel, use a relationship
 */
interface PostInterface extends PrintableInterface
{
}
