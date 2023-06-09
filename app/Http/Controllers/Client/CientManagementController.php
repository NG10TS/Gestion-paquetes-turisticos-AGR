<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CientManagementController extends Controller
{
    //
    public function index()
    {
        $user_table = User::all();
        return view ('usermanagement.usertable',compact('user_table'));
    }

    // update record
    public function updateRecord(Request $request)
    {
        DB::beginTransaction();
        try {
        
           $updateRecord = [
                'name' => $request->name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
           ];

           User::where("user_id", $request->user_id)->update($updateRecord);
           Toastr::success('Updated user successfully :)','Success');
           DB::commit();
           return redirect()->back();
        } catch(\Exception $e) {
            DB::rollback();
            Toastr::error('fail, User Update :)','Error');
            return redirect()->back();
        }
    }

    /** delete record */
    public function deleteRecord(Request $request)
    {
        try {

            User::destroy($request->id);
            Toastr::success('User deleted successfully :)','Success');
            return redirect()->back();
        
        } catch(\Exception $e) {

            DB::rollback();
            Toastr::error('User delete fail :)','Error');
            return redirect()->back();
        }
    }
}
