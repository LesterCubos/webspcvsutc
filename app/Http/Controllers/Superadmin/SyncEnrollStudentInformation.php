<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\SuperRecLog;

class SyncEnrollStudentInformation extends Controller
{
    public function syncData()
    {
        $users = User::all();

        $students = DB::connection('mysql2')->table('enrollstudentinformation')->get();

        $existingStudentNumbers = User::all()->pluck('studentNumber')->toArray();

        $studentsToImport = $students->filter(function ($student) use ($existingStudentNumbers) {
            return !in_array($student->studentNumber, $existingStudentNumbers);
        });

        foreach ($studentsToImport as $student) {
            $studentAccount = new User();
            $temporaryPassword =  $studentAccount->generateRandomPassword();
            $studentAccount->studentNumber = $student->studentNumber;
            $studentAccount->firstName = $student->firstName;
            $studentAccount->lastName = $student->lastName;
            $studentAccount->middleName = $student->middleName;
            $studentAccount->suffix = $student->suffix;
            $studentAccount->street = $student->street;
            $studentAccount->barangay = $student->barangay;
            $studentAccount->municipality = $student->municipality;
            $studentAccount->province = $student->province;
            $studentAccount->dateOfBirth = $student->dateOfBirth;
            $studentAccount->gender = $student->gender;
            $studentAccount->religion = $student->religion;
            $studentAccount->citizenship = $student->citizenship;
            $studentAccount->status = $student->status;
            $studentAccount->guardian = $student->guardian;
            $studentAccount->mobilePhone = $student->mobilePhone;
            $studentAccount->email = $student->email;
            $studentAccount->yearAdmitted = $student->yearAdmitted;
            $studentAccount->semesterAdmitted = $student->SemesterAdmitted;
            $studentAccount->course = $student->course;
            $studentAccount->cardNumber = $student->cardNumber;
            $studentAccount->studentincrement = $student->studentincrement;
            $studentAccount->lastupdate = $student->lastupdate;
            $studentAccount->highschool = $student->highschool;
            $studentAccount->curriculumid = $student->curriculumid;
            $studentAccount->password = Hash::make($temporaryPassword);
            $studentAccount->tempPassword = $temporaryPassword;
            $studentAccount->save();
        }

        $act = new SuperRecLog();
        $act->actname =  'Sync User';
        $act->actinfo =  'Sync Student Account';
        $act->save();

        // Return a redirect response to the previous page
        return redirect()->back()->with('notif.success', 'Data transfer completed successfully');
    }
}
