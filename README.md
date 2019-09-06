# magento2-account-approval
###### What is this extension about?
Free magento 2 extension to add new custom fields for customer example: avatar, facebook link, twitter link,  ...


###### Install Extension
```
composer require landofcoder/module-custom-customer-info
php bin/magento module:enable Lof_CustomCustomerInfo
php bin/magento setup:upgrade
php bin/magento setup:static-content:deploy -f
php bin/magento cache:clean
```

###### Enable extension
Enable extension by navigation to ```Stores => Configuration => Landofcoder => Custom Customer Info```
