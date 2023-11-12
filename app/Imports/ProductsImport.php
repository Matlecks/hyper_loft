<?php

namespace App\Imports;

use App\Models\Product;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithMapping;

class ProductsImport implements ToCollection, ToModel, WithMapping
{
    /**
     * @param Collection $collection
     */

    private $data;

    public function withData($data)
    {
        $this->data = $data;
    }


    public function collection(Collection $rows)
    {
        // Обработка каждой строки данных из Excel-файла
        foreach ($rows as $row) {
            // Делайте что-то с данными и $this->data
            /* dd($this->data); */
            // ...
        }
    }

    public function mapping(): array
    {

        /* $settings = json_decode($this->data['settings'], true); // Разбор JSON-строки в массив

        $mapping = [
            'ID' => $this->data['id'],
        ];

        // Перебор настроек и добавление соответствующих полей в маппинг
        foreach ($settings as $key => $value) {
            $mapping[$value] = $this->data[$key];
        }

        return $mapping; */

        return [
            'ID' => 'id',
            'Название' => 'title',
            'Символьный код' => 'symbolic_code',
        ];
    }

    public function model(array $row)
    {
        /* dd($row); */
        $product = new Product(); // Создание экземпляра модели

        $settings = json_decode($this->data['settings'], true); // Разбор JSON-строки в массив

        /* dd($settings); */
        $i = 1;
        foreach ($settings as $key => $value) {
            $product->$key = $row[$i];
            /* dd($row[1]); */
            if ($key === 'detail_img') {
                $jsonValue = json_encode($row[$i]);
                $product->$key = $jsonValue;
            } else {
                $product->$key = $row[$i];
            }
            Log::info("Значение $key: " . $row[$i]);
            $i++;
        }

        /* $product->title = $row[1];
        $product->symbolic_code = $row[2]; */
        // Дополнительные заполнения данных

        return $product;
    }


    public function map($row): array
    {

        /* dd($row); */
        return [
            $row[0],
            $row[1],
            $row[2],
            $row[3],
            $row[4],
            $row[5],
            $row[6],
            $row[7],
            $row[8],
            $row[9],
            $row[10],
            $row[11],
            $row[12],
            $row[13],
            /* $row[14], */
        ];
    }
}
