<?php

namespace App\Packages\Service\Model\Form;

class PostFormSchemaModel
{
    protected $formId;
    protected $formTitle;
    protected $formComment;
    protected $formSchema;
    protected $userId;

    public function __construct(
        string $companyId,
        string $formTitle,
        ?string $formComment,
        array $formSchema,
        string $userId,
    ){
        $this->companyId=$companyId;
        $this->formTitle=$formTitle;
        $this->formComment=$formComment;
        $this->formSchema=$formSchema;
        $this->userId=$userId;
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
     * @return string|null
     */
    public function getUserId(): string
    {
        return $this->userId;
    }
}