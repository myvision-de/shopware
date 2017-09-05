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

namespace Shopware\Customer\Struct;

use Shopware\CustomerAddress\Struct\CustomerAddressBasicStruct;
use Shopware\CustomerGroup\Struct\CustomerGroupBasicStruct;
use Shopware\Framework\Struct\Struct;
use Shopware\PaymentMethod\Struct\PaymentMethodBasicStruct;

class CustomerBasicStruct extends Struct
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $uuid;

    /**
     * @var string
     */
    protected $password;

    /**
     * @var string
     */
    protected $encoder;

    /**
     * @var string
     */
    protected $email;

    /**
     * @var bool
     */
    protected $active;

    /**
     * @var int
     */
    protected $accountMode;

    /**
     * @var string
     */
    protected $confirmationKey;

    /**
     * @var int
     */
    protected $lastPaymentMethodId;

    /**
     * @var string
     */
    protected $lastPaymentMethodUuid;

    /**
     * @var \DateTime
     */
    protected $firstLogin;

    /**
     * @var \DateTime
     */
    protected $lastLogin;

    /**
     * @var string|null
     */
    protected $sessionId;

    /**
     * @var bool
     */
    protected $newsletter;

    /**
     * @var string
     */
    protected $validation;

    /**
     * @var int
     */
    protected $affiliate;

    /**
     * @var string
     */
    protected $groupKey;

    /**
     * @var string
     */
    protected $groupUuid;

    /**
     * @var int
     */
    protected $defaultPaymentMethodId;

    /**
     * @var string
     */
    protected $defaultPaymentMethodUuid;

    /**
     * @var int
     */
    protected $shopId;

    /**
     * @var string
     */
    protected $shopUuid;

    /**
     * @var int
     */
    protected $mainShopId;

    /**
     * @var string
     */
    protected $mainShopUuid;

    /**
     * @var string
     */
    protected $referer;

    /**
     * @var int|null
     */
    protected $priceGroupId;

    /**
     * @var string|null
     */
    protected $priceGroupUuid;

    /**
     * @var string
     */
    protected $internalComment;

    /**
     * @var int
     */
    protected $failedLogins;

    /**
     * @var \DateTime|null
     */
    protected $lockedUntil;

    /**
     * @var int|null
     */
    protected $defaultBillingAddressId;

    /**
     * @var string|null
     */
    protected $defaultBillingAddressUuid;

    /**
     * @var int|null
     */
    protected $defaultShippingAddressId;

    /**
     * @var string|null
     */
    protected $defaultShippingAddressUuid;

    /**
     * @var string|null
     */
    protected $title;

    /**
     * @var string|null
     */
    protected $salutation;

    /**
     * @var string|null
     */
    protected $firstName;

    /**
     * @var string|null
     */
    protected $lastName;

    /**
     * @var \DateTime|null
     */
    protected $birthday;

    /**
     * @var string|null
     */
    protected $number;

    /**
     * @var CustomerGroupBasicStruct
     */
    protected $customerGroup;
    /**
     * @var CustomerAddressBasicStruct
     */
    protected $defaultShippingAddress;
    /**
     * @var CustomerAddressBasicStruct
     */
    protected $defaultBillingAddress;
    /**
     * @var PaymentMethodBasicStruct|null
     */
    protected $lastPaymentMethod;
    /**
     * @var PaymentMethodBasicStruct
     */
    protected $defaultPaymentMethod;

    /**
     * @var CustomerAddressBasicStruct|null
     */
    protected $activeBillingAddress;

    /**
     * @var CustomerAddressBasicStruct|null
     */
    protected $activeShippingAddress;


    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getUuid(): string
    {
        return $this->uuid;
    }

    public function setUuid(string $uuid): void
    {
        $this->uuid = $uuid;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getEncoder(): string
    {
        return $this->encoder;
    }

    public function setEncoder(string $encoder): void
    {
        $this->encoder = $encoder;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getActive(): bool
    {
        return $this->active;
    }

    public function setActive(bool $active): void
    {
        $this->active = $active;
    }

    public function getAccountMode(): int
    {
        return $this->accountMode;
    }

    public function setAccountMode(int $accountMode): void
    {
        $this->accountMode = $accountMode;
    }

    public function getConfirmationKey(): string
    {
        return $this->confirmationKey;
    }

    public function setConfirmationKey(string $confirmationKey): void
    {
        $this->confirmationKey = $confirmationKey;
    }

    public function getLastPaymentMethodId(): int
    {
        return $this->lastPaymentMethodId;
    }

    public function setLastPaymentMethodId(int $lastPaymentMethodId): void
    {
        $this->lastPaymentMethodId = $lastPaymentMethodId;
    }

    public function getLastPaymentMethodUuid(): string
    {
        return $this->lastPaymentMethodUuid;
    }

    public function setLastPaymentMethodUuid(string $lastPaymentMethodUuid): void
    {
        $this->lastPaymentMethodUuid = $lastPaymentMethodUuid;
    }

    public function getFirstLogin(): \DateTime
    {
        return $this->firstLogin;
    }

    public function setFirstLogin(\DateTime $firstLogin): void
    {
        $this->firstLogin = $firstLogin;
    }

    public function getLastLogin(): \DateTime
    {
        return $this->lastLogin;
    }

    public function setLastLogin(\DateTime $lastLogin): void
    {
        $this->lastLogin = $lastLogin;
    }

    public function getSessionId(): ?string
    {
        return $this->sessionId;
    }

    public function setSessionId(?string $sessionId): void
    {
        $this->sessionId = $sessionId;
    }

    public function getNewsletter(): bool
    {
        return $this->newsletter;
    }

    public function setNewsletter(bool $newsletter): void
    {
        $this->newsletter = $newsletter;
    }

    public function getValidation(): string
    {
        return $this->validation;
    }

    public function setValidation(string $validation): void
    {
        $this->validation = $validation;
    }

    public function getAffiliate(): int
    {
        return $this->affiliate;
    }

    public function setAffiliate(int $affiliate): void
    {
        $this->affiliate = $affiliate;
    }

    public function getGroupKey(): string
    {
        return $this->groupKey;
    }

    public function setGroupKey(string $groupKey): void
    {
        $this->groupKey = $groupKey;
    }

    public function getGroupUuid(): string
    {
        return $this->groupUuid;
    }

    public function setGroupUuid(string $groupUuid): void
    {
        $this->groupUuid = $groupUuid;
    }

    public function getDefaultPaymentMethodId(): int
    {
        return $this->defaultPaymentMethodId;
    }

    public function setDefaultPaymentMethodId(int $defaultPaymentMethodId): void
    {
        $this->defaultPaymentMethodId = $defaultPaymentMethodId;
    }

    public function getDefaultPaymentMethodUuid(): string
    {
        return $this->defaultPaymentMethodUuid;
    }

    public function setDefaultPaymentMethodUuid(string $defaultPaymentMethodUuid): void
    {
        $this->defaultPaymentMethodUuid = $defaultPaymentMethodUuid;
    }

    public function getShopId(): int
    {
        return $this->shopId;
    }

    public function setShopId(int $shopId): void
    {
        $this->shopId = $shopId;
    }

    public function getShopUuid(): string
    {
        return $this->shopUuid;
    }

    public function setShopUuid(string $shopUuid): void
    {
        $this->shopUuid = $shopUuid;
    }

    public function getMainShopId(): int
    {
        return $this->mainShopId;
    }

    public function setMainShopId(int $mainShopId): void
    {
        $this->mainShopId = $mainShopId;
    }

    public function getMainShopUuid(): string
    {
        return $this->mainShopUuid;
    }

    public function setMainShopUuid(string $mainShopUuid): void
    {
        $this->mainShopUuid = $mainShopUuid;
    }

    public function getReferer(): string
    {
        return $this->referer;
    }

    public function setReferer(string $referer): void
    {
        $this->referer = $referer;
    }

    public function getPriceGroupId(): ?int
    {
        return $this->priceGroupId;
    }

    public function setPriceGroupId(?int $priceGroupId): void
    {
        $this->priceGroupId = $priceGroupId;
    }

    public function getPriceGroupUuid(): ?string
    {
        return $this->priceGroupUuid;
    }

    public function setPriceGroupUuid(?string $priceGroupUuid): void
    {
        $this->priceGroupUuid = $priceGroupUuid;
    }

    public function getInternalComment(): string
    {
        return $this->internalComment;
    }

    public function setInternalComment(string $internalComment): void
    {
        $this->internalComment = $internalComment;
    }

    public function getFailedLogins(): int
    {
        return $this->failedLogins;
    }

    public function setFailedLogins(int $failedLogins): void
    {
        $this->failedLogins = $failedLogins;
    }

    public function getLockedUntil(): ?\DateTime
    {
        return $this->lockedUntil;
    }

    public function setLockedUntil(?\DateTime $lockedUntil): void
    {
        $this->lockedUntil = $lockedUntil;
    }

    public function getDefaultBillingAddressId(): ?int
    {
        return $this->defaultBillingAddressId;
    }

    public function setDefaultBillingAddressId(?int $defaultBillingAddressId): void
    {
        $this->defaultBillingAddressId = $defaultBillingAddressId;
    }

    public function getDefaultBillingAddressUuid(): ?string
    {
        return $this->defaultBillingAddressUuid;
    }

    public function setDefaultBillingAddressUuid(?string $defaultBillingAddressUuid): void
    {
        $this->defaultBillingAddressUuid = $defaultBillingAddressUuid;
    }

    public function getDefaultShippingAddressId(): ?int
    {
        return $this->defaultShippingAddressId;
    }

    public function setDefaultShippingAddressId(?int $defaultShippingAddressId): void
    {
        $this->defaultShippingAddressId = $defaultShippingAddressId;
    }

    public function getDefaultShippingAddressUuid(): ?string
    {
        return $this->defaultShippingAddressUuid;
    }

    public function setDefaultShippingAddressUuid(?string $defaultShippingAddressUuid): void
    {
        $this->defaultShippingAddressUuid = $defaultShippingAddressUuid;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }

    public function getSalutation(): ?string
    {
        return $this->salutation;
    }

    public function setSalutation(?string $salutation): void
    {
        $this->salutation = $salutation;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(?string $firstName): void
    {
        $this->firstName = $firstName;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(?string $lastName): void
    {
        $this->lastName = $lastName;
    }

    public function getBirthday(): ?\DateTime
    {
        return $this->birthday;
    }

    public function setBirthday(?\DateTime $birthday): void
    {
        $this->birthday = $birthday;
    }

    public function getNumber(): ?string
    {
        return $this->number;
    }

    public function setNumber(?string $number): void
    {
        $this->number = $number;
    }

    public function getCustomerGroup(): CustomerGroupBasicStruct
    {
        return $this->customerGroup;
    }

    public function setCustomerGroup(CustomerGroupBasicStruct $customerGroup): void
    {
        $this->customerGroup = $customerGroup;
    }

    public function getDefaultShippingAddress(): CustomerAddressBasicStruct
    {
        return $this->defaultShippingAddress;
    }

    public function setDefaultShippingAddress(CustomerAddressBasicStruct $defaultShippingAddress): void
    {
        $this->defaultShippingAddress = $defaultShippingAddress;
    }

    public function getDefaultBillingAddress(): CustomerAddressBasicStruct
    {
        return $this->defaultBillingAddress;
    }

    public function setDefaultBillingAddress(CustomerAddressBasicStruct $defaultBillingAddress): void
    {
        $this->defaultBillingAddress = $defaultBillingAddress;
    }

    public function getLastPaymentMethod(): ?PaymentMethodBasicStruct
    {
        return $this->lastPaymentMethod;
    }

    public function setLastPaymentMethod(?PaymentMethodBasicStruct $lastPaymentMethod): void
    {
        $this->lastPaymentMethod = $lastPaymentMethod;
    }

    public function getDefaultPaymentMethod(): PaymentMethodBasicStruct
    {
        return $this->defaultPaymentMethod;
    }

    public function setDefaultPaymentMethod(PaymentMethodBasicStruct $defaultPaymentMethod): void
    {
        $this->defaultPaymentMethod = $defaultPaymentMethod;
    }

    public function getActiveBillingAddress(): CustomerAddressBasicStruct
    {
        if (!$this->activeBillingAddress) {
            return $this->defaultBillingAddress;
        }

        return $this->activeBillingAddress;
    }

    public function setActiveBillingAddress(CustomerAddressBasicStruct $activeBillingAddress): void
    {
        $this->activeBillingAddress = $activeBillingAddress;
    }

    public function getActiveShippingAddress(): CustomerAddressBasicStruct
    {
        if (!$this->activeShippingAddress) {
            return $this->defaultShippingAddress;
        }

        return $this->activeShippingAddress;
    }

    public function setActiveShippingAddress(CustomerAddressBasicStruct $activeShippingAddress): void
    {
        $this->activeShippingAddress = $activeShippingAddress;
    }

    public function jsonSerialize(): array
    {
        $data = parent::jsonSerialize();
        $data['activeShippingAddress'] = $this->getActiveShippingAddress();
        $data['activeBillingAddress'] = $this->getActiveBillingAddress();
        return $data;
    }
}
