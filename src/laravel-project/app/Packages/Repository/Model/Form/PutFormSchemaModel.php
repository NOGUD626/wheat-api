<?php

namespace App\Packages\Repository\Model\Form;

class PutFormSchemaModel
{
    protected $companyId;
    protected $formTitle;
    protected $formComment;
    protected $formSchema;
    protected $userId;
    protected $formId;

    public function __construct(
        string $companyId,
        string $formTitle,
        ?string $formComment,
        array $formSchema,
        string $userId,
        string $formId
    ){
        $this->companyId=$companyId;
        $this->formTitle=$formTitle;
        $this->formComment=$formComment;
        $this->formSchema=$formSchema;
        $this->userId=$userId;
        $this->formId=$formId;
    }

    /**
     * @return string|null
     */
    public function getCompanyId(): ?string
    {
        return $this->companyId;
    }

    /**
     * @return string
     */
    public function getFormTitle(): string
    {
        return $this->formTitle;
    }

    /**
     * @return string|null
     */
    public function getFormComment(): ?string
    {
        return $this->formComment;
    }

    /**
     * @return array
     */
    public function getFormSchema(): array
    {
        return $this->formSchema;
    }

    /**
     * @return string
     */
    public function getUserId(): string
    {
        return $this->userId;
    }

    /**
     * @return string
     */
    public function getFormId(): string
    {
        return $this->formId;
    }
}