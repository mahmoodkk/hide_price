<?php

namespace GinnieWorks\HidePrice\Plugin;

class HidePriceBox
{
    protected $_customerSession;

    public function __construct(
        \Magento\Customer\Model\Session $session
    ) {
        $this->_customerSession = $session;
    }

    function afterToHtml(\Magento\Catalog\Pricing\Render\FinalPriceBox $subject, $result)
    {
        if ($this->_customerSession->isLoggedIn()) {
            return $result;
        } else {
            $html = '<div class="price-box">
                 <span class="price">Price is not visible for guest users</span>
            </div>';
        return $html;
        }
    }
}