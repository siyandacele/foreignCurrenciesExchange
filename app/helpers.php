<?php

// Database input sanitizer
function sanitize($dirty) {
    return htmlentities($dirty, ENT_QUOTES, "UTF-8");
}