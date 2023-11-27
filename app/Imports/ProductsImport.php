<?php

namespace App\Imports;

use App\Models\Product;
use App\Models\Profile;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithMapping;

class ProductsImport implements ToCollection, /* ToModel, */ WithMapping
{
    /**
     * @param Collection $collection
     */

    private $data;

    public function withData($data)
    {
        $this->data = $data;
    }



    /* public function collection(Collection $rows)
    {

        // $mappedRow = $this->map($rows);
        foreach ($rows as $row) {

            $product = new Product();
            foreach ($row as $dbColumn => $excelData) {

                $decodedRow = json_decode($row, true);
                Log::info('в collection() приходит $row = ' . print_r($decodedRow, true));

                $columnType = Schema::getColumnType($product->getTable(), $dbColumn);

                switch ($columnType) {
                    case 'integer':
                        $value = (int)($row[$dbColumn] ?? 0);
                        break;
                    case 'float':
                        $value = (float)($row[$dbColumn] ?? 0);
                        break;
                    case 'boolean':
                        $value = (bool)($row[$dbColumn] ?? false);
                        break;
                    case 'json':
                        $value = json_encode($row[$dbColumn] ?? []);
                        break;
                    default:
                        $value = $row[$dbColumn] ?? null;
                        break;
                }
                $product->$dbColumn = $value;
                Log::info('В колонку ' . $dbColumn . ' записываем значение $rows[' . $dbColumn . ']: ' . ($row[$dbColumn] ?? 'null'));
            }
        }
        return $product;
    } */

    public function collection(Collection $rows)
    {
        $products = [];
        foreach ($rows as $key => $row) {
            Log::info('$key = ' . $key);
            $product = new Product();

            foreach ($row as $dbColumn => $excelData) {

                $columnType = Schema::getColumnType($product->getTable(), $dbColumn);

                switch ($columnType) {
                    case 'integer':
                        $value = (int)($row[$dbColumn] ?? 0);
                        break;
                    case 'float':
                        $value = (float)($row[$dbColumn] ?? 0);
                        break;
                    case 'boolean':
                        $value = (bool)($row[$dbColumn] ?? false);
                        break;
                    case 'json':
                        $value = json_encode($row[$dbColumn] ?? []);
                        break;
                    default:
                        $value = $row[$dbColumn] ?? null;
                        break;
                }
                $product->$dbColumn = $value;
                Log::info('В колонку ' . $dbColumn . ' записываем значение $rows[' . $dbColumn . ']: ' . ($row[$dbColumn] ?? 'null'));
            }
            $product->save();
        }
        return $products;
    }

    /* public function model(array $row)
    {
        $settings = json_decode($this->data['settings'], true);
        $mappedData = $this->map($row);

        $product = new Product();

        foreach ($settings as $dbColumn => $excelColumn) {
            if ($dbColumn === 'none') {
                continue; // Пропустить текущую итерацию цикла
            }

            $columnType = Schema::getColumnType($product->getTable(), $dbColumn);

            switch ($columnType) {
                case 'integer':
                    $value = (int)($row[$dbColumn] ?? 0);
                    break;
                case 'float':
                    $value = (float)($row[$dbColumn] ?? 0);
                    break;
                case 'boolean':
                    $value = (bool)($row[$dbColumn] ?? false);
                    break;
                case 'json':
                    $value = json_encode($row[$dbColumn] ?? []);
                    break;
                default:
                    $value = $row[$dbColumn] ?? null;
                    break;
            }

            // $value = $row[$i];

            $product->$dbColumn = $value;
            Log::info("В колонку $dbColumn записываем значение: " . ($row[$dbColumn] ?? 'null'));
        }

        return $product;
    } */

    public function map($row): array
    {
        if (isset($this->data['settings'])) {
            $settings = json_decode($this->data['settings'], true);


            /* $result = [];
            $for_map = [];

            foreach ($settings as $key => $value) {
                $index = array_search($value, $row);
                $result[$key] = $index !== false ? $index : null;
            }

            $i = 0;
            foreach ($result as $key => $index) {
                $for_map[$i] = $index;
                $i++;

                Log::info('в for_map[' . $i . '] (' . $key . ') получаем index = ' . $index);
            }

            $profile = Profile::find($this->data['id']);
            $profile->default_settings = $for_map;
            $profile->save(); */
            /* dd($result); */
            //dd($profile);
            $profile = Profile::find($this->data['id']);
            /* if ($profile->default_settings != null) { */
            $for_map = json_decode($profile->default_settings, true);
            /* Log::info('из бд в for_map приходит ' . print_r($for_map, true));
                } else {
                foreach ($result as $key => $index) {
                    $for_map[$i] = $index;
                    $i++;
                    Log::info('в for_map[' . $i . '] (' . $key . ') получаем index = ' . $index);
                }

                $json = json_encode($for_map, JSON_UNESCAPED_UNICODE);
                $profile->default_settings = $json;
                $profile->save();
                //dd($json);
                } */

            return [
                'title' => isset($row[$for_map[0]]) ? $row[$for_map[0]] : null,
                'symbolic_code' => !empty($for_map[1]) ? $row[$for_map[1]] : null,
                'anounce_img' => !empty($for_map[2]) ? $row[$for_map[2]] : null,
                'anounce_text' => !empty($for_map[3]) ? $row[$for_map[3]] : null,
                'detail_img' => !empty($for_map[4]) ? $row[$for_map[4]] : null,
                'detail_text' => !empty($for_map[5]) ? $row[$for_map[5]] : null,
                'seo_title' => !empty($for_map[6]) ? $row[$for_map[6]] : null,
                'seo_description' => !empty($for_map[7]) ? $row[$for_map[7]] : null,
            ];

            /* return [
                'title' => $row[0],
                'symbolic_code' => $row[5],
                'anounce_img' => null,
                'anounce_text' => null,
                'detail_img' => null,
                'detail_text' => $row[12],
                'seo_title' => $row[1],
                'seo_description' => $row[2],
            ]; */

            /* return [
                'title' => $row[0] ?? null,
                'symbolic_code' => isset($row[5]) ? $row[5] : null,
                'anounce_img' => null,
                'anounce_text' => null,
                'detail_img' => null,
                'detail_text' => $row[12] ?? null,
                'seo_title' => $row[1] ?? null,
                'seo_description' => $row[2] ?? null,
            ]; */
        } else {
            return $row;
        }
    }
}
