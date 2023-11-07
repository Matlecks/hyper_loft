<?php

namespace App\Http\Controllers;

use App\Models\Admin_Menu;
use App\Models\Catalog_Category;
use App\Models\Letter;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index_user() // общая страница
    {
        $admin_menu_points = Admin_Menu::where('parent_id', 1)->get();
        $page_title = 'User';
        $users = User::all();
        $sort = 'asc';

        return view('admin_part.users.users_list', compact('admin_menu_points', 'page_title', 'users', 'sort'));
    }

    public function filter_user(Request $request, $status)  // фильтрует пользователей на общей странице
    {
    }

    public function sort_users(Request $request, $column_name, $sort)  // фильтрует пользователей на общей странице
    {
        $admin_menu_points = Admin_Menu::where('parent_id', 1)->get();
        $page_title = 'User';
        $users = User::orderBy($column_name, $sort)->get();
        $sort = ($sort === 'asc') ? 'desc' : 'asc';
        return view('admin_part.users.users_list', compact('admin_menu_points', 'page_title', 'users', 'sort'));
    }
    public function show_user(Request $request, $id) // детальная страница пользователя
    {
        $admin_menu_points = Admin_Menu::where('parent_id', 1)->get();
        $page_title = 'User';
        $user = User::find($id);
        $mails = Letter::where('user_id', '=', $id)->orderBy('created_at')->limit(5)->get();
        $products = Product::where('user_id', '=', $id)->get();
        return view('admin_part.users.users_detail', compact('admin_menu_points', 'page_title', 'user', 'mails', 'products'));
    }

    public function create_user(Request $request)
    {
    }

    public function edit_user($id) // страница редактирования пользователя
    {
        $page_title = 'Edit User';
        $table_name = 'users';
        $user = User::find($id);
        /* $active_inactive_columns = Product::getActiveAndInactiveColumns();
        $active_columns = $active_inactive_columns['active_columns'];
        $inactive_columns = $active_inactive_columns['inactive_columns'];
        $columns = $active_inactive_columns['columns']; */

        $categories = Catalog_Category::all();

        $admin_menu_points = Admin_Menu::where('parent_id', '=', 1)->get();
        return view('admin_part.users.user_edit_page', compact('page_title', 'admin_menu_points', 'categories', 'user'));
    }

    public function update_user(Request $request, $id) // обновить одного пользователя
    {
    }

    public function update_users(Request $request)
    {
    }

    public function delete_user() // soft deletes
    {
    }
}
