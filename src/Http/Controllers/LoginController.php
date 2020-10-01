<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Slim\Views\Twig as Views;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Factory\AppFactory;

class LoginController{

    protected $views;

    public function __construct(Views $views)
    {
        return $this->view = $views;
    }
    
    public function display($request, $response)
    {
        return $this->view->render($response, 'login.twig');
    }

    public function connect($request, $response, $emailInput){
        $key1 = sha1('surpriseDeMatthieu');
        $key2 = sha1('keyOfWalson');
        $passwordHached = $key1 . sha1('test') . $key2;

        //$req = $connection->prepare('SELECT password FROM ADMINISTRATEUR');
        //$req->execute();
        /*
        $email_connect = htmlspecialchars($_POST['email_connect']);
        $password_connect = sha1($_POST['password_connect']);
     if (!empty($email_connect) and !empty($password_connect)) {
       $prep_user = "SELECT * FROM user WHERE email = ? AND password = ?";
       $requser = $bdd -> prepare($prep_user);
       $requser -> execute(array($email_connect,$password_connect));
       $user_exist = $requser -> rowCount();
       if ($user_exist==1) {
         $user_info = $requser -> fetch();
         $_SESSION['user_id'] = $user_info['user_id'];
         $_SESSION['email'] = $user_info['email'];
         $_SESSION['statut'] = $user_info['statut'];
         $_SESSION['type'] = $user_info['type'];
         include 'header_location_profil.php';
       }
        */

        if (!empty($_POST)) {
            // Recup datas from $_POST and crypt mdp
            $emailInput = $_POST['emailInput'];
            $mdpInput = $key1 . sha1($_POST['passwordInput']) . $key2;
            /*
            // Prepare req of bdd
            $prep_user = "SELECT * FROM ADMINISTRATEUR WHERE mail = ? AND password = ?";
            $requser = $bdd->prepare($prep_user);
            $requser->execute(array($emailInput, $mdpInput));
            
            //vérifie si l'user existe 
            $user_exist = $requser->rowCount();
            if ($user_exist == 1){
                $message = 'Bienvenue ad@t.fr ! mdp: test | ';
            }
            else{
                $message = 'Mot de Passe ou email Incorrect !';
            }
            */
            // Le login est-il rempli ?
            if (empty($_POST['emailInput'])) {
                $message = 'Veuillez indiquer votre login svp !';
            }
            // Le mot de passe est-il rempli ?
            elseif (empty($_POST['passwordInput'])) {
                $message = 'Veuillez indiquer votre mot de passe svp !';
            }
            
            // Le login est-il correct ?
            elseif ($emailInput !== 'ad@t.fr') {
                $message = 'Votre login est faux !';
            }
            // Le mot de passe est-il correct ?
            elseif ($mdpInput  !== $key1 . sha1('test') . $key2) { // $key1 . sha1('test') . $key2
                $message = 'Votre mot de passe est faux !';
            } else {
                // L'identification a réussi
                $message = 'Bienvenue ad@t.fr ! mdp: test | ';
                // Redirection vers Produits
                
            }
            $response->getbody()->write($message);
            
        }
        return $response;


    }



    public static function welcome(Request $request, Response $response){
        $response->getbody()->write('Login Controller Work !! yaaaaassss');
        return $response;
    }
    

    
}
