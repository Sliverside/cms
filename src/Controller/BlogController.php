<?php

namespace App\Controller;

use App\Entity\Blog;
use App\Repository\BlogRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Common\Persistence\ObjectManager;


class BlogController extends AbstractController
{

  /**
   * @var BlogRepository
   */
  private $repository;

  /**
   * @var ObjectManager
   */
  private $em;

  public function __construct(BlogRepository $repository, ObjectManager $em)
  {
    $this->repository = $repository;
    $this->em = $em;
  }

   /**
   * @Route({
   *   "fr": "/",
   *   "en": "/"
   * }, name="blog")
   */
  public function index(): Response
  {
    $articles = $this->repository->findAllPublished();
    // $articles[2]->setTitle('Article 800');

    $this->em->flush();

    return $this->render('blog/index.html.twig', [
      'controller_name' => 'BlogController',
      'blog' => $articles,
    ]);
  }
}
