<?php declare(strict_types=1);
/**
 * Shopware 5
 * Copyright (c) shopware AG
 *
 * According to our dual licensing model, this program can be used either
 * under the terms of the GNU Affero General Public License, version 3,
 * or under a proprietary license.
 *
 * The texts of the GNU Affero General Public License with an additional
 * permission and of our proprietary license can be found at and
 * in the LICENSE file you have received along with this program.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * "Shopware" is a registered trademark of shopware AG.
 * The licensing of the program under the AGPLv3 does not imply a
 * trademark license. Therefore any rights, title and interest in
 * our trademarks remain entirely with us.
 */

namespace Shopware\AreaCountry\Struct;

use Shopware\Framework\Struct\Struct;

class AreaCountryBasicStruct extends Struct
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string|null
     */
    protected $name;

    /**
     * @var string|null
     */
    protected $iso;

    /**
     * @var int|null
     */
    protected $areaId;

    /**
     * @var string|null
     */
    protected $en;

    /**
     * @var int|null
     */
    protected $position;

    /**
     * @var string|null
     */
    protected $notice;

    /**
     * @var bool|null
     */
    protected $shippingFree;

    /**
     * @var bool|null
     */
    protected $taxFree;

    /**
     * @var bool|null
     */
    protected $taxfreeForVatId;

    /**
     * @var bool|null
     */
    protected $taxfreeVatidChecked;

    /**
     * @var bool|null
     */
    protected $active;

    /**
     * @var string|null
     */
    protected $iso3;

    /**
     * @var bool
     */
    protected $displayStateInRegistration;

    /**
     * @var bool
     */
    protected $forceStateInRegistration;

    /**
     * @var string|null
     */
    protected $uuid;

    /**
     * @var string
     */
    protected $areaUuid;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    public function getIso(): ?string
    {
        return $this->iso;
    }

    public function setIso(?string $iso): void
    {
        $this->iso = $iso;
    }

    public function getAreaId(): ?int
    {
        return $this->areaId;
    }

    public function setAreaId(?int $areaId): void
    {
        $this->areaId = $areaId;
    }

    public function getEn(): ?string
    {
        return $this->en;
    }

    public function setEn(?string $en): void
    {
        $this->en = $en;
    }

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function setPosition(?int $position): void
    {
        $this->position = $position;
    }

    public function getNotice(): ?string
    {
        return $this->notice;
    }

    public function setNotice(?string $notice): void
    {
        $this->notice = $notice;
    }

    public function getShippingFree(): ?bool
    {
        return $this->shippingFree;
    }

    public function setShippingFree(?bool $shippingFree): void
    {
        $this->shippingFree = $shippingFree;
    }

    public function getTaxFree(): ?bool
    {
        return $this->taxFree;
    }

    public function setTaxFree(?bool $taxFree): void
    {
        $this->taxFree = $taxFree;
    }

    public function getTaxfreeForVatId(): ?bool
    {
        return $this->taxfreeForVatId;
    }

    public function setTaxfreeForVatId(?bool $taxfreeForVatId): void
    {
        $this->taxfreeForVatId = $taxfreeForVatId;
    }

    public function getTaxfreeVatidChecked(): ?bool
    {
        return $this->taxfreeVatidChecked;
    }

    public function setTaxfreeVatidChecked(?bool $taxfreeVatidChecked): void
    {
        $this->taxfreeVatidChecked = $taxfreeVatidChecked;
    }

    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(?bool $active): void
    {
        $this->active = $active;
    }

    public function getIso3(): ?string
    {
        return $this->iso3;
    }

    public function setIso3(?string $iso3): void
    {
        $this->iso3 = $iso3;
    }

    public function getDisplayStateInRegistration(): bool
    {
        return $this->displayStateInRegistration;
    }

    public function setDisplayStateInRegistration(bool $displayStateInRegistration): void
    {
        $this->displayStateInRegistration = $displayStateInRegistration;
    }

    public function getForceStateInRegistration(): bool
    {
        return $this->forceStateInRegistration;
    }

    public function setForceStateInRegistration(bool $forceStateInRegistration): void
    {
        $this->forceStateInRegistration = $forceStateInRegistration;
    }

    public function getUuid(): ?string
    {
        return $this->uuid;
    }

    public function setUuid(?string $uuid): void
    {
        $this->uuid = $uuid;
    }

    public function getAreaUuid(): string
    {
        return $this->areaUuid;
    }

    public function setAreaUuid(string $areaUuid): void
    {
        $this->areaUuid = $areaUuid;
    }
}
