<?php

namespace App\Imports;

use App\Models\Product;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithMapping;

class ProductsImport implements ToCollection, ToModel, WithMapping
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $rows)
    {
        // Обработка каждой строки данных из Excel-файла
        foreach ($rows as $row) {
            // Делайте что-то с данными
            // ...
        }
    }

    public function mapping(): array
    {
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
        $product->title = $row[1];
        $product->symbolic_code = $row[2];
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
            $row[14],
        ];
    }
}
