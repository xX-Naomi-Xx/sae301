<?php
class ClientController extends AbstractController
{
    #[Route('/client', name: 'app_client')]
    public function index(): Response
    {
        return $this->render('client/index.html.twig', [
            'controller_name' => 'ClientController',
        ]);
    }
}
$form = $this->createForm(FormulaireType::class);

return $this->render('client/index.html.twig', [
    'form_client' => $form->createView(),
]);


