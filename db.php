<?php
try {
    $db = new PDO('mysql:host=localhost;dbname=blog', 'dsk', 'w@nyloo');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
