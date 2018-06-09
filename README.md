Gas Requester 
==============
Widget that can added to Inquid ERP to ask for gas service in Mexico, currently only working with Gas Noel provider, *** Not Oficial Supported by the Provider (yet) ***

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist inquid/yii2-gas "*"
```

or add

```
"inquid/yii2-gas": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
<?= \inquid\gas\AutoloadExample::widget(); ?>```