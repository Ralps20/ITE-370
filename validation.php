<?php

class Validator {
    /**
     * Validates an Email address
     */
    public static function email($email) {
        $email = trim($email);
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return $email;
        }
        return false;
    }

    /**
     * Validates alphanumeric strings (usernames)
     * Allows letters, numbers, and underscores; 3-20 characters.
     */
    public static function username($username) {
        $username = trim($username);
        if (preg_match('/^[a-zA-Z0-9_]{3,20}$/', $username)) {
            return $username;
        }
        return false;
    }

    /**
     * Enforces password strength
     * Min 8 chars, at least one letter and one number.
     */
    public static function password_strength($password) {
        if (strlen($password) < 8) return false;
        if (!preg_match('/[A-Za-z]/', $password) || !preg_match('/[0-9]/', $password)) {
            return false;
        }
        return true;
    }
}
