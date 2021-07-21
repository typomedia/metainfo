# Meta Information Library

Library providing basic xmp meta information.

The Library is [PSR-1](https://www.php-fig.org/psr/psr-1/), [PSR-4](https://www.php-fig.org/psr/psr-4/), [PSR-12](https://www.php-fig.org/psr/psr-12/) compliant.

## Requirements

- `>= PHP 7.2`

## Dependencies

- `none`

## Install

```
composer require typomedia/metainfo
```

## Usage

```php
use Typomedia\Metainfo\Metainfo;

$this->metainfo = new Metainfo('example.pdf');

print $this->metainfo->title;
print $this->metainfo->author;
print $this->metainfo->description;
print $this->metainfo->format;
print $this->metainfo->date;
```

## Introduction
- https://experienceleague.adobe.com/docs/experience-manager-64/assets/administer/xmp.html

## Specifications
- https://www.dublincore.org/schemas/xmls/
- https://www.dublincore.org/specifications/dublin-core/dces/
- https://dublincore.org/schemas/xmls/simpledc20021212.xsd
- https://github.com/adobe/xmp-docs/blob/master/Specifications.md