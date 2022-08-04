<?php

namespace App\Http\Controllers\Forms;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use App\Packages\Service\Application\Form\FormSchemaServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Form\PutFormValidationRequest;
use App\Packages\Service\Model\Form\PutFormSchemaModel;

class PutFormController extends Controller
{

    public function __construct(
        FormSchemaServiceInterface $formSchemaService
    ) {
        $this->formSchemaService = $formSchemaService;
    }

    public function __invoke(PutFormValidationRequest $request): JsonResponse
    {
        $user = $request->user();
        $userId = $user->id;

        if (!$user->tokenCan('form/update')) {
            return response()->json(
                [
                    'message' => 'not permission',
                ],
                Response::HTTP_UNAUTHORIZED
            );
        }

        $formId = $request->formId;
        $title = $request->title;
        $comment = $request->comment;
        $schema = $request->schema;
        $companyId = $request->companyId;
        $userId = $user->id;

        $postFormData = new PutFormSchemaModel(
            $companyId,
            $title,
            $comment,
            $schema,
            $userId,
            $formId
        );

        $this->formSchemaService->putFormSchemaData($postFormData);

        return response()->json(
            [],
            Response::HTTP_CREATED
        );
    }
}
