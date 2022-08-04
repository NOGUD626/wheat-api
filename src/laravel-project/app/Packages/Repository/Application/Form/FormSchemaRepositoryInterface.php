<?php

namespace App\Packages\Repository\Application\Form;

use App\Packages\Repository\Model\Form\FormSchemaModel;

interface FormSchemaRepositoryInterface
{
    /**
     * FormのSchemaデータを返す
     * @param string formId
     * @param string userId
     * @return boolean FormSchemaModel フォームのスキーマデータ
     */
    public function getFormSchemaData(String $formId, String $userId): FormSchemaModel;

    /**
     * FormのSchemaデータのリストを返す
     * @param string companyId
     * @param string userId
     * @return array フォームのスキーマデータのリスト
     */
    public function getFormSchemaDataList(String $companyId, String $userId): array;
}
