# model-uid-addon

![model-uid-addon](art/logo.png)

[![Latest Stable Version](https://img.shields.io/packagist/v/friendsofhyperf/model-uid-addon)](https://packagist.org/packages/friendsofhyperf/model-uid-addon)
[![Total Downloads](https://img.shields.io/packagist/dt/friendsofhyperf/model-uid-addon)](https://packagist.org/packages/friendsofhyperf/model-uid-addon)
[![License](https://img.shields.io/packagist/l/friendsofhyperf/model-uid-addon)](https://github.com/friendsofhyperf/model-uid-addon)

The ULID/UUID addon for Hyperf Model.

> This feature has been migrated to `hyperf/database`, if you are using `hyperf/database > 3.0.9`, You don't need to install this extension.

## Installation

- Request

```bash
composer require friendsofhyperf/model-uid-addon
# ulid
composer require symfony/uid
# uuid
composer require ramsey/uuid:^4.7
```

## Usage

```php
<?php

namespace App\Model;

use Hyperf\Database\Model\Concerns\HasUlids;

class Article extends Model
{
    use HasUlids;

    // ...
}
```

## Sponsor

If you like this project, Buy me a cup of coffee. [ [Alipay](https://hdj.me/images/alipay.jpg) | [WePay](https://hdj.me/images/wechat-pay.jpg) ]
