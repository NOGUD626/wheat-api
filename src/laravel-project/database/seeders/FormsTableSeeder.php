<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FormsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $forms = array(
            [
                'id' => 'FM-62e9249a4936b',
                'title' => 'テスト問診1',
                'created_by' => 'U-62e74a8b33397',
                'company_id' => 'C-62e74c9ad22b0',
                'comment' => 'テスト用の問診票',
            ]
        );

        DB::table('forms')->insert($forms);

        $json1 = '[
            {
                "id": "f79b92c6-f4de-4821-9518-0c1459f097db",
                "title": {
                    "blocks": [
                        {
                            "key": "a0cd205e-0d09-4a83-a6d0-5f73d8a33eea",
                            "text": "チェックボックス",
                            "type": "header-one",
                            "depth": 0,
                            "inlineStyleRanges": [],
                            "entityRanges": [],
                            "data": {}
                        }
                    ],
                    "entityMap": {}
                },
                "type": 100,
                "description": {
                    "blocks": [
                        {
                            "key": "5b0b20a3-923d-4a0e-8fcb-8589ae47926b",
                            "text": "テストアンケートです",
                            "type": "header-two",
                            "depth": 0,
                            "inlineStyleRanges": [],
                            "entityRanges": [],
                            "data": {}
                        }
                    ],
                    "entityMap": {}
                },
                "formData": {
                    "text": ""
                }
            },
            {
                "id": "14887597-3e20-49f3-95f9-e157f122ab81",
                "title": {
                    "blocks": [
                        {
                            "key": "aee9ec97-167d-43c1-98e0-ae75eb80c54c",
                            "text": "チェックボックス",
                            "type": "header-one",
                            "depth": 0,
                            "inlineStyleRanges": [],
                            "entityRanges": [],
                            "data": {}
                        }
                    ],
                    "entityMap": {}
                },
                "type": 102,
                "description": {
                    "blocks": [
                        {
                            "key": "57664db9-11ce-4196-8e81-43400ddea0a1",
                            "text": "次の項目の症状に該当する場合はチェックを入れてください",
                            "type": "unstyled",
                            "depth": 0,
                            "inlineStyleRanges": [],
                            "entityRanges": [],
                            "data": {}
                        }
                    ],
                    "entityMap": {}
                },
                "formData": [
                    {
                        "text": "息苦しい",
                        "answer": false
                    },
                    {
                        "text": "熱っぽい",
                        "answer": false
                    },
                    {
                        "text": "意識がなくなることがあｒ",
                        "answer": false
                    }
                ]
            },
            {
                "id": "eee7b40e-90f6-470f-ac02-684bffff7627",
                "title": {
                    "blocks": [
                        {
                            "key": "9d0a4f07-f0ef-4880-86e2-2f43d577da42",
                            "text": "チェックボックス",
                            "type": "header-one",
                            "depth": 0,
                            "inlineStyleRanges": [],
                            "entityRanges": [],
                            "data": {}
                        }
                    ],
                    "entityMap": {}
                },
                "type": 103,
                "description": {
                    "blocks": [
                        {
                            "key": "087e1381-a430-4d1f-b489-1f6a7b1c6b1f",
                            "text": "次の質問に回答してください",
                            "type": "unstyled",
                            "depth": 0,
                            "inlineStyleRanges": [],
                            "entityRanges": [],
                            "data": {}
                        }
                    ],
                    "entityMap": {}
                },
                "formData": [
                    {
                        "text": "性別",
                        "leftText": "男",
                        "rightText": "女",
                        "answer": false
                    },
                    {
                        "text": "病気だと思いますか",
                        "leftText": "思う",
                        "rightText": "思わない",
                        "answer": false
                    }
                ]
            },
            {
                "id": "16ff060f-99fc-4182-ae02-793922f9f0b7",
                "title": {
                    "blocks": [
                        {
                            "key": "c287a469-b60f-45c4-be95-6dd966b420b2",
                            "text": "チェックボックス",
                            "type": "header-one",
                            "depth": 0,
                            "inlineStyleRanges": [],
                            "entityRanges": [],
                            "data": {}
                        }
                    ],
                    "entityMap": {}
                },
                "type": 104,
                "description": {
                    "blocks": [
                        {
                            "key": "91a042d8-e291-4dd6-a682-1e6f3205ad92",
                            "text": "",
                            "type": "unstyled",
                            "depth": 0,
                            "inlineStyleRanges": [],
                            "entityRanges": [],
                            "data": {}
                        }
                    ],
                    "entityMap": {}
                },
                "formData": {
                    "text": "痛みの度合いを教えてください",
                    "leftText": "痛くない",
                    "rightText": "痛い",
                    "leftNumber": 1,
                    "rightNumber": 5,
                    "answer": 99
                }
            },
            {
                "id": "c16a379e-1596-4df3-89db-9a189d9a1af7",
                "title": {
                    "blocks": [
                        {
                            "key": "2ac7b2b4-fb67-43df-b073-57dd66331e34",
                            "text": "チェックボックス",
                            "type": "header-one",
                            "depth": 0,
                            "inlineStyleRanges": [],
                            "entityRanges": [],
                            "data": {}
                        }
                    ],
                    "entityMap": {}
                },
                "type": 101,
                "description": {
                    "blocks": [
                        {
                            "key": "651ea4a4-d7f8-4bb5-b689-dab24b05b02f",
                            "text": "最後に何かあれば記入してください",
                            "type": "unstyled",
                            "depth": 0,
                            "inlineStyleRanges": [],
                            "entityRanges": [],
                            "data": {}
                        }
                    ],
                    "entityMap": {}
                },
                "formData": {
                    "text": ""
                }
            }
        ]';

        $forms_data = array(
            [
                'id' => 'FM-62e9249a4936b',
                'content' => json_decode($json1, true)
            ]
        );

        DB::connection('mongodb')
            ->collection('form')
            ->insert($forms_data);
    }
}
