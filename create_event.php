<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/Config/Mongo.php'; 
require_once __DIR__ . '/Repository/DbMongo.php';

use App\Repository\DbMongo;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__); 
$dotenv->load();

$dbMongo = new DbMongo();

// Définir les données de l'événement
$event = [
    'title' => 'Memory en Duo',
    'date' => '2024-12-28T14:00:00',
    'description' => 'Bientot Disponible:Rejoignez-nous pour une expérience ludique et stimulante avec notre nouveau jeu Memory en Duo !'
];

try {
    // Insérer l'événement dans la collection 'events'
    $eventId = $dbMongo->create('memory', $event);
    echo "Événement inséré avec succès avec l'ID : " . $eventId;
} catch (\Exception $e) {
    die("Erreur lors de l'insertion de l'événement : " . $e->getMessage());
}
