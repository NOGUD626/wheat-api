<?php

namespace App\Packages\Service\Model\UserAuth;

class ComponeyListModel
{
    protected $companyId;
    protected $companyName;
    protected $companyAddress;
    protected $createdAt;

    public function __construct(
        ?string $companyId,
        string $companyName,
        string $companyAddress,
        string $createdAt
    ) {
        $this->companyId=$companyId;
        $this->companyName=$companyName;
        $this->companyAddress=$companyAddress;
        $this->createdAt=$createdAt;
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
    public function getCompanyName(): string
    {
        return $this->companyName;
    }

    /**
     * @return string
     */
    public function getCompanyAddress(): string
    {
        return $this->companyAddress;
    }

    /**
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }
}