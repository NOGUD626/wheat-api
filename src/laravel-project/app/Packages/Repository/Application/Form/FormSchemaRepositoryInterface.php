<?php

namespace App\Packages\Repository\Application\Form;

use App\Packages\Repository\Model\Form\FormSchemaModel;
use App\Packages\Repository\Model\Form\PostFormSchemaModel;
use App\Packages\Repository\Model\Form\PutFormSchemaModel;

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

    /**
     * FormのSchemaデータを登録する
     * @param PostFormSchemaModel 登録するフォームスキマー情報
     * @return void
     * 
     */
    public function postFormSchemaData(PostFormSchemaModel $postFormSchemaModel): bool;

    /**
     * FormのSchemaデータを削除する
     * @param string formId
     * @param string companyId
     * @param string userId
     * @return void
     */
    public function deleteFormSchemaData(String $formId, String $companyId, String $userId): void;

    /**
     * FormのSchemaデータを更新する
     * @param string formId
     * @return void
     */
    public function putFormSchemaData(PutFormSchemaModel $putFormSchemaModel): void;
}
