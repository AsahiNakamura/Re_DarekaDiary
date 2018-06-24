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

    public function index()
    {
        $entry = Entry::getEntry();
        $date = Entry::getToday();
        $date = $date->format('Y年m月d日');
        // dump(isset($entry->items));//TODO

        if (isset($entry->items)) {
            return view('entry', ["data" => $entry], ["date" => $date]);
        } else {
            return view('edit', ["data" => $entry], ["date" => $date]);
        }
    }

    public function formAction(Request $request)
    {
        // $existingEntry = Entry::getEntry();
        $entry = $request["entry"];
        $url = $request->url();
        //TODO:URL末尾の切り出し処理が必要.
        // dump($url);
        // dump(preg_match('/\//',$url));
        $date = Entry::getToday();
        $date = $date->format('Y年m月d日');

        if ($entry !== '') {
            if ($url == 'edit') {
                Entry::editEntry($entry);
            } else if ($url == 'entry') {
                Entry::insertEntry($entry);
            }
        } else {
            return redirect('/');
        }

    }
}
