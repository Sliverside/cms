<?php

namespace App\Controller;

use App\Entity\Blocks;
use App\Repository\BlocksRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Common\Persistence\ObjectManager;


class BlocksController extends AbstractController
{

  /**
   * @var BlocksRepository
   */
  private $repository;

  /**
   * @var ObjectManager
   */
  private $em;

  public function __construct(BlocksRepository $repository, ObjectManager $em)
  {
    $this->repository = $repository;
    $this->em = $em;
  }

   /**
   * @Route("/blocks", name="blocks.index")
   */
  public function index(): Response
  {
    $blocks = $this->repository->findAll();

    $this->em->flush();

    return $this->render('blocks/index.html.twig', [
      'blocks' => $blocks,
    ]);
  }
}
