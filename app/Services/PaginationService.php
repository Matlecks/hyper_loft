<?

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;

class PaginationService
{
    public function setPagination(Request $request, $page)
    {
        $pagination = $request->input('pagination');
        switch ($page) {
            case 'products':
                $key = $page . '_pagination';
                Cache::put($key, $pagination);
/*                 dd($key); // Выводит название ключа в кэше
 */                return redirect()->route('index_products');
            case 'shops':
                $key = $page . '_pagination';
                Cache::put($key, $pagination);
/*                 dd($key); // Выводит название ключа в кэше
 */                return redirect()->route('index_shops');
        }
    }
    }
