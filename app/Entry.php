<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    protected $connection = 'mysql';
    protected $table = 'entries';

    public static function getToday()
    {
        return Carbon::today();
    }

    public static function changeDateFormatToCarbon($date)
    {
        return new Carbon($date);
    }

    public static function getYesterday($date)
    {
        $date = new Carbon($date);
        return $yesterday = $date->subDay();
    }

    public static function getTomorrow($date)
    {
        $date = new Carbon($date);
        return $tomorrow = $date->addDay();
    }

    public static function updateEntry(string $entry)
    {
        $query = self::query();
        $today = self::getToday();
        $query = self::where('created_at', '>', $today)->update(['entry' => $entry]);
    }

    public static function getTodayEntry()
    {
        $today = self::getToday();
        $entry = self::where('created_at', '>', $today)->get();

        return $entry;
    }

    public static function getOldEntry($date)
    {
        $entry = self::whereDate('created_at', '=', $date)
            ->get();

        return $entry;
    }
}
