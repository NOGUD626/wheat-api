<?php

namespace App\Packages\Service\Application\Form;

use App\Packages\Service\Model\Form\FormSchemaModel;

interface FormSchemaServiceInterface
{
    /**
     * FormのSchemaデータを返す
     * @param string formID
     * @param string UserId
     * @return FormSchemaModel フォームのスキーマデータ
     */
    public function getFormSchemaData(String $formId, String $userId): FormSchemaModel;

    /**
     * FormのSchemaデータのリストを返す
     * @param string companyId
     * @param string UserId
     * @return array フォームのスキーマデータのリスト
     */
    public function getFormSchemaDataList(String $companyId, String $userId): array;
}
