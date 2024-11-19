<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends AbstractController
{
    public function index(): Response
    {
        return $this->render('default.html.twig', [
            'entreprise' => [
                'image_url' => '/img/nicomak-logo-MD.png',
                'title' => 'Bienvenue sur l\'application de nicomak',
                'description1' => 'Chez Nicomak, nous accordons une grande importance à la reconnaissance et à la gratitude entre collègues. Nous sommes convaincus qu’un simple “merci” peut faire toute la différence et contribuer à créer un environnement de travail positif, motivant et collaboratif. Dans cette optique, nous souhaitons mettre en place une solution innovante pour faciliter ces échanges de remerciements.',
                'description2' => 'Moi Corentin Foucher, j’ai donc pour mission de concevoir et développer une application web conviviale permettant aux salariés de Nicomak de se remercier entre eux. L’objectif est de donner à chacun la possibilité d’exprimer sa reconnaissance de manière simple et directe, qu’il s’agisse d’une petite aide du quotidien ou d’un geste plus important.
Ce projet a également pour vocation de tester mes compétences en programmation, notamment en Symfony, afin de déterminer si mon profil pourrait s’intégrer à l’équipe Nicomak. cette mission est une belle opportunité de démontrer ma maîtrise technique et ma créativité en matière de développement web.',
            ],
        ]);
    }
}
