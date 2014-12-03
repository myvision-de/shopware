<?php
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

namespace Shopware\Bundle\PluginInstallerBundle\Struct;

/**
 * Class StructHydrator
 * @package Shopware\Bundle\PluginInstallerBundle\Struct
 */
class StructHydrator
{
    /**
     * @param $data
     * @return BasketPositionStruct[]
     */
    private function hydrateBasketPosition($data)
    {
        $positions = [];
        foreach ($data as $row) {
            $positions[] = new BasketPositionStruct(
                $row['orderNumber'],
                $row['priceModel']['price'],
                $row['priceModel']['type']
            );
        }
        return $positions;
    }

    /**
     * @param $data
     * @return DomainStruct[]
     */
    private function hydrateBasketDomains($data)
    {
        $domains = [];
        foreach ($data as $row) {
            $domains[] = new DomainStruct(
                $row['domain'],
                $row['balance'],
                $row['dispo'],
                $row['isPartnerShop']
            );
        }
        return $domains;
    }

    /**
     * @param $billing
     * @param $contact
     * @return AddressStruct
     */
    private function hydrateBasketAddress($billing, $contact)
    {
        return new AddressStruct(
            $billing['country']['name'],
            $billing['zipCode'],
            $billing['city'],
            $billing['street'],
            $billing['email'],
            $contact['firstName'],
            $contact['lastName']
        );
    }

    /**
     * @param $data
     * @return BasketStruct
     */
    public function hydrateBasket($data)
    {
        $order = $data['order'];

        $positions = $this->hydrateBasketPosition($order['positions']);

        $domains = $this->hydrateBasketDomains($data['shops']);

        $address = $this->hydrateBasketAddress(
            $data['billingChannel'],
            $data['contactChannel']
        );

        return new BasketStruct(
            $domains,
            $address,
            $positions,
            $order['netPrice'],
            $order['grossPrice'],
            $order['taxRate'],
            $order['taxPrice']
        );
    }

    /**
     * @param $data
     * @param $shopwareId
     * @return AccessTokenStruct
     */
    public function hydrateAccessToken($data, $shopwareId)
    {
        $time = new \DateTime($data['expire']['date']);

        $struct = new AccessTokenStruct(
            $data['token'],
            $time,
            $shopwareId,
            $data['userId'],
            $data['locale']
        );

        return $struct;
    }

    /**
     * @param $data
     * @return PluginStruct
     */
    public function hydrateStorePlugin($data)
    {
        $plugin = new PluginStruct($data['name']);

        $this->assignStoreData(
            $plugin,
            $data
        );

        return $plugin;
    }

    /**
     * @param $data
     * @return PluginStruct
     */
    public function hydrateLocalPlugin($data)
    {
        $plugin = new PluginStruct($data['name']);

        $this->assignLocalData(
            $plugin,
            $data
        );

        return $plugin;
    }

    /**
     * @param $data
     * @return PluginStruct[] Indexed by plugin code
     */
    public function hydrateStorePlugins($data)
    {
        $plugins = array();

        foreach ($data as $pluginData) {
            $plugin = new PluginStruct($pluginData['name']);

            $this->assignStoreData(
                $plugin,
                $pluginData
            );

            $key = strtolower($plugin->getTechnicalName());
            $plugins[$key] = $plugin;
        }
        return $plugins;
    }

    /**
     * @param $data
     * @return PluginStruct[] Indexed by plugin code
     */
    public function hydrateLocalPlugins($data)
    {
        $plugins = array();
        foreach ($data as $pluginData) {
            $plugin = new PluginStruct($pluginData['name']);

            $this->assignLocalData(
                $plugin,
                $pluginData
            );

            $key = strtolower($plugin->getTechnicalName());
            $plugins[$key] = $plugin;
        }
        return $plugins;
    }

    public function assignStorePluginStruct(PluginStruct $localPlugin, PluginStruct $storePlugin)
    {
        $localPlugin->setExampleUrl($storePlugin->getExampleUrl());
        $localPlugin->setCode($storePlugin->getCode());

        $updateAvailable = version_compare(
            $storePlugin->getVersion(),
            $localPlugin->getVersion()
        );

        $localPlugin->setUpdateAvailable((bool) ($updateAvailable == 1));

        if ($storePlugin->getDescription()) {
            $localPlugin->setDescription($storePlugin->getDescription());
        }

        $localPlugin->setContactForm($storePlugin->getContactForm());
        $localPlugin->setRating($storePlugin->getRating());
        $localPlugin->setUseContactForm($storePlugin->useContactForm());
        $localPlugin->setInstallationManual($storePlugin->getInstallationManual());
        $localPlugin->setChangelog($storePlugin->getChangelog());
        $localPlugin->setPrices($storePlugin->getPrices());
        $localPlugin->setComments($storePlugin->getComments());
        $localPlugin->setPictures($storePlugin->getPictures());
        $localPlugin->setProducer($storePlugin->getProducer());
        $localPlugin->setIconPath($storePlugin->getIconPath());
        $localPlugin->setAddons($storePlugin->getAddons());
        $localPlugin->setEncrypted($storePlugin->isEncrypted());
        $localPlugin->setCertified($storePlugin->isCertified());
        $localPlugin->setLicenceCheck($storePlugin->hasLicenceCheck());
        if (!$localPlugin->hasCapabilityDummy()) {
            $localPlugin->setCapabilityDummy($storePlugin->hasCapabilityDummy());
        }
    }

    /**
     * @param PluginStruct $storePlugin
     * @param PluginStruct $localPlugin
     */
    public function assignLocalPluginStruct(PluginStruct $storePlugin, PluginStruct $localPlugin)
    {
        $storePlugin->setId($localPlugin->getId());
        $storePlugin->setInstallationDate($localPlugin->getInstallationDate());
        $storePlugin->setActive($localPlugin->isActive());
        $storePlugin->setSource($localPlugin->getSource());
        $storePlugin->setLicence($localPlugin->getLicence());
        $storePlugin->setCapabilityActivate($localPlugin->hasCapabilityActivate());
        $storePlugin->setCapabilityInstall($localPlugin->hasCapabilityInstall());
        $storePlugin->setCapabilityUpdate($localPlugin->hasCapabilityUpdate());

        $updateAvailable = version_compare(
            $storePlugin->getVersion(),
            $localPlugin->getVersion()
        );

        $storePlugin->setUpdateAvailable((bool) ($updateAvailable == 1));
        $storePlugin->setAvailableVersion($storePlugin->getVersion());
        $storePlugin->setVersion($localPlugin->getVersion());
        $storePlugin->setFormId($localPlugin->getFormId());
        $storePlugin->setUpdateDate($localPlugin->getUpdateDate());
        $storePlugin->setLocalIcon($localPlugin->getLocalIcon());

        if (!$storePlugin->hasCapabilityDummy()) {
            $storePlugin->setCapabilityDummy($localPlugin->hasCapabilityDummy());
        }
    }

    /**
     * @param $data
     * @return CategoryStruct[]
     */
    public function hydrateCategories($data)
    {
        $categories = array();

        foreach ($data as $categoryData) {
            $categories[] = $this->hydrateCategory($categoryData);
        }

        return $categories;
    }

    public function hydrateLicences($data)
    {
        $licences = [];

        foreach ($data as $row) {
            $licence = new LicenceStruct();

            $licence->setLabel($row['description']);
            $licence->setTechnicalName($row['plugin']['name']);
            $licence->setShop($row['shop']);
            $licence->setIconPath($row['plugin']['iconPath']);

            $subscription = null;
            if (isset($row['subscription'])) {
                $subscription = $row['subscription'];

                $licence->setSubscription($subscription['type']['name']);

                $date = new \DateTime($subscription['creationDate']);
                $licence->setCreationDate($date);
            }

            if (isset($subscription) && $subscription['expirationDate']) {
                $date = new \DateTime($subscription['expirationDate']);
                $licence->setExpirationDate($date);
            } else {
                if (isset($row['expirationDate'])) {
                    $date = new \DateTime($row['expirationDate']);
                    $licence->setExpirationDate($date);
                }
            }

            $licence->setLicenseKey($row['licenseKey']);

            $priceModel = $this->hydratePrices([$row['priceModel']]);
            $licence->setPriceModel(array_shift($priceModel));

            $binary = array_shift($row['plugin']['binaries']);
            $licence->setBinaryLink($binary['filePath']);
            $licence->setBinaryVersion($binary['version']);

            $licences[$licence->getTechnicalName()] = $licence;
        }

        return $licences;
    }

    /**
     * @param $data
     * @return CategoryStruct
     */
    public function hydrateCategory($data)
    {
        $category = new CategoryStruct();

        $category->setId($data['categoryId']);
        $category->setName($data['name']);
        $category->setParentId($data['parentId']);

        return $category;
    }

    /**
     * @param PluginStruct $plugin
     * @param $data
     */
    private function assignStoreData(PluginStruct $plugin, $data)
    {
        $plugin->setTechnicalName($data['name']);
        $plugin->setLabel($data['label']);
        $plugin->setCode($data['code']);
        $plugin->setDescription($data['description']);
        $plugin->setVersion($data['version']);
        $plugin->setContactForm($data['contactForm']);
        $plugin->setChangelog($data['changelog']);
        $plugin->setInstallationManual($data['installationManual']);
        $plugin->setExampleUrl($data['examplePageUrl']);
        $plugin->setIconPath($data['iconPath']);
        $plugin->setUseContactForm((bool) $data['useContactForm']);
        $plugin->setRating($data['ratingAverage']);

        if (isset($data['priceModels']) && !empty($data['priceModels'])) {
            $prices = $this->hydratePrices($data['priceModels']);
            $plugin->setPrices($prices);
        }

        if (isset($data['comments']) && !empty($data['comments'])) {
            $comments = $this->hydrateComments($data['comments']);
            $plugin->setComments($comments);
        }

        if (isset($data['pictures']) && !empty($data['pictures'])) {
            $pictures = $this->hydratePictures($data['pictures']);
            $plugin->setPictures($pictures);
        }

        if (isset($data['producer']) && !empty($data['producer'])) {
            $producer = $this->hydrateProducer($data['producer']);
            $plugin->setProducer($producer);
        }

        if (isset($data['addons']) && !empty($data['addons'])) {
            $addons = $data['addons'];

            $plugin->setAddons($addons);
            $plugin->setCapabilityDummy(in_array('integrated', $addons));
            $plugin->setFreeDownload(in_array('integrated', $addons));
            $plugin->setEncrypted(in_array('encryptionIonCube', $addons));
            $plugin->setLicenceCheck(in_array('licenseCheck', $addons));
            $plugin->setCertified(in_array('enterpriseCertified', $addons));
        }
    }

    /**
     * @param PluginStruct $plugin
     * @param $data
     */
    public function assignLocalData(PluginStruct $plugin, $data)
    {
        $plugin->setId((int) $data['id']);
        $plugin->setTechnicalName($data['name']);
        $plugin->setLabel($data['label']);
        $plugin->setActive((bool) $data['active']);
        $plugin->setVersion($data['version']);
        $plugin->setCapabilityActivate((bool) $data['capability_enable']);
        $plugin->setCapabilityUpdate((bool) $data['capability_update']);
        $plugin->setCapabilityInstall((bool) $data['capability_install']);
        $plugin->setSource($data['source']);
        $plugin->setFormId($data['form_id']);
        $plugin->setLocalIcon($data['iconPath']);

        if (isset($data['installation_date']) && !empty($data['installation_date'])) {
            $date = new \DateTime($data['installation_date']);
            $plugin->setInstallationDate($date);
        }

        if (isset($data['update_date']) && !empty($data['update_date'])) {
            $date = new \DateTime($data['update_date']);
            $plugin->setUpdateDate($date);
        }

        if (isset($data['author']) && !empty($data['author'])) {
            $producer = new ProducerStruct();
            $producer->setName($data['author']);
            $producer->setWebsite($data['link']);
            $plugin->setProducer($producer);
        }

        if (isset($data['__licence_id']) && !empty($data['__licence_id'])) {
            $licence = new LicenceStruct();
            $licence->setIconPath($plugin->getIconPath());
            $licence->setTechnicalName($plugin->getTechnicalName());
            $licence->setLabel($plugin->getLabel());
            $licence->setShop($data['__licence_host']);

            if (isset($data['__licence_creation']) && !empty($data['__licence_creation'])) {
                $date = new \DateTime($data['__licence_creation']);
                $licence->setCreationDate($date);
            }

            if (isset($data['__licence_expiration']) && !empty($data['__licence_expiration'])) {
                $date = new \DateTime($data['__licence_expiration']);
                $licence->setExpirationDate($date);
            }

            switch ($data['__licence_type']) {
                case 2:
                    $price = new PriceStruct('rent');
                    break;
                case 3:
                    $price = new PriceStruct('test');
                    break;
                default:
                    $price = new PriceStruct('buy');
            }

            $licence->setPriceModel($price);
            $plugin->setLicence($licence);
        }
    }

    private function hydrateProducer($data)
    {
        $producer = new ProducerStruct();

        $producer->setId($data['id']);
        $producer->setName($data['name']);
        $producer->setDescription($data['description']);
        $producer->setPrefix($data['prefix']);
        $producer->setWebsite($data['website']);
        $producer->setIconPath($data['iconPath']);

        return $producer;
    }

    /**
     * @param $data
     * @return PictureStruct[]
     */
    private function hydratePictures($data)
    {
        $pictures = [];
        foreach ($data as $row) {
            $picture = new PictureStruct();
            $picture->setId((int) $row['id']);
            $picture->setCover((bool) $row['preview']);
            $picture->setRemoteLink($row['remoteLink']);

            $pictures[] = $picture;
        }

        return $pictures;
    }

    /**
     * @param $data
     * @return PriceStruct[]
     */
    private function hydratePrices($data)
    {
        $prices = [];
        foreach ($data as $row) {
            $type = null;

            if (isset($row['discr'])) {
                switch ($row['discr']) {
                    case "priceModelBuy":
                        $type = 'buy';
                        break;
                    case "priceModelRent":
                        $type = 'rent';
                        break;
                    case "priceModelTest":
                        $type = 'test';
                        break;
                    case "priceModelFree":
                        $type = 'free';
                        break;

                    default:
                        $type = $row['discr'];
                }
            } else {
                $type = $row['type'];
            }

            $price = new PriceStruct($type);

            $price->setId((int) $row['id']);
            $price->setPrice((float) $row['price']);
            $price->setSubscription((bool) $row['subscription']);
            $price->setDuration($row['duration']);

            $prices[] = $price;
        }

        return $prices;
    }

    /**
     * @param $data
     * @return CommentStruct[]
     */
    private function hydrateComments($data)
    {
        $comments = [];
        foreach ($data as $row) {
            $comment = new CommentStruct();

            $comment->setAuthor($row['authorName']);
            $comment->setText($row['text']);
            $comment->setHeadline($row['headline']);
            $comment->setRating((int) $row['rating']);

            if (isset($row['creationDate']) && !empty($row['creationDate'])) {
                $date = new \DateTime();
                $date->setTimestamp($row['creationDate']);
                $comment->setCreationDate($date);
            }
            $comments[] = $comment;
        }
        return $comments;
    }

    /**
     * @param $data
     * @return LocaleStruct[]
     */
    public function hydrateLocales($data)
    {
        $locales = [];
        foreach ($data as $row) {
            $locale = new LocaleStruct();

            $locale->setId((int) $row['id']);
            $locale->setName($row['name']);
            $locale->setDescription($row['description']);

            $locales[] = $locale;
        }
        return $locales;
    }
}
