<?php
namespace App\Http\Controllers;

use App\Models\Events;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $events = Events::latest()->get();
        $data = $events->where("user_id", auth()->user()->id);

        // Exclude tables
        $excludedTables = [
            'cache', 'cache_locks', 'codes', 'dates', 'events', 'failed_jobs', 
            'job_batches', 'jobs', 'migrations', 'password_reset_tokens', 
            'rooms', 'sessions', 'times', 'users','subscribes', 'past_events', 'event_users'
        ];

        // Prepare the query to exclude tables
        $placeholders = implode(' AND Tables_in_laravel NOT LIKE ', array_fill(0, count($excludedTables), '?'));
        $sql = "SHOW TABLES WHERE Tables_in_laravel NOT LIKE $placeholders";

        // Execute the query
        $tableNames = DB::select($sql, $excludedTables);

        $results = [];
        // check if user is in table event
        foreach ($tableNames as $table) {
            $tableName = $table->Tables_in_laravel;
            $query = DB::table($tableName)->where('user_id', auth()->user()->id);

            if ($query->exists()) {
                $results[$tableName] = $query->get();
            }
        }
        $join = [];
        foreach ($results as $tableName => $result) {
            $slug = str_replace('_', '-', strtolower($tableName));
            $join[] = Events::where('slug', $slug)->first();
        }
        // dd($data);

        return view("user.dashboard", ["title" => "My Dashboard", "data" => $data, "joins" => $join]);
    }
}
