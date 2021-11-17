<?php
declare(strict_types=1);



class Session {
    public static function init() {
        
        if(session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
    }
    
    public static function isConnected(): bool {
        return !empty($_SESSION['user']['nickname']) ? true : false;
    }

    public static function getUserRole(): string {
        return self::isConnected() ? $_SESSION['user']['role'] : 'Role unknown';
    }
    
    public static function getUserConnected(): string{
        return self::isConnected() ? $_SESSION['user']['nickname'] : 'Name unknown';
    }

    public static function getNotifications(): ?string {
        
        if (self::isConnected()
            && array_key_exists('info', $_SESSION)
            && !empty($_SESSION['info'])) {
            return $_SESSION['info'];
        } else {
            return null;
        }

    }

    public static function getErrors(): ?array {
        return self::isConnected() && $_SESSION['errors'] ? $_SESSION['errors'] : null;
    }

}