<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Student;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ApplyController extends Controller
{
    /*
     * 显示已有申请信息
     */
    public function index(Request $request)
    {

    }

    /*
     *验证新的申请
     */
    public function validateApply(Request $request)
    {
        $request->flash();
        $this->validate($request, [
            'inputName' => 'required|max:255',
            'inputStunum' => 'required|digits_between:8,10',
            'inputTel' => 'required|digits:11',
            'inputEmail' => 'required|email',
            'genderRadioOptions' => 'required',
            'applicant1' => 'required',
        ]);
        return response()->view('apply.confirm')->withCookie('validate','true');
    }

    /*
     * 确认并保存新的申请
     */
    public function confirm(Request $request)
    {
        if($request->cookie('validate') != 'true')
            return view('errors.unauthorized');
        if(count(Student::where('stunum',$request->input('inputStunum'))->get()) > 0)
            return view('errors.multistunum');
        $student = new Student;
        $student->name = $request->input('inputName');
        $student->email = $request->input('inputEmail');
        $student->tel = $request->input('inputTel');
        $student->stunum = $request->input('inputStunum');
        $student->gender = $request->input('genderRadioOptions') == '男' ? 'Male' : 'Female';
        $student->applicant1 = $request->input('applicant1');
        $student->applicant2 = $request->input('applicant2');
        $student->applicant3 = $request->input('applicant3');
        $student->applicant4 = $request->input('applicant4');
        $student->save();
        return response()->view('apply.success');
    }

    /*
     * 显示所有申请
     */
    public function showApply(Request $request)
    {
        return response()->view('admin.list',['students' => Student::all()]);
    }
}
