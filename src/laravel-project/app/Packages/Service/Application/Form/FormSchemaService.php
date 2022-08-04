<?php

namespace App\Packages\Service\Application\Form;

use App\Packages\Repository\Application\Form\FormSchemaRepositoryInterface;
use App\Packages\Service\Model\Form\FormSchemaModel;
use App\Packages\Repository\Model\Form\FormSchemaModel as FormSchemaRepositoryModel;
use App\Packages\Service\Model\Form\PostFormSchemaModel;
use App\Packages\Repository\Model\Form\PostFormSchemaModel as PostFormSchemaRepositoryModel;

class FormSchemaService implements FormSchemaServiceInterface
{
    private $formSchemaRepository;

    public function __construct(
        FormSchemaRepositoryInterface $formSchemaRepository
    ) {
        $this->formSchemaRepository = $formSchemaRepository;
    }

    public function getFormSchemaData(String $formId, String $userId): FormSchemaModel
    {
        $formSchemaData = $this->formSchemaRepository->getFormSchemaData($formId, $userId);

        return new FormSchemaModel(
            $formSchemaData->getFormId(),
            $formSchemaData->getFormTitle(),
            $formSchemaData->getFormComment(),
            $formSchemaData->getFormSchema(),
            $formSchemaData->getCreatedAt(),
            $formSchemaData->getUpdatedAt()
        );
    }

    public function getFormSchemaDataList(String $companyId, String $userId): array
    {
        $formSchemaDataList = $this->formSchemaRepository->getFormSchemaDataList($companyId, $userId);

        return array_map(
            function (FormSchemaRepositoryModel $formSchemaData): FormSchemaModel {
                return new FormSchemaModel(
                    $formSchemaData->getFormId(),
                    $formSchemaData->getFormTitle(),
                    $formSchemaData->getFormComment(),
                    $formSchemaData->getFormSchema(),
                    $formSchemaData->getCreatedAt(),
                    $formSchemaData->getUpdatedAt()
                );
            },
            $formSchemaDataList
        );
    }

    public function postFormSchemaData(PostFormSchemaModel $postFormSchemaModel): bool
    {
        return $this->formSchemaRepository->postFormSchemaData(
            new PostFormSchemaRepositoryModel(
                $postFormSchemaModel->getCompanyId(),
                $postFormSchemaModel->getFormTitle(),
                $postFormSchemaModel->getFormComment(),
                $postFormSchemaModel->getFormSchema(),
                $postFormSchemaModel->getUserId(),
                uniqid('FM-'),
            )
        );
    }
}
