<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AccountSetup\AllClass;
use App\Models\AccountSetup\Group;
use App\Models\AccountSetup\Ledger;
use App\Models\AccountSetup\SubGroup;
use Illuminate\Http\Request;
use Carbon\Carbon;


class AccountSetupController extends Controller
{
    /////////////// class ///////////////
    public function manageClass()
    {
        $classes = AllClass::all()->sortByDesc('id')->values();
        return view('account_setup.class.class_table', compact('classes'));
    }

    public function storeClass(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:all_classes',
            'description' => 'required',
        ]);

        AllClass::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        return redirect()->route('admin.manage.class')->with('message', 'Class Added Successfully');
    }
    public function editClass($id)
    {
        $class = AllClass::find($id);
        return view('account_setup.class.edit_class', compact('class'));
    }
    public function updateClass(Request $request, $id)
    {
        $class = AllClass::find($id);
        $class->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        return redirect()->route('admin.manage.class')->with('message', 'Class Updated');
    }
    public function deleteClass($id)
    {
        $class = AllClass::find($id);
        $class->delete();
        return redirect()->route('admin.manage.class')->with('error', 'Class deleted');
    }

    /////////////// group ///////////////
    public function manageGroup()
    {
        // dd('here');
        $classes = AllClass::with('group')->orderBy('id', 'desc')->get();
        // dd($classes);
        $groups = Group::with('allClass')->orderBy('id', 'desc')->get();
        return view('account_setup.group.group_table', compact('groups', 'classes'));
    }

    public function storeGroup(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:groups|max:20',
            'description' => 'required',
            'class_id' => 'required',
        ]);
        Group::create([
            'name' => $request->name,
            'description' => $request->description,

            'all_class_id' => $request->class_id,
        ]);
        return redirect()->route('admin.manage.group')->with('message', 'group added successfully');
    }

    public function editGroup($id)
    {
        $group = Group::find($id);
        return view('account_setup.group.edit_group', compact('group'));
    }
    public function updateGroup(Request $request, $id)
    {
        $group = Group::find($id);
        $group->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        return redirect()->route('admin.manage.group')->with('message', 'group Updated Successfully');
    }
    public function deleteGroup($id)
    {
        $group = Group::find($id);
        $group->delete();
        return redirect()->route('admin.manage.group')->with('error', 'group Deleted');
    }

    /////////////// sub-group ///////////////
    public function manageSubGroup()
    {
        // dd('here');
        $groups = Group::with('subGroup')->orderBy('id', 'desc')->get();
        $subGroups = SubGroup::with('group')->orderBy('id', 'desc')->get();
        return view('account_setup.sub_group.sub_group_table', compact('groups', 'subGroups'));
    }

    public function storeSubGroup(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:sub_groups',
            'description' => 'required',

            'group_id' => 'required',
        ]);

        SubGroup::create([
            'name' => $request->name,
            'description' => $request->description,

            'group_id' => $request->group_id,
        ]);
        return redirect()->route('admin.manage.sub-group')->with('message', 'Sub-group added successfully');
    }
    public function editSubGroup($id)
    {
        $subGroup = SubGroup::find($id);
        return view('account_setup.sub_group.edit_sub_group', compact('subGroup'));
    }
    public function updateSubGroup(Request $request, $id)
    {
        $subGroup = SubGroup::find($id);
        $subGroup->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        return redirect()->route('admin.manage.sub-group')->with('message', 'Sub-group updated');
    }
    public function deleteSubGroup($id)
    {
        $subGroup = SubGroup::find($id);
        $subGroup->delete();
        return redirect()->back()->with('error', ' Sub-group deleted');
    }

    /////////////// ledger ///////////////
    public function manageLedger()
    {
        $subGroups = SubGroup::with('ledger')->orderBy('id', 'desc')->get();
        $ledgers = Ledger::with('subGroup')->orderBy('id', 'desc')->get();
        return view('account_setup.ledger.ledger_table', compact('subGroups', 'ledgers'));
    }

    public function storeLedger(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',

            'sub_group_id' => 'required',
        ]);
        Ledger::create([
            "name" => $request->name,
            "description" => $request->description,
            "sub_group_id" => $request->sub_group_id,
        ]);
        return redirect()->route('admin.manage.ledger')->with('message', 'Ledger added succefully');
    }
    public function editLedger($id)
    {
        $ledger = Ledger::find($id);
        return view('account_setup.ledger.edit_ledger', compact('ledger'));
    }
    public function updateLedger(Request $request, $id)
    {
        $ledger = Ledger::find($id);
        $ledger->update([
            "name" => $request->name,
            "description" => $request->description,
        ]);
        return redirect()->route('admin.manage.ledger')->with('message', 'ledger updated');
    }
    public function deleteLedger($id)
    {
        $ledger = Ledger::find($id);
        $ledger->delete();
        return redirect()->route('admin.manage.ledger')->with('error', 'ledger deleted');
    }

    ///////////////// Journal entry ///////////////
    public function manageJournal()
    {
        // return ( Carbon::now() );

        dd('here');
        $Journal = AllClass::with('group')->orderBy('id', 'desc')->get();
        // dd($Journal);
        $groups = Group::with('allClass')->orderBy('id', 'desc')->get();
        return view('account_setup.journal.journal_table', compact('groups', 'Journal'));
    }

    public function storeJournal(Request $request)
    {
        dd('here');
        $request->validate([
            'name' => 'required|unique:groups|max:20',
            'description' => 'required',
            'class_id' => 'required',
        ]);
        Group::create([
            'name' => $request->name,
            'description' => $request->description,
            'all_class_id' => $request->class_id,
        ]);
        return redirect()->route('admin.manage.group')->with('message', 'group added successfully');
    }

    public function editJournal($id)
    {
        dd('here');
        $group = Group::find($id);
        return view('account_setup.journal.edit_journal', compact('group'));
    }

    public function updateJournal(Request $request, $id)
    {
        dd('here');
        $group = Group::find($id);
        $group->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        return redirect()->route('admin.manage.journal')->with('message', 'journal Updated Successfully');
    }

    public function deleteJournal($id)
    {
        dd('here');
        $group = Group::find($id);
        $group->delete();
        return redirect()->route('admin.manage.journal')->with('error', 'journal Deleted');
    }
}
