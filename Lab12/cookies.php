<?php

// Function to generate a random value for the cookie
function generateCookieValue() {
    return md5(uniqid(mt_rand(), true));
}

// Cookie name
$cookieName = 'cs4413';

// Check if the cookie is already set
if (isset($_COOKIE[$cookieName])) {
    // If set, inform the user
    echo "The cookie '$cookieName' is already set with the value: " . $_COOKIE[$cookieName];
} else {
    // If not set, create a new value for the cookie
    $cookieValue = generateCookieValue();

    setcookie($cookieName, $cookieValue, time() + 120, "/");
    
    echo "The cookie '$cookieName' has been set with the value: $cookieValue";
}