<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Student;
use Storage;
use Excel;
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
            'campus' => 'required',
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
        $student->campus = $request->input('campus');
        $student->applicant1 = $request->input('applicant1');
        $student->applicant2 = $request->input('applicant2');
        $student->applicant3 = $request->input('applicant3');
        $student->save();
        //移动图片到永久文件夹
        Storage::move('tmp/'.$request->input('inputStunum'), 'photos/'.$request->input('inputStunum'));
        return response()->view('apply.success');
    }

    /*
     * 显示申请
     */
    public function showApply(Request $request, $campus)
    {
        if(Auth::check())
        {
            if($campus == "all")
                return response()->view('admin.list',['campus' => $campus, 'students' => Student::all()]);
            else
                return response()->view('admin.list',['campus' => $campus,
                    'students' => Student::where('campus',$campus)->get()]);
        }
        else
            return response()->view('errors.unauthorized');
    }

    /*
    * 管理员登录
    */
    public function adminLogin(Request $request)
    {
        if(Auth::check())
            return response()->view('admin.index');
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

    /*
     * 导出申请列表全部数据
     */
    public function exportList(Request $request, $campus)
    {
        if(!Auth::check())
            return view('errors.unauthorized');
        $excelTitle = "申请列表";
        if($campus == "all")
            $rows = Student::all();
        else
        {
            $rows = Student::where('campus',$campus)->get();
            $excelTitle = $excelTitle."（".$campus."）";
        }
        Excel::create($excelTitle,function($excel) use ($rows, $excelTitle) {
            $excel->sheet($excelTitle,function($sheet) use ($rows) {
                //导入数据
                $sheet->fromArray($rows);
                //设置表头
                $sheet->row(1,array(
                    '编号','姓名','Email','手机','学号','性别','校区','第一志愿','第二志愿','第三志愿','创建日期',
                    '最后更新日期'
                ));
                //设置列宽
                $sheet->setWidth(array(
                    'C'     =>  20,  //email
                    'D'     =>  12,  //tel
                    'H'     =>  12,  //applicant
                    'I'     =>  12,
                    'J'     =>  12,
                    'K'     =>  18,  //time
                    'L'     =>  18,
                ));
            });
        })->download('xls');
    }
}