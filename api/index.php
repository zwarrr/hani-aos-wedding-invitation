<?php

// Vercel serverless entry point for Laravel

// Fix REQUEST_URI for Laravel routing
$_SERVER['REQUEST_URI'] = $_SERVER['REQUEST_URI'] ?? '/';
$_SERVER['SCRIPT_NAME'] = '/index.php';

// Forward to Laravel's public/index.php
require __DIR__ . '/../public/index.php';
