<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Student;
use Storage;
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
            'photoFile' => 'required|image',
            'genderRadioOptions' => 'required',
            'applicant1' => 'required',
        ]);
        $photo = $request->file('photoFile');
        $newFileName = '';
        if($photo->isValid())
        {
            $newFileName = $request->input('inputStunum');
            $savePath = 'tmp/'.$newFileName;
            Storage::put($savePath,file_get_contents($photo->getRealPath()));
        }
        return response()->view('apply.confirm')->withCookie('validate','true',5);
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
        //移动图片到永久文件夹
        Storage::move('tmp/'.$request->input('inputStunum'), 'photos/'.$request->input('inputStunum'));
        return response()->view('apply.success');
    }

    /*
     * 显示所有申请
     */
    public function showApply(Request $request)
    {
        if(Auth::check())
            return response()->view('admin.list',['students' => Student::all()]);
        else
            return response()->view('errors.unauthorized');
    }

    /*
    * 管理员登录
    */
    public function adminLogin(Request $request)
    {
        if(Auth::check())
            return redirect('/admin/list');
        else
            return redirect('/auth/login');
    }

    /*
    * 管理员注销
    */
    public function adminLogout(Request $request)
    {
        Auth::logout();
        return redirect('/auth/login');
    }

    /*
     * 显示临时图片
     */
    public function showTmpPhoto(Request $request, $photoFile)
    {
        $file = Storage::get('tmp/'.$photoFile);
        return response($file, 200)
            ->header('Content-Type', Storage::mimeType('tmp/'.$photoFile));
    }

    /*
     * 显示永久图片
     */
    public function showPhoto(Request $request, $photoFile)
    {
        if(!Auth::check())
            return view('errors.unauthorized');
        $file = Storage::get('photos/'.$photoFile);
        return response($file, 200)
            ->header('Content-Type', Storage::mimeType('photos/'.$photoFile));
    }
}