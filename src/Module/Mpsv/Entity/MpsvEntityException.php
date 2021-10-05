<?php

declare(strict_types=1);

namespace App\Module\Mpsv\Entity;

/**
 * @author David Valenta <david.valenta96@gmail.com>
 */
final class MpsvEntityException extends \Exception
{
    public static function entityNotExist(string $key): self
    {
        return new self(
            sprintf(
                'MPSV Entity with key "%s" not exist.',
                $key
            )
        );
    }
}
