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

    public function members()
    {
        $members = member::paginate(10);

        return view('admin.members.index', compact('members'));
    }


    public function destroy($id)
    {
        $member = User::findOrFail($id);
        $member->delete();

        return redirect()->route('admin.members.index')->with('success', 'Member has been deleted successfully.');
    }
}
