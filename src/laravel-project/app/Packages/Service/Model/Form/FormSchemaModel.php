<?php

namespace App\Packages\Service\Model\Form;

class FormSchemaModel
{
    protected $formId;
    protected $formTitle;
    protected $formComment;
    protected $createdAt;
    protected $updatedAt;
    protected $formSchema;

    public function __construct(
        ?string $formId,
        string $formTitle,
        string $formComment,
        array $formSchema,
        string $createdAt,
        string $updatedAt
    ) {
        $this->formId=$formId;
        $this->formTitle=$formTitle;
        $this->formComment=$formComment;
        $this->formSchema=$formSchema;
        $this->createdAt=$createdAt;
        $this->updatedAt=$updatedAt;
    }

    /**
     * @return string|null
     */
    public function getFormId(): ?string
    {
        return $this->formId;
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
     * @return string|null
     */
    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    /**
     * @return string|null
     */
    public function getUpdatedAt(): ?string
    {
        return $this->updatedAt;
    }

    /**
     * @return array
     */
    public function getFormSchema(): array
    {
        return $this->formSchema;
    }
}