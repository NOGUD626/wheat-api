<?php

namespace App\Http\Controllers\Forms;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Packages\Service\Application\Form\FormSchemaServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Form\DeleteFormValidationRequest;

class DeleteFormController extends Controller
{

    public function __construct(
        FormSchemaServiceInterface $formSchemaService
    ) {
        $this->formSchemaService = $formSchemaService;
    }

    public function __invoke(DeleteFormValidationRequest $request): JsonResponse
    {
        $user = $request->user();
        $userId = $user->id;

        if (!$user->tokenCan('form/delete')) {
            return response()->json(
                [
                    'message' => 'not permission',
                ],
                Response::HTTP_UNAUTHORIZED
            );
        }

        $companyId = $request->companyId;
        $formId = $request->formId;

        $status = $this->formSchemaService->deleteFormSchemaDataList($formId,  $companyId,  $userId);

        return response()->json(
            [
                'status' => $status ? "success" : "failed",
            ],
            $status ? Response::HTTP_NO_CONTENT : Response::HTTP_FORBIDDEN
        );
    }
}
