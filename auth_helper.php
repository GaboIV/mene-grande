<?php
// Helper para autenticación con cookies encriptadas
class AuthHelper {
    private static $secret_key = 'mene_grande_secret_key_2024';
    private static $cookie_name = 'mene_auth';
    private static $expiry_hours = 24;
    
    // Encriptar datos
    public static function encrypt($data) {
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('AES-256-CBC'));
        $encrypted = openssl_encrypt(json_encode($data), 'AES-256-CBC', self::$secret_key, 0, $iv);
        return base64_encode($iv . $encrypted);
    }
    
    // Desencriptar datos
    public static function decrypt($encrypted_data) {
        $data = base64_decode($encrypted_data);
        $iv_length = openssl_cipher_iv_length('AES-256-CBC');
        $iv = substr($data, 0, $iv_length);
        $encrypted = substr($data, $iv_length);
        $decrypted = openssl_decrypt($encrypted, 'AES-256-CBC', self::$secret_key, 0, $iv);
        return json_decode($decrypted, true);
    }
    
    // Establecer autenticación
    public static function setAuth($user_data) {
        $auth_data = [
            'usuario' => $user_data['propietario'],
            'id_inmueble' => $user_data['id_inmueble'],
            'rol' => $user_data['id_rol'],
            'expires' => time() + (self::$expiry_hours * 3600)
        ];
        
        $encrypted = self::encrypt($auth_data);
        setcookie(self::$cookie_name, $encrypted, time() + (self::$expiry_hours * 3600), '/', '', false, true);
        
        return $auth_data;
    }
    
    // Obtener datos de autenticación
    public static function getAuth() {
        if (!isset($_COOKIE[self::$cookie_name])) {
            return null;
        }
        
        try {
            $auth_data = self::decrypt($_COOKIE[self::$cookie_name]);
            
            // Verificar si expiró
            if ($auth_data['expires'] < time()) {
                self::logout();
                return null;
            }
            
            return $auth_data;
        } catch (Exception $e) {
            self::logout();
            return null;
        }
    }
    
    // Verificar si está autenticado
    public static function isAuthenticated() {
        return self::getAuth() !== null;
    }
    
    // Cerrar sesión
    public static function logout() {
        setcookie(self::$cookie_name, '', time() - 3600, '/');
    }
    
    // Obtener usuario actual
    public static function getCurrentUser() {
        $auth = self::getAuth();
        return $auth ? $auth['usuario'] : null;
    }
    
    // Obtener ID de inmueble actual
    public static function getCurrentInmuebleId() {
        $auth = self::getAuth();
        return $auth ? $auth['id_inmueble'] : null;
    }
    
    // Verificar si es administrador
    public static function isAdmin() {
        $auth = self::getAuth();
        return $auth && $auth['rol'] == '99';
    }
    
    // Verificar si es propietario
    public static function isPropietario() {
        $auth = self::getAuth();
        return $auth && $auth['rol'] == '1';
    }
}
?>