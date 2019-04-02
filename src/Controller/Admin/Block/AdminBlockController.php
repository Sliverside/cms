<?php

namespace App\Controller\Admin\Block;

use App\Entity\Block\Block;
use App\Form\Block\BlockType;
use App\Repository\Block\BlockRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Block\BlockTranslation;

/**
 * @Route("/admin/block")
 */
class AdminBlockController extends AbstractController
{
    /**
     * @Route("/", name="block.index", methods={"GET"})
     */
    public function index(BlockRepository $blockRepository): Response
    {
        return $this->render('block/block/index.html.twig', [
            'blocks' => $blockRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="block.new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $block = new Block();
        $form = $this->createForm(BlockType::class, $block);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            dump($block);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($block);
            $entityManager->flush();

            return $this->redirectToRoute('block.index');
        }

        return $this->render('block/block/new.html.twig', [
            'block' => $block,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="block.show", methods={"GET"})
     */
    public function show(Block $block): Response
    {
        return $this->render('block/block/show.html.twig', [
            'block' => $block,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="block.edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Block $block): Response
    {
        $form = $this->createForm(BlockType::class, $block);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('block.index', [
                'id' => $block->getId(),
            ]);
        }

        return $this->render('block/block/edit.html.twig', [
            'block' => $block,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="block.delete", methods={"DELETE"})
     */
    public function delete(Request $request, Block $block): Response
    {
        if ($this->isCsrfTokenValid('delete'.$block->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($block);
            $entityManager->flush();
        }

        return $this->redirectToRoute('block.index');
    }
}
