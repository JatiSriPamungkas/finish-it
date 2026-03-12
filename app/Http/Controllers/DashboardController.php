<?php
namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function getCompletedTasksByRole()
    {
        $myId = Auth::id(); // Ambil ID user yang login (misal 21)

        if (! $myId) {
            return redirect('/login')
                ->with('status', 'User not Authenticate yet!')
                ->with('type', 'error')
                ->with('icon', 'M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z');
        }

        $completedTasks = Task::where('status_id', 1)
            ->whereIn('project_id', function ($query) use ($myId) {
                $query->select('project_id')
                    ->from('project_members')
                    ->where('user_id', $myId);
            })
            ->count();

        // dd($completedTasks);
        return view('pages::dashboard', compact('completedTasks'));
    }
}
