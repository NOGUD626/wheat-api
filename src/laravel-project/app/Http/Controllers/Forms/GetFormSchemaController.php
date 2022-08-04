<?php

namespace App\Http\Controllers\Forms;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\Form\FormAPIValidationRequest;
use App\Http\Controllers\Controller;
use App\Packages\Service\Application\Form\FormSchemaServiceInterface;

class GetFormSchemaController extends Controller
{
    private $formSchemaService;

    public function __construct(
        FormSchemaServiceInterface $formSchemaService
    ) {
        $this->formSchemaService = $formSchemaService;
    }

    public function __invoke(FormAPIValidationRequest $request): JsonResponse
    {

        $user = $request->user();
        $userId = $user->id;

        if (!$user->tokenCan('form/read')) {
            return response()->json(
                [
                    'message' => 'not permission',
                ],
                Response::HTTP_UNAUTHORIZED
            );
        }

        $formId = $request->formId;
        $formSchemaData = $this->formSchemaService->getFormSchemaData($formId, $userId);

        $formSchemaData = [
            'id' => $formSchemaData->getFormId(),
            'title' => $formSchemaData->getFormTitle(),
            'comment' => $formSchemaData->getFormComment(),
            'schema' => $formSchemaData->getFormSchema(),
            'created_at' => $formSchemaData->getCreatedAt(),
            'updated_at' => $formSchemaData->getUpdatedAt()
        ];

        return response()->json(
           $formSchemaData,
            Response::HTTP_OK
        );
    }
}
