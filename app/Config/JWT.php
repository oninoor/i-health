<?php

namespace Config;

class JWT
{
  /**
   * The issuer name.
   *
   * @var string
   */
  public $issuer = 'http://example.com';

  /**
   * The audience name.
   *
   * @var string
   */
  public $audience = 'http://example.com';

  /**
   * The subject name.
   *
   * @var string
   */
  public $subject = 'E-Konsul RSD Kalisat';

  /**
   * The time-to-live (TTL) for the token.
   *
   * @var integer
   */
  public $ttl = 86400;

  /**
   * The time-to-live (TTL) for the remember token.
   *
   * @var integer
   */
  public $ttlRemember = 604800;

  /**
   * The algorithm used to sign the token.
   *
   * @var string
   */
  public $algorithm = 'HS256';

  /**
   * The secret key used to sign the token.
   *
   * @var string
   */
  public $key = 'io43ot8HR2Boa2NJbuyNIHUYrTGbvwbV0ODkmavyzjFzo0qnvS';
}
