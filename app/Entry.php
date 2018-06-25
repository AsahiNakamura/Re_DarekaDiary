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

    public static function updateEntry(string $entry)
    {
        $query = self::query();
        $today = self::getToday();
        $query = self::where('created_at', '>', $today)->update(['entry' => $entry]);
    }

    public static function getEntry()
    {
        $today = self::getToday();
        $entry = self::where('created_at', '>', $today)->get();

        return $entry;
    }
}
