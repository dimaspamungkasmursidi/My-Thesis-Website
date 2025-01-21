<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function dashboard()
    {
        $totalBooks = Book::count();
        $totalMembers = Member::count();
        $totalAdmin = User::count();

        return view('dashboard', compact('totalBooks', 'totalMembers', 'totalAdmin'));
    }

    public function members(Request $request)
    {
        $search = $request->get('search');
        $membersQuery = member::query();
    
        if ($search) {
            $membersQuery->where('name', 'LIKE', "%{$search}%")
                         ->orWhere('email', 'LIKE', "%{$search}%");
        }
    
        $members = $membersQuery->paginate(10);
    
        return view('admin.members.index', compact('members'));
    }
    
    public function destroy($id)
    {
        $member = Member::findOrFail($id);
        $member->delete();

        return redirect()->route('members')->with('success', 'Member has been deleted successfully.');
    }
}
