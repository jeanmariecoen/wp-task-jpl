<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'wp-task-jpl' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'wp-task-jpl' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', 'wp-task-jpl' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'P](c yM5MCPU<pS>d^3Xd GXYL13rN>gEt^8x_94mWyVKB`y!r`K(@q 3D]zJ389' );
define( 'SECURE_AUTH_KEY',  '0fP{s^dBh{_ aJn]F*e/x)[PJ3W?reB.i1cQ6K$yNI2kcw?N+)}==BsF7z!+5b[2' );
define( 'LOGGED_IN_KEY',    'mXaUewO8=DsDFD>*i0/veh7--60}KeW53|7][xFc(z<j&/z&e6 aR2`U8-J{IpdX' );
define( 'NONCE_KEY',        'n$vm[#u~.d?n?3YR,Bph03iWDl;LFxJ$w-TJ/_x96/Si?&D([u)y9hKG.W6`>dvY' );
define( 'AUTH_SALT',        '{U)<PA&)vCa-HsRv]X;5+5SVh-(h)[^dnR(seI:x*0ptYMz-?zD8n)~A,*9=ILw$' );
define( 'SECURE_AUTH_SALT', '|{iRvF}p[3Ow]+*<<meu`mq:8=V|0RGh;Q;c]+9F(%4Fr<6>Fl/pu9)emW1;JbVU' );
define( 'LOGGED_IN_SALT',   'j*TD|_Fr[k9l$+gE&Q1vvx^xA24`<FA4s^;8zX?x5yP.g_cGViCYb89 ,p 41Rgn' );
define( 'NONCE_SALT',       'Z`#(5UmcE/%VHK&=Ngk9>Ajf~V)vG.&x@.N&bk8e<f&aDNSOL2l4+a(k-jZ(Q0Q;' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');
