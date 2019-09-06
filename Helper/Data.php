<?php
/**
 * Copyright (c) 2019  Landofcoder
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 */

namespace Lof\CustomCustomerInfo\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;
use Magento\Framework\App\Helper\Context;

class Data extends AbstractHelper
{

    /**
     * @param \Magento\Framework\App\Helper\Context $context
     */
    
    protected $scopeConfig;
    const XML_PATH_TAG = 'lofcustomcustomerinfo/';
    /**
     * @param \Magento\Framework\App\Helper\Context $context
     */
    public function __construct(
        \Magento\Framework\App\Helper\Context $context
    ) {
        parent::__construct($context);
    }

    /**
     * @return bool
     */
    public function isEnabled()
    {
        if($this->getGeneralConfig("enabled")){
            return true;
        }
        return false;
    }
    /**
     * @return bool
     */
    public function isEnabledOnRegister()
    {
        if($this->getGeneralConfig("enabled_customer_register_page")){
            return true;
        }
        return false;
    }
    /**
     * @return bool
     */
    public function isEnabledOnEditCustomer()
    {
        if($this->getGeneralConfig("enabled_edit_page")){
            return true;
        }
        return false;
    }
    /**
     * @return bool
     */
    public function getConfigValue($field, $storeId = null)
	{
		return $this->scopeConfig->getValue(
			$field, ScopeInterface::SCOPE_STORE, $storeId
		);
    }
	public function getGeneralConfig($code, $storeId = null)
	{
		return $this->getConfigValue(self::XML_PATH_TAG .'general/'. $code, $storeId);
    }
    public function getFieldConfig($code, $storeId = null)
	{
		return $this->getConfigValue(self::XML_PATH_TAG .'custom_fields/'. $code, $storeId);
	}
}
