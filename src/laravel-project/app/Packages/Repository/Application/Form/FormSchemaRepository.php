<?php

namespace App\Packages\Repository\Application\Form;

use Illuminate\Support\Facades\DB;
use App\Packages\Repository\Model\Form\FormSchemaModel;
use App\Packages\Repository\Model\Form\PostFormSchemaModel;
use phpDocumentor\Reflection\Types\Boolean;

class FormSchemaRepository implements FormSchemaRepositoryInterface
{

    public function getFormSchemaData(String $formId, String $userId): FormSchemaModel
    {
        $formSchemaInfoData = DB::table('forms')
            ->leftjoin('companies', 'forms.company_id', '=', 'companies.id')
            ->leftjoin('staff', 'forms.company_id', '=', 'staff.company_id')
            ->where('staff.user_id', $userId)
            ->where('forms.id', $formId)
            ->select('forms.id', 'forms.title', 'forms.comment', 'forms.created_at', 'forms.updated_at')
            ->first();
        return new FormSchemaModel(
            $formSchemaInfoData->id,
            $formSchemaInfoData->title,
            $formSchemaInfoData->comment,
            $this->getFormSchemaDataByMongo($formSchemaInfoData->id),
            $formSchemaInfoData->created_at,
            $formSchemaInfoData->updated_at
        );
    }

    public function getFormSchemaDataList(String $companyId, String $userId): array
    {
        $formSchemaInfoData = DB::table('forms')
            ->leftjoin('companies', 'forms.company_id', '=', 'companies.id')
            ->leftjoin('staff', 'forms.company_id', '=', 'staff.company_id')
            ->where('staff.company_id', $companyId)
            ->where('staff.user_id', $userId)
            ->select('forms.id', 'forms.title', 'forms.comment', 'forms.created_at', 'forms.updated_at')
            ->get()->toArray();
        return array_map(
            function ($formSchemaInfoData): FormSchemaModel {
                return new FormSchemaModel(
                    $formSchemaInfoData->id,
                    $formSchemaInfoData->title,
                    $formSchemaInfoData->comment,
                    $this->getFormSchemaDataByMongo($formSchemaInfoData->id),
                    $formSchemaInfoData->created_at,
                    $formSchemaInfoData->updated_at
                );
            },
            $formSchemaInfoData
        );
    }

    private function getFormSchemaDataByMongo(string $formId): array
    {
        $formSchemaData = DB::connection('mongodb')->collection('form')
            ->where('id', $formId)
            ->first();

        return $formSchemaData["content"];
    }

    public function postFormSchemaData(PostFormSchemaModel $postFormSchemaModel): bool
    {
        if (
            DB::table('forms')
            ->leftjoin('companies', 'forms.company_id', '=', 'companies.id')
            ->leftjoin('staff', 'forms.company_id', '=', 'staff.company_id')
            ->where('staff.company_id', $postFormSchemaModel->getCompanyId())
            ->where('staff.user_id', $postFormSchemaModel->getUserId())
            ->doesntExist()
        ) {
            return false;
        }

        DB::table('forms')->insert([
            'id' => $postFormSchemaModel->getFormId(),
            'title' => $postFormSchemaModel->getFormTitle(),
            'created_by' => $postFormSchemaModel->getUserId(),
            'company_id' => $postFormSchemaModel->getCompanyId(),
            'comment' => $postFormSchemaModel->getFormComment(),
        ]);

        DB::connection('mongodb')->collection('form')->insert([
            'id' => $postFormSchemaModel->getFormId(),
            'content' => $postFormSchemaModel->getFormSchema()
        ]);

        return true;
    }

    public function deleteFormSchemaDataList(String $formId, String $companyId, String $userId): bool
    {
        DB::table('forms')
            ->leftjoin('companies', 'forms.company_id', '=', 'companies.id')
            ->leftjoin('staff', 'forms.company_id', '=', 'staff.company_id')
            ->where('staff.user_id', $userId)
            ->where('forms.id', $formId)
            ->where('forms.company_id', $companyId)
            ->delete();

        DB::connection('mongodb')
            ->collection('form')
            ->where('id', $formId)
            ->delete();
            
        return true;
    }
}
