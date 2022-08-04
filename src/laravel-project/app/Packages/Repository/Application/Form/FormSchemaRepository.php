<?php

namespace App\Packages\Repository\Application\Form;

use Illuminate\Support\Facades\DB;
use App\Packages\Repository\Model\Form\FormSchemaModel;

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
}
