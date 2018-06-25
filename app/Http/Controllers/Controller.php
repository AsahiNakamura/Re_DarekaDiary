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
        $entry = Entry::getTodayEntry();
        $date = self::getDates();

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
            $date = self::getDates();
            $entry = Entry::getTodayEntry();
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
            $entry = "ざんねん, 誰かが消してしまったようですね.";
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

    /**
     * 日付取得処理
     */
    public function getDates()
    {
        $today = Entry::getToday();
        $yesterday = Entry::getYesterday($today);
        $tomorrow = Entry::getTomorrow($today);

        $today = $today->format('Y年m月d日');
        $yesterday = $yesterday->format('Y-m-d');
        $tomorrow = $tomorrow->format('Y-m-d');

        $date = [
            "today" => $today,
            "yesterday" => $yesterday,
            "tomorrow" => $tomorrow,
        ];

        return $date;
    }

    /**
     * 前日のエントリーページを表示する
     */
    public function showOldEntry($date)
    {
        $today = Entry::getToday();
        $_today = $today->format('Y-m-d');
        if ($_today == $date) {
            return redirect('/');
        }

        // 記事取得
        $entry = Entry::getOldEntry($date);

        //日付取得
        $date = Entry::changeDateFormatToCarbon($date);
        $yesterday = Entry::getYesterday($date);
        $tomorrow = Entry::getTomorrow($date);

        $today = $date->format('Y年m月d日');
        $yesterday = $yesterday->format('Y-m-d');
        $tomorrow = $tomorrow->format('Y-m-d');

        $date = [
            "today" => $today,
            "yesterday" => $yesterday,
            "tomorrow" => $tomorrow,
        ];

        return view('oldEntry', ["data" => $entry], ["date" => $date]);
    }
}
