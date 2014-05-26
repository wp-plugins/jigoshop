<?php

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\Exception\InactiveScopeException;
use Symfony\Component\DependencyInjection\Exception\InvalidArgumentException;
use Symfony\Component\DependencyInjection\Exception\LogicException;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;
use Symfony\Component\DependencyInjection\ParameterBag\FrozenParameterBag;

/**
 * JigoshopContainer
 *
 * This class has been auto-generated
 * by the Symfony Dependency Injection Component.
 */
class JigoshopContainer extends Container
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->services =
        $this->scopedServices =
        $this->scopeStacks = array();

        $this->set('service_container', $this);

        $this->scopes = array();
        $this->scopeChildren = array();
        $this->methodMap = array(
            'jigoshop' => 'getJigoshopService',
            'jigoshop.admin' => 'getJigoshop_AdminService',
            'jigoshop.admin.dashboard' => 'getJigoshop_Admin_DashboardService',
            'jigoshop.admin.product.attributes' => 'getJigoshop_Admin_Product_AttributesService',
            'jigoshop.admin.reports' => 'getJigoshop_Admin_ReportsService',
            'jigoshop.admin.settings' => 'getJigoshop_Admin_SettingsService',
            'jigoshop.admin.system_info' => 'getJigoshop_Admin_SystemInfoService',
            'jigoshop.assets' => 'getJigoshop_AssetsService',
            'jigoshop.cron' => 'getJigoshop_CronService',
            'jigoshop.factory.order_service' => 'getJigoshop_Factory_OrderServiceService',
            'jigoshop.factory.product_service' => 'getJigoshop_Factory_ProductServiceService',
            'jigoshop.messages' => 'getJigoshop_MessagesService',
            'jigoshop.options' => 'getJigoshop_OptionsService',
            'jigoshop.service.order' => 'getJigoshop_Service_OrderService',
            'jigoshop.service.product' => 'getJigoshop_Service_ProductService',
            'wpal' => 'getWpalService',
        );

        $this->aliases = array();
    }

    /**
     * Gets the 'jigoshop' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Jigoshop\Core A Jigoshop\Core instance.
     */
    protected function getJigoshopService()
    {
        return $this->services['jigoshop'] = new \Jigoshop\Core($this->get('wpal'), $this->get('jigoshop.options'), $this->get('jigoshop.messages'), $this->get('jigoshop.admin'));
    }

    /**
     * Gets the 'jigoshop.admin' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @param bool    $lazyLoad whether to try lazy-loading the service with a proxy
     *
     * @return Jigoshop\Admin A Jigoshop\Admin instance.
     */
    protected function getJigoshop_AdminService($lazyLoad = true)
    {
        return $this->services['jigoshop.admin'] = new \Jigoshop\Admin($this->get('wpal'), $this->get('jigoshop.options'), $this->get('jigoshop.admin.dashboard'), $this->get('jigoshop.admin.settings'), $this->get('jigoshop.admin.system_info'), $this->get('jigoshop.admin.reports'), $this->get('jigoshop.admin.product.attributes'));
    }

    /**
     * Gets the 'jigoshop.admin.dashboard' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Jigoshop\Admin\Dashboard A Jigoshop\Admin\Dashboard instance.
     */
    protected function getJigoshop_Admin_DashboardService()
    {
        return $this->services['jigoshop.admin.dashboard'] = new \Jigoshop\Admin\Dashboard($this->get('wpal'), $this->get('jigoshop.options'), $this->get('jigoshop.service.order'), $this->get('jigoshop.service.product'));
    }

    /**
     * Gets the 'jigoshop.admin.product.attributes' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Jigoshop\Admin\Product\Attributes A Jigoshop\Admin\Product\Attributes instance.
     */
    protected function getJigoshop_Admin_Product_AttributesService()
    {
        return $this->services['jigoshop.admin.product.attributes'] = new \Jigoshop\Admin\Product\Attributes();
    }

    /**
     * Gets the 'jigoshop.admin.reports' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Jigoshop\Admin\Reports A Jigoshop\Admin\Reports instance.
     */
    protected function getJigoshop_Admin_ReportsService()
    {
        return $this->services['jigoshop.admin.reports'] = new \Jigoshop\Admin\Reports();
    }

    /**
     * Gets the 'jigoshop.admin.settings' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Jigoshop\Admin\Settings A Jigoshop\Admin\Settings instance.
     */
    protected function getJigoshop_Admin_SettingsService()
    {
        return $this->services['jigoshop.admin.settings'] = new \Jigoshop\Admin\Settings();
    }

    /**
     * Gets the 'jigoshop.admin.system_info' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Jigoshop\Admin\SystemInfo A Jigoshop\Admin\SystemInfo instance.
     */
    protected function getJigoshop_Admin_SystemInfoService()
    {
        return $this->services['jigoshop.admin.system_info'] = new \Jigoshop\Admin\SystemInfo();
    }

    /**
     * Gets the 'jigoshop.assets' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Jigoshop\Core\Assets A Jigoshop\Core\Assets instance.
     */
    protected function getJigoshop_AssetsService()
    {
        return $this->services['jigoshop.assets'] = new \Jigoshop\Core\Assets($this->get('wpal'), $this->get('jigoshop.options'));
    }

    /**
     * Gets the 'jigoshop.cron' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Jigoshop\Core\Cron A Jigoshop\Core\Cron instance.
     */
    protected function getJigoshop_CronService()
    {
        return $this->services['jigoshop.cron'] = new \Jigoshop\Core\Cron($this->get('wpal'), $this->get('jigoshop.options'), $this->get('jigoshop.service.order'));
    }

    /**
     * Gets the 'jigoshop.factory.order_service' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Jigoshop\Factory\OrderService A Jigoshop\Factory\OrderService instance.
     */
    protected function getJigoshop_Factory_OrderServiceService()
    {
        return $this->services['jigoshop.factory.order_service'] = new \Jigoshop\Factory\OrderService($this->get('wpal'), $this->get('jigoshop.options'));
    }

    /**
     * Gets the 'jigoshop.factory.product_service' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Jigoshop\Factory\ProductService A Jigoshop\Factory\ProductService instance.
     */
    protected function getJigoshop_Factory_ProductServiceService()
    {
        return $this->services['jigoshop.factory.product_service'] = new \Jigoshop\Factory\ProductService($this->get('wpal'), $this->get('jigoshop.options'));
    }

    /**
     * Gets the 'jigoshop.messages' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Jigoshop\Core\Messages A Jigoshop\Core\Messages instance.
     */
    protected function getJigoshop_MessagesService()
    {
        return $this->services['jigoshop.messages'] = new \Jigoshop\Core\Messages($this->get('wpal'));
    }

    /**
     * Gets the 'jigoshop.options' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Jigoshop\Core\Options A Jigoshop\Core\Options instance.
     */
    protected function getJigoshop_OptionsService()
    {
        return $this->services['jigoshop.options'] = new \Jigoshop\Core\Options($this->get('wpal'));
    }

    /**
     * Gets the 'jigoshop.service.order' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Jigoshop\Service\Order A Jigoshop\Service\Order instance.
     */
    protected function getJigoshop_Service_OrderService()
    {
        return $this->services['jigoshop.service.order'] = $this->get('jigoshop.factory.order_service')->getService();
    }

    /**
     * Gets the 'jigoshop.service.product' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Jigoshop\Service\Product A Jigoshop\Service\Product instance.
     */
    protected function getJigoshop_Service_ProductService()
    {
        return $this->services['jigoshop.service.product'] = $this->get('jigoshop.factory.product_service')->getService();
    }

    /**
     * Gets the 'wpal' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return WPAL\Wordpress A WPAL\Wordpress instance.
     */
    protected function getWpalService()
    {
        return $this->services['wpal'] = new \WPAL\Wordpress();
    }
}
