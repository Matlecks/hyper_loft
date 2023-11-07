<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TableSetting;

class TablesSettingsSeeders extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    TableSetting::create([
      'id' => 1,
      'table_name' => 'products',
      'settings' => '{
                "data": [
                    {
                        "sort": "1",
                        "alter_name": "Product",
                        "column_name": "title",
                        "column_checkbox": "true"
                    },
                    {
                        "sort": "2",
                        "alter_name": "Category",
                        "column_name": "category",
                        "column_checkbox": "true"
                    },
                    {
                        "sort": "6",
                        "alter_name": "Status",
                        "column_name": "status",
                        "column_checkbox": "true"
                    },
                    {
                        "sort": "3",
                        "alter_name": "Added Date",
                        "column_name": "created_at",
                        "column_checkbox": "true"
                    },
                    {
                        "sort": "4",
                        "alter_name": "Price",
                        "column_name": "cost",
                        "column_checkbox": "true"
                    },
                    {
                        "sort": "5",
                        "alter_name": "Quantity",
                        "column_name": "quantity",
                        "column_checkbox": "true"
                    }
                ]
            }',
      'default' => '{
                "data": [
                  {
                    "column_checkbox": "true",
                    "column_name": "title",
                    "alter_name": "Product",
                    "sort": 1
                  },
                  {
                    "column_checkbox": "true",
                    "column_name": "category",
                    "alter_name": "Category",
                    "sort": 1
                  },
                  {
                    "column_checkbox": "false",
                    "column_name": "anounce_img",
                    "alter_name": "Anounce Image",
                    "sort": 2
                  },
                  {
                    "column_checkbox": "false",
                    "column_name": "anounce_text",
                    "alter_name": "Anounce Text",
                    "sort": 3
                  },
                  {
                    "column_checkbox": "false",
                    "column_name": "detail_img",
                    "alter_name": "Detail Image",
                    "sort": 4
                  },
                  {
                    "column_checkbox": "false",
                    "column_name": "detail_text",
                    "alter_name": "Detail Text",
                    "sort": 5
                  },
                  {
                    "column_checkbox": "false",
                    "column_name": "seo_title",
                    "alter_name": "Seo Title",
                    "sort": 6
                  },
                  {
                    "column_checkbox": "false",
                    "column_name": "seo_description",
                    "alter_name": "Seo Description",
                    "sort": 7
                  },
                  {
                    "column_checkbox": "true",
                    "column_name": "status",
                    "alter_name": "Status",
                    "sort": 8
                  },
                  {
                    "column_checkbox": "false",
                    "column_name": "deleted_at",
                    "alter_name": "deleted_at",
                    "sort": 9
                  },
                  {
                    "column_checkbox": "true",
                    "column_name": "created_at",
                    "alter_name": "Addet Date",
                    "sort": 10
                  },
                  {
                    "column_checkbox": "false",
                    "column_name": "updated_at",
                    "alter_name": "Update Date",
                    "sort": 11
                  }
                ]
              }',
    ]);

    TableSetting::create([
      'id' => 2,
      'table_name' => 'shops',
      'settings' => '{}',
      'default' => '{
                "data": [
                    {
                        "sort": 1,
                        "alter_name": "Shop",
                        "column_name": "title",
                        "column_checkbox": "true"
                    },
                    {
                        "sort": 2,
                        "alter_name": "City",
                        "column_name": "city",
                        "column_checkbox": "true"
                    },
                    {
                        "sort": 3,
                        "alter_name": "Addet Date",
                        "column_name": "created_at",
                        "column_checkbox": "true"
                    },
                    {
                        "sort": 4,
                        "alter_name": "Status",
                        "column_name": "status",
                        "column_checkbox": "true"
                    }
                ]
            }',
    ]);

    /* TableSetting::create([
            'id' => 3,
            'table_name' => 'users',
            'settings' => '{}',
            'default' => '{
                "data": [
                    {
                        "sort": 1,
                        "alter_name": "Name",
                        "column_name": "name",
                        "column_checkbox": "true"
                    },
                    {
                        "sort": 2,
                        "alter_name": "E-mail",
                        "column_name": "email",
                        "column_checkbox": "true"
                    },
                    {
                        "sort": 3,
                        "alter_name": "Phone",
                        "column_name": "phone",
                        "column_checkbox": "true"
                    },
                    {
                        "sort": 4,
                        "alter_name": "Addet Date",
                        "column_name": "description",
                        "column_checkbox": "true"
                    },
                    {
                        "sort": 5,
                        "alter_name": "Status",
                        "column_name": "status",
                        "column_checkbox": "true"
                    }
                ]
            }',
        ]); */
  }
}
