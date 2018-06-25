<?php

namespace App\Http\Controllers;

use App\Entry;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(Request $request)
    {
        $entry = Entry::getEntry();
        $date = Entry::getToday();
        $date = $date->format('Y年m月d日');

        if ($entry->count() > 0) {
            return view('entry', ["data" => $entry], ["date" => $date]);
        } else {
            return view('edit', ["data" => $entry], ["date" => $date]);
        }
    }

    /**
     * フォームリクエストからの処理分岐
     */
    public function formAction(Request $request)
    {
        $entry = $request["entry"];
        $url = self::getUrl($request);

        if ($url == 'edit') {
            //既存記事の修正ページへの繊維
            $entry = Entry::getEntry();
            $date = Entry::getToday();
            $date = $date->format('Y年m月d日');
            return view('edit', ["data" => $entry], ["date" => $date]);

        } else if ($url == 'entry') {
            //新規登録
            if (isset($entry)) {
                $query = new Entry;
                $query->entry = $entry;
                $query->save();
            } else {
                return redirect('/');
            }
        }

        return redirect('/');
    }

    /**
     * 既存記事の修正
     */
    public function update(Request $request)
    {
        $entry = $request["entry"];
        if (!isset($entry)) {
            $entry = "";
        }
        Entry::updateEntry($entry);

        return redirect('/');
    }

    /**
     * リクエスト元のURL末尾を取得する
     */
    public function getUrl(Request $request)
    {
        $url = $request->url();
        $pattern = '/\//';

        if (preg_match($pattern, $url)) {
            $result = preg_split($pattern, $url);
            $url = (string) $result[3];
        }
        return $url;
    }
}
