<?php
/**
 * GLOBAL ERROR & EXCEPTION HANDLER
 */

// 1. Set Security Headers
ini_set('display_errors', 0);           // Never show errors to users in production
ini_set('display_startup_errors', 0);
ini_set('log_errors', 1);               // Enable error logging
ini_set('error_log', __DIR__ . '/logs/php_error.log'); // Path to your log file

// 2. The Exception Handler (For 'throw' and Fatal Errors)
set_exception_handler(function ($e) {
    // Log the full technical detail for the developer
    error_log(sprintf(
        "Uncaught %s: %s in %s:%d",
        get_class($e),
        $e->getMessage(),
        $e->getFile(),
        $e->getLine()
    ));

    // Show a user-friendly "Oops" page
    if (!headers_sent()) {
        http_response_code(500);
    }
    
    include 'views/error_500.php'; // A pretty HTML page for users
    exit();
});

// 3. The Error Handler (For Warnings, Notices, and deprecated code)
set_error_handler(function ($level, $message, $file, $line) {
    if (!(error_reporting() & $level)) return false;
    
    // Convert old PHP errors into modern Exceptions
    throw new ErrorException($message, 0, $level, $file, $line);
});
