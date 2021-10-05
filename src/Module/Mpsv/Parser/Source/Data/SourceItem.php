<?php

declare(strict_types=1);

namespace App\Module\Mpsv\Parser\Source\Data;

/**
 * @author David Valenta <david.valenta96@gmail.com>
 */
final class SourceItem
{
    public function __construct(
        private string $id,
        private string $code,
        private string $name,
        private string $forBlind,
        private string $forPurBlind,
        private string $specialization
    ) {
    }

    public function getUniqId(): string
    {
        return md5($this->getId() . $this->getSpecialization());
    }

    public function getId (): string
    {
        return $this->id;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getForBlind(): string
    {
        return $this->forBlind;
    }

    public function getForPurBlind(): string
    {
        return $this->forPurBlind;
    }

    public function getSpecialization(): string
    {
        return $this->specialization;
    }
}
