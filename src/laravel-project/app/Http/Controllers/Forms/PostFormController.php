<?php

namespace App\Http\Controllers\Forms;

use Illuminate\Http\JsonResponse;
use App\Http\Requests\Form\PostFormValidationRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Packages\Service\Model\Form\PostFormSchemaModel;
use App\Http\Controllers\Controller;
use App\Packages\Service\Application\Form\FormSchemaServiceInterface;

class PostFormController extends Controller
{

    public function __construct(
        FormSchemaServiceInterface $formSchemaService
    ) {
        $this->formSchemaService = $formSchemaService;
    }

    public function __invoke(PostFormValidationRequest $request): JsonResponse
    {
        $user = $request->user();

        if (!$user->tokenCan('form/write')) {
            return response()->json(
                [
                    'message' => 'not permission',
                ],
                Response::HTTP_UNAUTHORIZED
            );
        }

        $title = $request->title;
        $comment = $request->comment;
        $schema = $request->schema;
        $companyId = $request->companyId;
        $userId = $user->id;

        $postFormData = new PostFormSchemaModel(
            $companyId,
            $title,
            $comment,
            $schema,
            $userId
        );

        $status = $this->formSchemaService->postFormSchemaData($postFormData);

        return response()->json(
            [
                'status' => $status ? "success" : "failed",
            ],
            $status ? Response::HTTP_CREATED : Response::HTTP_FORBIDDEN
        );
    }
}
