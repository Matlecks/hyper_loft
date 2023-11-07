<?php

namespace App\Http\Controllers;

use App\Models\Admin_Menu;
use Illuminate\Http\Request;
use App\Models\Letter;
use Illuminate\Support\Facades\Mail;
use App\Mail\Message;
use Illuminate\Support\Facades\DB;

class MailController extends Controller
{
    public function index_mail() // общая страница
    {
        $admin_menu_points = Admin_Menu::where('parent_id', 1)->get();
        $page_title = 'Letter';
        $cur_stat = "inbox";
        $categories = ['inbox', 'outbox', 'starred', 'spam', 'trash', 'draft'];
        $counts = Letter::whereIn('category', $categories)
            ->select('category', DB::raw('count(*) as count'))
            ->groupBy('category')
            ->pluck('count', 'category');
        $mails = Letter::all();
        return view('admin_part.email.email_list', compact('admin_menu_points', 'page_title', 'mails', 'counts', 'cur_stat'));
    }

    public function filter_mail(Request $request, $status)  // фильтрует письма на общей странице
    {
        $admin_menu_points = Admin_Menu::where('parent_id', 1)->get();
        $page_title = $status;
        $categories = ['inbox', 'outbox', 'starred', 'spam', 'trash', 'draft'];
        $labels = ['read', 'unread', 'social', 'promotions', 'updates', 'forums'];
        $field = in_array($status, $categories) ? 'category' : 'label';
        $counts = Letter::whereIn('category', $categories)
            ->select('category', DB::raw('count(*) as count'))
            ->groupBy('category')
            ->pluck('count', 'category');
        $mails = Letter::where($field, $status)->get();
        $cur_stat = $status;
        return view('admin_part.email.email_list', compact('admin_menu_points', 'page_title', 'mails', 'counts', 'cur_stat'));
    }

    public function show_mail() // детальная страница письма
    {
        $admin_menu_points = Admin_Menu::where('parent_id', '=', 1)->get();
        $page_title = 'Inbox';


        return view('admin_part.email.email_detail', compact('admin_menu_points', 'page_title'));
    }

    public function create_mail(Request $request)
    {
        $message = new Letter();

        $message->to = ($request->to);
        $message->title = ($request->title);
        $message->message = ($request->message);
        $message->status = "status";
        $message->category = "outbox";

        $message->save();

        $mm = new Message($request);
        Mail::to($request->to)->send(new Message($request));


        /* $user = User::where('email', '=', 'damir-khaybulin@mail.ru')->first(); */

        /* Notification::send($user, new PhoneCallBid($request)); */


        return redirect()->back();
    }

    public function edit_mail() // страница редактирования письма
    {
    }

    public function update_mail(Request $request, $id) // обновить одно письмо через всплывающее меню справа таблицы
    {
        Letter::where('id', $id)
            ->update(['category' => $request->category]);

        return redirect()->back();
    }

    public function update_mails(Request $request)
    {
        $ids = explode(',', $request->letters_id);
        $newIds = [];
        foreach ($ids as $id) {
            $id = str_replace('checkbox_', '', $id);
            $newIds[] = $id;
        }

        $categories = ['inbox', 'outbox', 'starred', 'spam', 'trash', 'draft'];
        $labels = ['read', 'unread', 'social', 'promotions', 'updates', 'forums'];

        $field = in_array($request->action, $categories) ? 'category' : 'label';

        Letter::whereIn('id', $newIds)
            ->update([$field => $request->action]);

        return redirect()->back();
    }

    public function delete_mail() // soft deletes
    {
    }
}
