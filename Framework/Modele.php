<?php
require_once 'Configuration.php';

abstract class Modele {
 private static $bdd;
 /**
 * Exécute une requête SQL
 *
 * @param string $sql Requête SQL
 * @param array $params Paramètres de la requête
 * @return PDOStatement Résultats de la requête
 */
 protected function executerRequete($sql, $params = null) {
 if ($params == null) {
 $resultat = self::getBdd()->query($sql);
 }
 else {
 $resultat = self::getBdd()->prepare($sql); 
 $resultat->execute($params);
 }
 return $resultat;
 }
 /**
 * Renvoie un objet de connexion à la BDD en initialisant la connexion au besoin
 *
 * @return PDO Objet PDO de connexion à la BDD
 */
 private static function getBdd() {
 if (self::$bdd === null) {
 // Récupération des paramètres de configuration BD
 $dsn = Configuration::get("dsn");
 $login = Configuration::get("login");
 $mdp = Configuration::get("mdp");
 // Création de la connexion
 self::$bdd = new PDO($dsn, $login, $mdp,
 array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
 }
 return self::$bdd;
 }
}
