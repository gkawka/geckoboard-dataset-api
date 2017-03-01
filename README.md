Geckoboard DataSet API
----------------------

Library provides client for Geckoboard DataSet API by REST requests

[![SensioLabsInsight](https://insight.sensiolabs.com/projects/bdaace9a-a9e6-4667-a892-092db9d14663/mini.png)](https://insight.sensiolabs.com/projects/bdaace9a-a9e6-4667-a892-092db9d14663) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/gkawka/geckoboard-dataset-api/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/gkawka/geckoboard-dataset-api/?branch=master) [![Code Coverage](https://scrutinizer-ci.com/g/gkawka/geckoboard-dataset-api/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/gkawka/geckoboard-dataset-api/?branch=master)

How to use
---

### DataSet definition + data row

Create DataSet definition:

```php

<?php

namespace Preview;

use Kwk\Geckoboard\Dataset\DatasetBuilder;
use Kwk\Geckoboard\Dataset\DataSetInterface;
use Kwk\Geckoboard\Dataset\Type\DateType;
use Kwk\Geckoboard\Dataset\Type\NumberType;

class TestDataset implements DataSetInterface
{
    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return 'test';
    }

    /**
     * {@inheritDoc}
     */
    public function getDefinition()
    {
        return (new DatasetBuilder())
            ->addField('date_field_id', new DateType('Date'))
            ->addField('number_field_id', new NumberType('Number'))
            ->build();
    }
}
```

Create implementation of DataRowInterface:

```php
<?php

namespace Preview;

use Kwk\Geckoboard\Dataset\DataSetRowInterface;

class TestDatarow implements DataSetRowInterface
{
    /**
     * {@inheritDoc}
     */
    public function getData()
    {
        return [
            'date_field_id' => '2016-12-31',
            'number_field_id' => '1021',
        ];
    }
}

```

Client usage
---

Create client:

```php

$httpClient = new \GuzzleHttp\Client(['base_uri' => 'https://api.geckoboard.com']);
$client = new \Kwk\Geckoboard\Dataset\Client($httpClient, 'YOUR_API_KEY');

```

Create DataSet at Geckoboard:
```php
$client->create(new \Preview\TestDataset());
```

Append row:

With class:
```php
<?php

namespace Preview\Dataset;

use Kwk\Geckoboard\Dataset\DataSetRowInterface;

class TestDatarow implements DataSetRowInterface
{
    /**
     * {@inheritDoc}
     */
    public function getData()
    {
        return [
            'param1' => 'val1',
            'param2' => 'val2',
        ];
    }
}
```

Appending is just one liner:

```php
$client->append(new \Preview\TestDatarow());
```
