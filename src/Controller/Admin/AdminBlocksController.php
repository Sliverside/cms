<?php

namespace App\Controller\Admin;

use App\Entity\Block\Block;
use App\Entity\Block\BlockField;
use App\Form\Block\BlockType;
use App\Form\Block\BlockFieldType;
use App\Repository\Block\BlockRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Block\BlockTranslation;
use App\Entity\Block\BlockFieldTranslation;


class AdminBlocksController extends AbstractController
{

  /**
   * @var BlocksRepository
   */
  private $repository;

  /**
   * @var ObjectManager
   */
  private $em;

  public function __construct(BlockRepository $repository, ObjectManager $em)
  {
    $this->repository = $repository;
    $this->em = $em;
  }

  /**
  * @Route("/admin/blocks", name="admin.blocks.index")
  */
  public function index(): Response
  {
    $blocks = $this->repository->findAll();

    $this->em->flush();

    return $this->render('blocks/index.html.twig', [
      'blocks' => $blocks,
    ]);
  }

  /**
   * @Route("/admin/blocks/{id}/edit", name="admin.blocks.edit")
   */
  public function edit(): Response
  {

    $this->em->flush();

    return $this->render('blocks/edit.html.twig');
  }

  /**
   * @Route("/admin/blocks/add", name="admin.blocks.add")
   */
  public function add(Request $request): Response
  {
    $block = new Block();

    $blockTranslation = new BlockTranslation();
    $blockTranslation->setLang('fr');
    $this->em->persist($blockTranslation);

    $blockField = new BlockField();

    $blockFieldTranslation = new BlockFieldTranslation();
    $blockFieldTranslation->setLang('fr');
    $blockField->addBlockFieldTranslation($blockFieldTranslation);
    $this->em->persist($blockFieldTranslation);
    $this->em->persist($blockField);
    
    $block->addBlockTranslation($blockTranslation);
    $block->addBlockField($blockField);
    
    $this->em->persist($block);

    $form = $this->createForm(BlockType::class, $block);
    
    $form->handleRequest($request);

    if($form->isSubmitted() && $form->isValid()) {
      $this->em->persist($block);
      foreach( $block->getBlockFields() as $field) {
        $this->em->persist($field);
      };
      $this->em->flush();
    }

    return $this->render('admin/blocks/add.html.twig', [
      'form' => $form->createView(),
    ]);
  }
}
