<?php

$pdo = new PDO('mysql:host=45.15.23.59','root', 'Sco@l@it123','national-04-adina-property');
$stmt = $pdo ->prepare('SELECT * FROM products WHERE id= :id'); // : id  este un placeholder

$id = 20;
$stmt ->bindParam(':id', $id);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);