<?php

namespace App\Libraries;

use Firebase\JWT\JWT as FirebaseJWT;
use Config\JWT as JWTConfig;
use Firebase\JWT\Key;

class JWT
{
  /**
   * The JWT config.
   *
   * @var JWTConfig
   */
  protected $config;

  /**
   * Constructor.
   *
   * @param JWTConfig $config
   */
  public function __construct(JWTConfig $config)
  {
    $this->config = $config;
  }

  /**
   * Create a new JWT.
   *
   * @param mixed $data The data to encode into the JWT.
   *
   * @return string
   */
  public function create($data, $remember)
  {
    $payload = [
      'iss' => $this->config->issuer,
      'sub' => $this->config->subject,
      'iat' => time(),
      'exp' => $remember ? time() + $this->config->ttlRemember : time() + $this->config->ttl,
      'data' => $data,
    ];

    return FirebaseJWT::encode($payload, $this->config->key, $this->config->algorithm);
  }

  /**
   * Verify a JWT and return the decoded data.
   *
   * @param string $token The JWT to verify.
   *
   * @return mixed
   * @throws \Exception if the JWT is invalid or has expired.
   */
  public function verify($token)
  {
    try {
      $decoded = FirebaseJWT::decode($token, new Key($this->config->key, 'HS256'));
      return $decoded->data;
    } catch (\Exception $e) {
      throw new \Exception('Invalid token: ' . $e->getMessage());
    }
  }
}
