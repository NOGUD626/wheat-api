<?php

namespace App\Http\Controllers\Forms;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\Form\GetFormsValidationRequest;
use App\Http\Controllers\Controller;
use App\Packages\Service\Application\Form\FormSchemaServiceInterface;
use App\Packages\Service\Model\Form\FormSchemaModel;

class GetAllFormSchemaController extends Controller
{
    private $formSchemaService;

    public function __construct(
        FormSchemaServiceInterface $formSchemaService
    ) {
        $this->formSchemaService = $formSchemaService;
    }

    public function __invoke(GetFormsValidationRequest $request): JsonResponse
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

        $companyId = $request->companyId;

        $formSchemaDataList = $this->formSchemaService->getFormSchemaDataList($companyId, $userId);

        $formSchemaDataList = array_map(
            function (FormSchemaModel $formSchemaData) {
                return [
                    'id' => $formSchemaData->getFormId(),
                    'title' => $formSchemaData->getFormTitle(),
                    'comment' => $formSchemaData->getFormComment(),
                    'schema' => $formSchemaData->getFormSchema(),
                    'created_at' => $formSchemaData->getCreatedAt(),
                    'updated_at' => $formSchemaData->getUpdatedAt()
                ];
            },
            $formSchemaDataList
        );

        return response()->json(
            [
                'form-list' => $formSchemaDataList,
            ],
            Response::HTTP_OK
        );
    }
}
