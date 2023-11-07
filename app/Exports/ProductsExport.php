<?php

namespace App\Exports;

use App\Models\Product;
use App\Models\ProductShop;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ProductsExport implements FromCollection, FromQuery, WithHeadings, WithMapping, WithStyles
{
    use Exportable;

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Product::all();
    }

    public function query()
    {
        return Product::all();
    }

    public function map($product): array
    {
        $shops = $product->shops;
        foreach ($shops as $shop) {
            $title_shop = $shop->title;
        }

        return [
            $product->id,
            $product->title,
            $product->symbolic_code,
            $product->anounce_img,
            $product->anounce_text,
            $product->detail_img,
            $product->detail_text,
            $product->seo_title,
            $product->seo_description,
            $product->status,
            $product->user_id,
            $product->created_at->format('d/m/Y'),
            ProductShop::where('product_id', $product->id)->first()->cost,
            $title_shop,
            /* $product->shops->title, */
            ProductShop::where('product_id', $product->id)->first()->quantity,
            // Добавьте здесь другие поля, если необходимо
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'Название',
            'Символьный код',
            'Картинка превью',
            'Текст превью',
            'Картинка детальная',
            'Текст детальный',
            'Сео заголовок',
            'Сео описание',
            'Статус',
            'Привязка к пользователю',
            'Создан',
            'Цена',
            'Магазин',
            'Количество',
            // Добавьте здесь другие заголовки, если необходимо
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Здесь вы можете настроить стили для экспортируемого файла
        ];
    }

    public function only($columns = null)
    {
        return $this->query->select($columns);
    }

    public function except($columns = null)
    {
        return $this->query->select(array_diff($this->getTableColumns(), (array) $columns));
    }
}
