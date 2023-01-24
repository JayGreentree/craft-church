<?php
/**
 * @link https://craftcms.com/
 * @copyright Copyright (c) Pixel & Tonic, Inc.
 * @license https://craftcms.github.io/license/
 */

namespace craft\services;

use Craft;
use yii\base\Exception;
use yii\base\InvalidArgumentException;
use yii\base\InvalidConfigException;
use yii\helpers\Inflector;

/**
 * Security service.
 *
 * An instance of the service is available via [[\yii\base\Application::getSecurity()|`Craft::$app->security`]].
 *
 * @author Pixel & Tonic, Inc. <support@pixelandtonic.com>
 * @since 3.0.0
 */
class Security extends \yii\base\Security
{
    /**
     * @var string[] Keywords used to reference sensitive data
     * @see redactIfSensitive()
     */
    public array $sensitiveKeywords = [];

    /**
     * @var mixed
     */
    private mixed $_blowFishHashCost = null;

    /**
     * @inheritdoc
     */
    public function init(): void
    {
        parent::init();
        $this->_blowFishHashCost = Craft::$app->getConfig()->getGeneral()->blowfishHashCost;
    }

    /**
     * @return int
     */
    public function getMinimumPasswordLength(): int
    {
        return 6;
    }

    /**
     * Hashes a given password with the bcrypt blowfish encryption algorithm.
     *
     * @param string $password The string to hash
     * @param bool $validateHash If you want to validate the just generated hash. Will throw an exception if
     * validation fails.
     * @return string The hash.
     */
    public function hashPassword(string $password, bool $validateHash = false): string
    {
        $hash = $this->generatePasswordHash($password, $this->_blowFishHashCost);

        if ($validateHash && !$this->validatePassword($password, $hash)) {
            throw new InvalidArgumentException('Could not hash the given string.');
        }

        return $hash;
    }

    /**
     * @inheritdoc
     * @param string $data the data to be protected
     * @param string|null $key the secret key to be used for generating hash. Should be a secure
     * cryptographic key.
     * @param bool $rawHash whether the generated hash value is in raw binary format. If false, lowercase
     * hex digits will be generated.
     * @return string the data prefixed with the keyed hash
     * @throws Exception if the validation key could not be written
     * @throws InvalidConfigException when HMAC generation fails.
     * @see validateData()
     * @see generateRandomKey()
     * @see hkdf()
     * @see pbkdf2()
     */
    public function hashData($data, $key = null, $rawHash = false): string
    {
        if ($key === null) {
            $key = Craft::$app->getConfig()->getGeneral()->securityKey;
        }

        return parent::hashData($data, $key, $rawHash);
    }

    /**
     * @inheritdoc
     * @param string $data the data to be validated. The data must be previously
     * generated by [[hashData()]].
     * @param string|null $key the secret key that was previously used to generate the hash for the data in [[hashData()]].
     * function to see the supported hashing algorithms on your system. This must be the same
     * as the value passed to [[hashData()]] when generating the hash for the data.
     * @param bool $rawHash this should take the same value as when you generate the data using [[hashData()]].
     * It indicates whether the hash value in the data is in binary format. If false, it means the hash value consists
     * of lowercase hex digits only.
     * hex digits will be generated.
     * @return string|false the real data with the hash stripped off. False if the data is tampered.
     * @throws Exception if the validation key could not be written
     * @throws InvalidConfigException when HMAC generation fails.
     * @see hashData()
     */
    public function validateData($data, $key = null, $rawHash = false): string|false
    {
        if ($key === null) {
            $key = Craft::$app->getConfig()->getGeneral()->securityKey;
        }

        return parent::validateData($data, $key, $rawHash);
    }

    /**
     * @inheritdoc
     * @param string $data the data to encrypt
     * @param string|null $inputKey the input to use for encryption and authentication
     * @param string $info optional context and application specific information, see [[hkdf()]]
     * @return string the encrypted data
     * @throws InvalidConfigException on OpenSSL not loaded
     * @throws Exception on OpenSSL error
     * @see decryptByKey()
     * @see encryptByPassword()
     */
    public function encryptByKey($data, $inputKey = null, $info = null): string
    {
        if ($inputKey === null) {
            $inputKey = Craft::$app->getConfig()->getGeneral()->securityKey;
        }

        return parent::encryptByKey($data, $inputKey, $info);
    }

    /**
     * @inheritdoc
     * @param string $data the encrypted data to decrypt
     * @param string|null $inputKey the input to use for encryption and authentication
     * @param string $info optional context and application specific information, see [[hkdf()]]
     * @return string|false the decrypted data or false on authentication failure
     * @throws InvalidConfigException on OpenSSL not loaded
     * @throws Exception on OpenSSL error
     * @see encryptByKey()
     */
    public function decryptByKey($data, $inputKey = null, $info = null): string|false
    {
        if ($inputKey === null) {
            $inputKey = Craft::$app->getConfig()->getGeneral()->securityKey;
        }

        return parent::decryptByKey($data, $inputKey, $info);
    }

    /**
     * Returns whether the given key appears to be sensitive.
     *
     * @param string $key
     * @return bool
     * @since 3.7.24
     */
    public function isSensitive(string $key): bool
    {
        return preg_match('/\b(' . implode('|', $this->sensitiveKeywords) . ')\b/', Inflector::camel2words($key, false));
    }

    /**
     * Checks the given key to see if it looks like it contains sensitive info, and if so, redacts the given value.
     *
     * @param string $key
     * @param mixed $value
     * @return mixed The possibly-redacted value
     */
    public function redactIfSensitive(string $key, mixed $value): mixed
    {
        if (is_array($value)) {
            foreach ($value as $n => &$v) {
                $v = $this->redactIfSensitive($n, $v);
            }
        } elseif (is_string($value) && $this->isSensitive($key)) {
            $value = str_repeat('•', strlen($value));
        }

        return $value;
    }
}
