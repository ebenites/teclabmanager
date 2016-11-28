<?php
class Flash {

    const FLASH_ALERT_SUCCESS = 'alert-success';
    const FLASH_ALERT_INFO = 'alert-info';
    const FLASH_ALERT_WARNING = 'alert-warning';
    const FLASH_ALERT_DANGER = 'alert-danger';

    public static function success($message){
        if (!isset($_SESSION)) session_start();
        $_SESSION[Flash::FLASH_ALERT_SUCCESS] = $message;
    }
    
    public static function info($message){
        if (!isset($_SESSION)) session_start();
        $_SESSION[Flash::FLASH_ALERT_INFO] = $message;
    }
    
    public static function warning($message){
        if (!isset($_SESSION)) session_start();
        $_SESSION[Flash::FLASH_ALERT_WARNING] = $message;
    }
    
    public static function error($message){
        if (!isset($_SESSION)) session_start();
        $_SESSION[Flash::FLASH_ALERT_DANGER] = $message;
    }

    public static function show(){
        if (!isset($_SESSION)) session_start();
        
        if (isset($_SESSION[Flash::FLASH_ALERT_SUCCESS])) {
            echo '<div class="alert '.Flash::FLASH_ALERT_SUCCESS.'">'.$_SESSION[Flash::FLASH_ALERT_SUCCESS].'</div>';
            unset($_SESSION[Flash::FLASH_ALERT_SUCCESS]);
        }
    }

}
