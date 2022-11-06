<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Character;
use App\Entity\User;
use App\Entity\Video;
use App\Entity\WorldRecordSolo;
use App\Repository\CategoryRepository;
use App\Repository\VideoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Tag;

class TDHomeController extends AbstractController
{

    #[Route('/', name: 'home')]
    public function index(UserPasswordHasherInterface $passwordHasher, VideoRepository $videoRepository): Response
    {
        $dernièreVideo = $videoRepository->findOneBy(array(), array('id' => 'desc'),1);


        return $this->render('td_home/index.html.twig',[
            "video" => $dernièreVideo,
        ]);

        /*return $this->render('td_home/index.html.twig', [
            'controller_name' => 'TDHomeController',
        ]);*/
    }



    #[Route('/world_record', name: 'world_record')]
    public function worldRecord(): Response
    {
        $repo = $this->getDoctrine()->getRepository(WorldRecordSolo::class);
        $worldRecord = $repo->findAll();



        return $this->render('td_home/worldRecord.html.twig', [
            'worldRecord' => $worldRecord,

        ]);
    }

    #[Route('/news', name: 'news')]
    public function news(): Response
    {
        $repo = $this->getDoctrine()->getRepository(Video::class);
        $repoCat = $this->getDoctrine()->getRepository(Category::class);

        $category = $repoCat->findBy(
            ['name' => 'News']
        );

        $videos = $repo->findBy(
            ['category' => $category],
        );

        return $this->render('td_home/funVideo.html.twig', [
            'videos' => $videos,
        ]);
        return $this->render('td_home/news.html.twig',[
            'video' => $videos
        ]);
    }

    #[Route('/wiki', name: 'wiki')]
    public function wiki(): Response
    {
        $repo = $this->getDoctrine()->getRepository(Character::class);
        $caracter = $repo->findAll();

        return $this->render('td_home/wiki.html.twig', [
            'caracters' => $caracter
        ]);
    }

    #[Route('/fun-video', name: 'fun_video')]
    public function funVideo(): Response
    {
        $repo = $this->getDoctrine()->getRepository(Video::class);
        $repoCat = $this->getDoctrine()->getRepository(Category::class);

        $category = $repoCat->findBy(
            ['name' => 'Fun video']
        );

        $videos = $repo->findBy(
            ['category' => $category],
        );

        return $this->render('td_home/funVideo.html.twig', [
            'videos' => $videos,
        ]);
    }

    #[Route('/tags', name: 'tags')]
    public function tags(): Response
    {

        $repo = $this->getDoctrine()->getRepository(Tag::class);
        $tag = $repo->findAll();
        return $this->render('td_home/tags.html.twig',[
            'tags' => $tag,

        ]);
    }

    #[Route('/admin', name: 'admin')]
    public function admin(): Response
    {
        return $this->render('td_admin/index.html.twig', [
            'controller_name' => 'TDAdminController',
        ]);
    }
}
