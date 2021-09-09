<?php


namespace App\Task\Interfaces;

use Jenssegers\Date\Date;

require_once 'PrintableInterface.php';
/**
 * Interface Comment
 * @package App\Models
 *
 * Public fields:
 *
 * @property Date $created_at
 * @property string $text
 * @property null|Comment $referenced_comment      Tip: if using Laravel, use a relationship
 * @property null|array<comment> $replies
 * @property User $user
 */
interface CommentInterface extends PrintableInterface
{
}
