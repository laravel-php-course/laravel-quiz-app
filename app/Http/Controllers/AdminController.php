<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\ChangeStatusRequest;
use App\Http\Requests\Admin\RegisterRequest;
use App\Http\Requests\Admin\VerificationCodeRequest;
use App\Http\Requests\resendRequest;
use App\Models\Admin;
use App\Models\Answer;
use App\Models\Category;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\Teacher;
use App\Models\Topic;
use App\Models\User;
use App\Services\BaseService;
use App\Services\sendEmail;
use App\Services\VerificationService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Psr\SimpleCache\InvalidArgumentException;

class AdminController extends Controller
{
    public function showLoginForm(Request $request)
    {
        if (auth()->guard('admin')->check()){
            return redirect('/admin/teachers/show/type/all');
        }else{
        return view('admin.login');
    }}

    /**
     * @throws InvalidArgumentException
     * @throws Exception
     */

    public function ShowAllQuiz(Request $request)
    {
        $quizzes = Quiz::all();

        return view('admin.all_quizzes', ['quizzes' => $quizzes]);
    }

    public function ShowQuizCreateForm()
    {
        $cat = Category::all();
        return view('admin.create_quiz')->with('category' , $cat);
    }
    public function manageUsers()
    {
        $cat = User::all();
        return view('admin.manage_users')->with('users' , $cat);
    }


    public function ShowEdit(Request $request , $quiz)
    {
        $Answers = [];
        $Questions = Question::where('quiz_id',$quiz)->get();
        foreach ($Questions as $answer ) {
            $Answer = Answer::where('question_id',$answer->id)->get();
            foreach ($Answer as $answers ) {
                $Answers[$answers->id] = $answers ;
            }

        }
        return view('admin.edit_quiz')->with(['Questions' => $Questions , 'Answers' => $Answers]);
    }

    public function handleLogin(RegisterRequest $request)
    {
        if (auth()->guard('admin')->check()){
            return redirect('/admin/teachers/show/type/all');
        }else{
        $field = $request->getField();
        $value = $request->getValue();
        $code = VerificationService::generteCode();

        $admin = Admin::where($field, $value)->first();
        Log::debug("Code: $code");
        $cacheValue = json_encode(['code' => $code, 'name' => $admin->name ?? 'ادمین عزیز', 'type' => $field]);
        VerificationService::set($value, $cacheValue, 10);
        VerificationService::sendCode($value, $field, $code);

        return view('admin.code', ['destination' => $value]);}
    }

    public function handleResendCode(resendRequest $request)
    {
        $result = VerificationService::get($request->input('destination'));
        $result = json_decode($result, true);
        $value = $request->input('destination') ;
        $code = VerificationService::generteCode();
        VerificationService::sendCode($value, $result['type'], $code);
        VerificationService::delete($request->input('destination'));
        $cacheValue = json_encode(['code' => $code, 'name' => $result['name'], 'type' => $result['type']]);
        VerificationService::set($value, $cacheValue, 2);
        return view('admin.code', ['destination' => $value, 'action' => route('admin.auth.login') ]);
    }
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     * @throws InvalidArgumentException
     */
    public function handleVerificationCode(VerificationCodeRequest $request)
    {
        $code = VerificationService::get($request->input('destination'));
        $code = json_decode($code, true);
        if ($request->input('Code') == $code['code']) {
            $type = filter_var($request->input('destination'), FILTER_VALIDATE_EMAIL) ? 'email' : 'mobile';
            $admin = Admin::where($type, $request->input('destination'))->first();
            if ($admin) {
//                dd($admin);
                Auth::guard('admin')->login($admin);
                VerificationService::delete($request->input('destination'));
                return redirect('/admin/teachers/show/type/all');
            }

        } else {
            dd($request->input('Code') , $code) ;
        }
    }



    public function showAllTeachers(Request $request, $type)
    {

        if (!in_array($type, ['UnAccept', 'Suspend']))
            $status = Teacher::STATUS;
        elseif ($type == 'UnAccept')
            $status = [Teacher::PENDING];
        else
            $status = [Teacher::SUSPEND];

        $teachers = Teacher::whereIn('status', $status)->get();
        return view('admin.allTeachers', ['teachers' => $teachers]);
    }
    public function showAllTopics(Request $request, $type)
    {

        if (!in_array($type, ['UnAccept', 'Suspend']))
            $status = Topic::STATUS;
        elseif ($type == 'UnAccept')
            $status = [Topic::PENDING];
        else
            $status = [Topic::SUSPEND];

        $topics = Topic::whereIn('status', $status)->get();
        return view('admin.all_topics', ['topics' => $topics]);
    }

    public function showOneTeacher()
    {
        return view('admin.ShowOneTeacher');
    }

    public function handleLogout()
    {
        Auth::guard('admin')->logout();
        return redirect(route('admin.auth.show.login'));
    }

    public function changeStatus(ChangeStatusRequest $request)
    {
        $teacher         = Teacher::find($request->input('id'));
        $teacher->status = $request->input('action');

        $teacher->save();
BaseService::sendMail($teacher->email , 'وضعیت شما در سایت تعغییر کرد لطفا سایت رو چک کنید');
        return response([
            'message' => "وضعیت با موفقیت تغییر کرد",
            'icon'    => Teacher::getStatusIcon($teacher->status),
            'title'   => Teacher::getPersianStatus($teacher->status)
        ], 200);
    }
    public function changeStatusTopic(ChangeStatusRequest $request)
    {
        $topic         = Topic::find($request->input('id'));
        $topic->status = $request->input('action');

        $topic->save();
        BaseService::sendMail($topic->creator->email , 'وضعیت تاپیک شما در سایت تعغییر کرد لطفا سایت رو چک کنید');
        return response([
            'message' => "وضعیت با موفقیت تغییر کرد",
            'icon'    => Topic::getStatusIcon($topic->status),
            'title'   => Topic::getPersianStatus($topic->status)
        ], 200);
    }
}
