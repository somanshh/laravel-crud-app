<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Rules\ContactNumber;
use App\Rules\DuplicateId;

/**
         * there are multiple methods like where , orWhere , etc. :--
         *      -where('age','>','18')
         *      -whereIn( 'clmnName' , ['values','to' , 'choose' , 'from'] )
         *      -where('city' , 'mumbai' )->orWhere('name','somansh')
         *
         *      -pluck('name')  ---> this will return all the name in an arry form
         *
         *      -whereNotNull( 'columnName' )
         *
         *      -whereDate('created_at' , '2023-12-14' )   --> this will return all the rows which were created at the mentioned date
         *
         *      -whereDay('clmnName' , '13')   ---> on this date
         *
         *      -orderBy('age' , 'asc/desc')
         *
         *      -first();    ---> this will just return us the first record/row
         *
         *      -latest();      --> '' '' latest row
         *
         *      -inRandomOrder();    --> will return us the results in random order
         *
         *      -limit(3)       --> only 3 rows will be printed
         *
         *      -limit(3)->offset(2)   ---> will return us 3 records start from id 2 ..... means 3 ,4  and 5
         *
         */

class userController extends Controller
{
    public function showUsers()
    {
        // $users = DB::table('users')->select('name' , 'email') ->get();
        // return $users;

        $users = DB::table('users')->get();
        // return $users;
        return view( 'allUsers' , [ 'users' => $users ]);

        // return response()->json($users);
    }

    public function singleUser(string $id)
    {
        $user = DB::table('users')->find($id);
        return view( 'oneUser' , ['user' => $user ] );
    }

    public function addUser( Request $data )
    {
        // $present = DB::table('users')->find($data->input('userid'));

        // if( $present ) throw new \Exception('Failed to insert data. Please enter a unique ID.');

        $data->validate(
            [
                // duplicateid and contact number are my own made validators to verify id and contact number
                'userid' => ['required' , new DuplicateId],
                'username' => 'required',
                'useremail' => 'required|email',
                'usercontact' => ['required' , new ContactNumber]
            ]
        );

        $user = DB::table('users')->insert(
            [
                'id' => $data->input('userid'),
                'name' => $data->input('username'),
                'email' => $data->input('useremail'),
                'contact' => $data->input('usercontact'),
                'status' => $data->input('userstatus'),
            ]);

        return redirect('/');
        // $user = DB::table('users')->insertOrIgnore..;

        /*                              ***** upsert ****
        *        so basically '' upsert === update & insert '', if the mentioned column in 2nd parameter is unique than data will be
        *        inserted else it will be updated according to the 3rd parameter
        */
        // DB::table('users')->upsert(['valuesToBeAdded ex-> id,name,etc'],
        // ['nameOfTheUniqueColmun'] ,
        // ['optional 3rd param. here , if it will update anything , then columnMentioned here will be updated']);

        // dd($user);
        if( $user ) echo "<h1> data successfully added </h1>";
        else echo "<h1>hell no!</h1>";
    }

    // public function insertData( Request $data )
    // {
    //     $data->validate(
    //         [
    //             // duplicateid and contact number are my own made validators to verify id and contact number
    //             'userid' => ['required' , new DuplicateId],
    //             'username' => 'required',
    //             'useremail' => 'required|email',
    //             'usercontact' => ['required' , new ContactNumber]
    //         ]
    //     );

    //     $user = DB::table('users')->insert(
    //         [
    //             'id' => $data->input('userid'),
    //             'name' => $data->input('username'),
    //             'email' => $data->input('useremail'),
    //             'contact' => $data->input('usercontact'),
    //             'status' => $data->input('userstatus'),
    //         ]);

    //     return response()->json( 200, $headers);
    // }

    public function updateUser(Request $newdata, $id)
    {
        $user = DB::table('users')
                        ->where('id' , $id)
                        ->update([
                            'name' => $newdata->username,
                            'email' => $newdata->useremail,
                            'contact' => $newdata->usercontact,
                            'status' => $newdata->userstatus
                        ]);

        if($user) return redirect()->route('showusers');
        else echo "<h1>Please try Again !</h1>";

        // $user = DB::table('users')->where('id',2)->increment/decrement('age');  // this will increment age of mentioned column by 1
    }

    public function updateHelper($id)
    {
        $data = DB::table('users')->find($id);

        return view('updateUserForm' , [ 'data' => $data ]);

    }


    public function deleteUser( $id )
    {
        $user = DB::table('users')->where( 'id' , $id )->delete();

        return view( 'allUsers' ,[ 'users' => DB::table('users')->get()]);
    }

}

        // dd($users);     // used in debugging the data

        // dump($users); // also used to debug the data , but it will allow the next written code to run . ***dd($users)*** will not allow it.
