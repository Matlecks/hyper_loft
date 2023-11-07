<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TableSetting;
use Illuminate\Support\Facades\Log;

class TableSettingsController extends Controller
{
    public function update_product_table_settings(Request $request, $table_name)
    {
        $tableSetting = TableSetting::where('table_name', $table_name)->first();
        if ($tableSetting) {
            $defaultValue = json_decode($tableSetting->default)->data;
            $columnNames = [];
            foreach ($request->all() as $key => $value) {
                if (strpos($key, 'checkbox_') !== false) {
                    if (strpos($key, 'seo') === false) {
                        $columnName = substr($key, strpos($key, 'checkbox_') + strlen('checkbox_'));
                    } else {
                        $arr = explode('_', $key);
                        $columnName = $arr[1] . '_' . end($arr);
                    }
                    $columnNames[] = $columnName;
                }
            }
            foreach ($columnNames as $columnName) {
                $tempArray = [];
                foreach ($request->all() as $key => $value) {
                    if (strpos($key, $columnName) !== false) {
                        $tempArray[$key] = $value;
                    }
                }
                $result[] = $tempArray;
            }

            /* dd($result); */
            if (count($result[0]) === 6) {
                array_pop($result[0]);
                array_pop($result[0]);
                array_pop($result[0]);
            } elseif (count($result[0]) === 5) {
                array_pop($result[0]);
                array_pop($result[0]);
            }
            $jsonArray = [];
            foreach ($result as $key => $item) {
                $sortKey = "column_sort_" . str_replace("checkbox_", "", array_keys($item)[0]);
                $jsonArray[] = [
                    "sort" => $item[$sortKey],
                    "alter_name" => $item[array_keys($item)[1]],
                    "column_name" => str_replace("column_altername_", "", array_keys($item)[1]),
                    "column_checkbox" => $item[array_keys($item)[0]]
                ];
            }
            $jsonData = json_encode(["data" => $jsonArray], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
            $tableSetting->settings = $jsonData;
            $tableSetting->save();
        }
        return redirect()->back();
    }


    public function update_to_default_product_table_settings($table_name)
    {
        $tableSetting = TableSetting::where('table_name', $table_name)->first();

        $tableSetting->settings = $tableSetting->default;

        $tableSetting->save();

        return redirect()->back();
    }
}
