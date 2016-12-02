<?php

final class Index {

    const DEFAULT_PAGE = 'home';
    const DEFAULT_MODULE = 'home';
    const PAGE_DIR = '../page/';
    const LAYOUT_DIR = '../layout/';

    private $module;

    /**
     * System config.
     */
    public function init() {
        // error reporting - all errors for development (ensure you have display_errors = On in your php.ini file)
        error_reporting(E_ALL | E_STRICT);
        mb_internal_encoding('UTF-8');
        set_exception_handler(array($this, 'handleException'));
        spl_autoload_register(array($this, 'loadClass'));
        // session
        session_start();
    }

    /**
     * Run the application!
     */
    public function run() {
        $this->runPage($this->getPage());
    }

    /**
     * Exception handler.
     */
    public function handleException(Exception $ex) {
        $extra = array('message' => $ex->getMessage());
        if ($ex instanceof NotFoundException) {
            header('HTTP/1.0 404 Not Found');
            $this->runErrorPage('404', $extra);
        } else {
            // log exception
            header('HTTP/1.1 500 Internal Server Error');
            $this->runErrorPage('404', $extra);
        }
    }

    /**
     * Class loader.
     */
    public function loadClass($name) {
        $classes = array(
            'Config' => '../config/Config.php',
            'Error' => '../validation/Error.php',
            'Flash' => '../flash/Flash.php',
            'NotFoundException' => '../exception/NotFoundException.php',
            'ActivityDao' => '../dao/ActivityDao.php',
            'BookingDao' => '../dao/BookingDao.php',
            'UserDao' => '../dao/UserDao.php',
            'ActivityMapper' => '../mapping/ActivityMapper.php',
            'UserMapper' => '../mapping/UserMapper.php',
            'BookingMapper' => '../mapping/BookingMapper.php',
            'Activity' => '../model/Activity.php',
            'User' => '../model/User.php',
            'Booking' => '../model/Booking.php',
            'Activity' => '../model/Activity.php',
            'ActivityValidator' => '../validation/ActivityValidator.php',
            'BookingValidator' => '../validation/BookingValidator.php',
            'UserValidator' => '../validation/UserValidator.php',
            'Utils' => '../util/Utils.php',
            'HeadTemplate' => '../layout/HeadTemplate.php'
        );
        if (!array_key_exists($name, $classes)) {
            die('Class "' . $name . '" not found.');
        }
        require_once $classes[$name];
    }

    private function getPage() {
        $page = self::DEFAULT_PAGE;
        $this->module = self::DEFAULT_MODULE;
        if (array_key_exists('page', $_GET)) {
            $page = $_GET['page'];
        }
        if (array_key_exists('module', $_GET)) {
            $this->module = $_GET['module'];
        }
        return $this->checkPage($page);
    }

    private function checkPage($page) {
        if (!preg_match('/^[a-z0-9-]+$/i', $page)) {
            // log attempt, redirect attacker, ...
            throw new NotFoundException('Unsafe page "' . $page . '" requested');
        }
        if (!$this->hasScript($page) && !$this->hasTemplate($page)) {
            // log attempt, redirect attacker, ...
            throw new NotFoundException('Page "' . $page . '" not found');
        }
        return $page;
    }

    private function runErrorPage($page, array $extra = array()) {
        $run = true;
        require self::PAGE_DIR . $page . '-ctrl.php';
        $template = self::PAGE_DIR . $page . '-view.php';
        $flashes = null;
        require self::LAYOUT_DIR . 'index.phtml';
    }

    private function runPage($page, array $extra = array()) {
        $run = false;
        if ($this->hasScript($page)) {
            $run = true;
            require $this->getScript($page);
        }
        if ($this->hasTemplate($page)) {
            $run = true;
            // data for main template
            $template = $this->getTemplate($page);
            $flashes = null;
            if (Flash::hasFlashes()) {
                $flashes = Flash::getFlashes();
            }

            // main template (layout)
            require self::LAYOUT_DIR . 'index.phtml';
        }
        if (!$run) {
            die('Page "' . $page . '" has neither script nor template!');
        }
    }

    private function getScript($page) {
        return self::PAGE_DIR . $this->module . '/' . $page . '-ctrl.php';
    }

    private function getTemplate($page) {
        return self::PAGE_DIR . $this->module . '/' . $page . '-view.php';
    }

    private function hasScript($page) {
        return file_exists($this->getScript($page));
    }

    private function hasTemplate($page) {
        return file_exists($this->getTemplate($page));
    }

}

$index = new Index();
$index->init();
// run application!
$index->run();
