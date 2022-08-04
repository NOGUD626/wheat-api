<?php

namespace App\Packages\Service\Application\Form;

use App\Packages\Service\Model\Form\FormSchemaModel;
use App\Packages\Service\Model\Form\PostFormSchemaModel;
use App\Packages\Service\Model\Form\PutFormSchemaModel;

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

    /**
     * FormのSchemaデータを登録する
     * @param PostFormSchemaModel 登録するフォームスキマー情報
     * @return bool
     * 
     */
    public function postFormSchemaData(PostFormSchemaModel $postFormSchemaModel): bool;

    /**
     * FormのSchemaデータを削除する
     * @param string formId
     * @param string companyId
     * @param string userId
     * @return bool
     */
    public function deleteFormSchemaData(String $formId, String $companyId, String $userId): void;

    /**
     * FormのSchemaデータを更新する
     * @param PutFormSchemaModel 更新するフォームスキマー情報
     * @return bool
     */
    public function putFormSchemaData(PutFormSchemaModel $putFormSchemaModel): void;
}