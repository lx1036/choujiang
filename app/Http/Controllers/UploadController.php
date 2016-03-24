<?php

namespace App\Http\Controllers;

use App\Employees;
use App\EmployeesTest;
use App\Jobs\UserListImport;
use App\LuckBook;
use App\LuckyBooks;
use App\ShakeToken;
use App\VoiceUsers;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class UploadController extends Controller
{

    public function upload(UserListImport $import){
        $results = $import->get();
        var_dump($results);
    }

    public function uploadtest(Request $request){
//        set_time_limit(1000000);
        $file = $request->file('excel');
        if($file->isValid()){
            $file->move(storage_path('app'), $file->getClientOriginalName());
            $absPath = storage_path('app').'/'.$file->getClientOriginalName();
            Excel::load($absPath, function($reader){
                $results = $reader->all();
                $tmp = [];
                foreach($results as $result){
                    $tmp[$result->number] = ['number'=>$result->number, 'name'=>$result->name, 'department'=>$result->department];
//                    $tmp[] = ['number'=>$result->number, 'name'=>$result->name, 'department'=>$result->department];
                }
                DB::table('employees')->insert($tmp);
//                dd('Upload OK!!!');
//                foreach($results as $key => $result){
//                    $model = Employees::create(array('number'=>$result->number, 'name'=>$result->name, 'department'=>$result->department));
//                    if(!empty($result->number) && !empty($result->name) || !empty($result->department)){
//                        $person                = EmployeesTest::where('number', $result->number)->first();
//                        if($person){
//                            echo $result->number."<br>";
//                            continue;
//                        }else{

//                            EmployeesTest::create(array(
//                                'number' => $result->number,
//                                'name'   => $result->name,
//                                'department' => $result->department,
//                            ));
//                        echo $key."<br>";
//                            dd($key."<br>");
//                            $model = new Employees();
//                            $model->number     = $result->number;
//                            $model->name       = $result->name;
//                            $model->department = $result->department;
//                            $model->save();
//                        }
//                    }
//                }
            });

            dd('Upload OK!!!');

        }
    }

    public function tokenSetting(Request $request){
        $validator = Validator::make($request->all(), [
            'count_setting'=>'required',
            'number_person'=>'required|integer',
            'shake_token'=>'required']);
        if($validator->fails()){
//            return back()->withErrors($validator, 'shake_token')->withInput();
            return back()->withErrors($validator)->withInput();
        }
        $count_setting = Input::get('count_setting');
        $number_person = Input::get('number_person');
        $shake_token   = Input::get('shake_token');
        $times_exist   = ShakeToken::where(['is_delete'=>0, 'count_setting'=>$count_setting])->exists();
        if(!$times_exist){
            ShakeToken::create(['count_setting'=>$count_setting, 'number_person'=>$number_person, 'shake_token'=>$shake_token]);
        }else{
            ShakeToken::where(['is_delete'=>0, 'count_setting'=>$count_setting])->update(['number_person'=>$number_person, 'shake_token'=>$shake_token]);
        }
//        dd('Set Token OK!!!');
        return back()->withInput();
//        return redirect('backend/lotterymanagement');
    }

    public function tokenDelete(){
        ShakeToken::where('is_delete', 0)->update(['is_delete'=> 1]);
        return back()->withInput();
    }

    public function shakeToggle(){
        if(Input::get('start') == 'start'){
            $shake_toggle = Input::get('shake_toggle');
            $shake_obj    = ShakeToken::where(['is_delete'=> 0, 'count_setting'=>$shake_toggle])->first();
            $shake_token  = $shake_obj->shake_token;
            $times        = $shake_obj->count_setting;
            $data         = ['WECHAT_KEYWORD'=>$shake_token, 'WECHAT_TIMES'=>$times];
            if(!$this->setEnv($data)){
                return "fail to write file .env";
            }
//            Session::flash('data', $data);
            return back()->with('data',$data);
//        dd('file .env is written OK!!!');
        }else{
            $this->closeKeyWord();
            return back()->withInput();
//            return Input::get('close');
        }
    }

    public function closeKeyWord(){
        $dirty_data = Hash::make('choujiang');
        $this->setEnv(['WECHAT_KEYWORD'=>$dirty_data]);
    }

    public function setEnv($data = []){
        $env_file = base_path('.env');
        if(!file_exists($env_file)){
            return false;
        }
        $env_data = parse_ini_file($env_file);
        $env_data = array_merge($env_data, $data);
        foreach($env_data as $key=>$value){
            if(empty($value)){
                $env_data[$key] = $key.'= ';
                continue;
            }
            $env_data[$key] = $key.'='.$value;
        }
        $content  = implode($env_data, "\n");
        File::put($env_file, $content);
        return true;
    }

    public function getToken(){
        $tokens = ShakeToken::where(['is_delete'=>0])->get();
        $result = [];
        foreach($tokens as $token){
            $result[] = [
                'count_setting'=> $token->count_setting,
                'number_person' => $token->number_person,
                'shake_token'   => $token->shake_token,
            ];
        }
        return $result;
//        return ["PHP"=>"PHP", "Laravel"=>"Laravel"];
    }

    public function getVote(Request $request){
        $item_name = Config::get('wechat.item_name');
//       $vote_users = DB::table('voteusers')->where(['vote_name' => $request->get('open_id'), 'vote_times' => 1, 'is_delete' => 0])->count();
//        if(!$vote_users){
            return view('frontend.vote', ['open_id' => $request->get('open_id'), 'item_name' => $item_name]);
//        }else{
//            return view('frontend.votefalse');
//        }
    }

    public function getVoteResult(){
        $vote_results = DB::table('votes')->orderBy('vote_count', 'dsc')->get();
        if(!empty($vote_results)){
            return view('frontend.voteresult', ['vote_results' => $vote_results]);
        }
        $content = '节目投票还没开始呢,别着急啊!!!';
        return view('frontend.luckbookresultfalse', ['content'=>$content]);
    }

    public function postVote(Request $request){
        $open_id = $request->get('open_id');
        $status  = DB::table('voteusers')->where(['vote_name'=>$open_id, 'is_delete'=>0])->count();
        if($status){
            return view('frontend.votefalse');
        }
        $all = $request->all();
        unset($all['open_id']);
        if(count($all) > 3){
            $up_to_counts = 'Up to Counts';
            return redirect()->back()->with('up_to_counts', $up_to_counts);
        }
        if(count($all) == 0){
            $down_to_counts = 'Down to Counts';
            return redirect()->back()->with('down_to_counts', $down_to_counts);
        }

//        dd($all);

        foreach ($all as $item) {
            DB::table('votes')->where(['vote_checkbox_num'=>$item, 'is_delete'=>0])->increment('vote_count', 1);
        }
        $status_voteusers = DB::table('voteusers')->insert(['vote_name'=>$open_id]);
        if($status_voteusers){
            return view('frontend.voteok', ['success'=>true]);
        }else{
            return view('frontend.voteok', ['success'=>false]);
        }
    }

    public function getChart()
    {
        $result   = DB::table('votes')->select('name', 'vote_count')->where(['is_delete'=>0])->orderBy('id')->get();
        $labels   = $datasets = [];
        foreach ($result as $item) {
            $labels[]   = $item -> name;
            $datasets[] = $item -> vote_count;
        }
        $chart_data = [
            "labels"   => $labels,
            "datasets" => [
                [
                    'fillColor'   => "rgba(200,0,0,0.8)",
                    'strokeColor' => "rgba(200,0,0,1)",
                    'data'        => $datasets,
                ],
            ],
        ];
//        dd(json_encode($chart_data));
//        return view('backend.chart')->with('chart_data', json_encode($chart_data));
//        return view('backend.chart', ['chart_data' => json_encode($chart_data)]);
        return json_encode($chart_data);
    }

    public function getHighCharts()
    {
        $result         = DB::table('votes')->select('name', 'vote_count')->orderBy('name')->get();
        $labels         = $datasets = [];
        foreach ($result as $item) {
            $labels[]   = $item -> name;
            $datasets[] = [
                'y'     => $item->vote_count,
                'color' => 'red',
            ];
        }
        $chart_data = [
            'categories' => $labels,
            'data'       => $datasets,
            'drilldown'  => '',
        ];
//        dd($chart_data);
        return $chart_data;
    }

    public function getChartButton(){
        return view('backend.chart');
    }

    public function getLuckBook(){
        $current_time = strtotime(date('Y-m-d H:i:s'));
        $end_time     = strtotime('2016-3-16 24:00:00');
        if($current_time < $end_time){
            return view('frontend.luckbook');
        }else{
            return view('frontend.luckbookend');
        }
    }
    public function postLuckBook(Request $request){
        $this->validate($request, [
            'luckbook_number' => 'required',
            'luckbook_name'   => 'required',
            'luckbook_book.*' => 'required',
        ]);
        $all    = $request->all();
        $status = DB::table('luckybooks')->where(['number'=>$all['luckbook_number'], 'name' => $all['luckbook_name'], 'is_delete' => 0])->first();
//        dd($status);
        if($status){
            return view('frontend.luckbookfalse');
        }else{
            LuckyBooks::create([
                'number'      => $all['luckbook_number'],
                'name'        => $all['luckbook_name'],
                'book_name_1' => $all['luckbook_book'][0],
                'book_name_2' => $all['luckbook_book'][1],
            ]);
            return view('frontend.luckbookok');
        }
    }



    public function getAjaxWechatWall(Request $request){
        $id         = $request->get('id');
//        dd($id);
        file_put_contents(storage_path('/logs/wechat_wall_id.log'), $id);
        $msgTextArr = DB::table('users')->join('msg_text', 'users.openid', '=', 'msg_text.openid')
            ->select('users.openid', 'users.nickname', 'users.headimgurl', 'users.sex', 'msg_text.msg_type', 'msg_text.content', 'msg_text.id')
            ->where(['msg_text.is_delete'=>0])//, 'msg_text.id'=>$id])
            ->where('msg_text.id', '>=', $id)
            ->take(1)
            ->get();
//        dd($msgTextArr);
//            ->orderBy('id', 'asc')->get();

//        if(empty($msgTextArr)){
//            $msgTextArr = DB::table('users')->join('msg_text', 'users.openid', '=', 'msg_text.openid')
//                ->select('users.openid', 'users.nickname', 'users.headimgurl', 'msg_text.msg_type', 'msg_text.content', 'msg_text.id')
//                ->where('msg_text.is_delete', 0)
//                ->where('msg_text.id', '>', $id - 4)
//                ->take(4)
//                ->orderBy('id', 'asc')->get();
//        }

        if(!empty($msgTextArr)){
            return view('frontend.chat', ['msgTextArr' => $msgTextArr]);
        }
//        if(count($msgTextArr) == 4){
//            return view('frontend.chat', ['msgTextArr' => $msgTextArr]);
//        }else{
//            return view('frontend.chat', ['msgTextArr' => '']);
//        }
    }

    public function getLuckBookResult()
    {
        $luck_book_results = DB::table('luckybooks')->where(['is_delete'=>2])->orderBy('number')->get(['number', 'name', 'book_name_1', 'book_name_2']);
        if($luck_book_results){
            return view('frontend.luckbookresult', ['luck_book_results' => $luck_book_results]);
        }else{
            $title = "幸运书单奖";
            $content = '幸运书单还没开始抽奖,别着急啊!!!';
            return view('frontend.luckbookresultfalse', ['content'=>$content, 'title'=>$title]);
        }
//        dd($luck_book_results);
    }

    public function getPrizeResult()
    {
//        $prize_users = DB::table('employees')->whereIn('wintimes', [3,2,1])->get(['nickname', 'headimgurl', 'is_winner']);
        $prize_users = DB::table('employees')->whereIn('wintimes', [3,2,1])->orderBy('number')->get(['number', 'name', 'department', 'wintimes']);
//        dd($prize_users);
        $prizes = [
            'one'   =>[],
            'two'   =>[],
            'three' =>[],
        ];
        foreach ($prize_users as $prize_user) {
            $prize_user->wintimes == 1 ? ($prizes['one'][] = $prize_user) : ($prize_user->wintimes == 2 ? $prizes['two'][] = $prize_user : $prizes['three'][] = $prize_user);
        }
//        dd($prizes);
//        $content = '一二三等奖还没开始抽奖,别着急啊!!!';
//        return view('frontend.luckbookresultfalse', ['content'=>$content]);
        if(!empty($prizes)){
//            return count($prizes);
            return view('frontend.onetwothreeresult', ['prizes'=>$prizes]);
        }else{
            $title = "一二三等奖";
            $content = '一二三等奖还没开始抽奖,别着急啊!!!';
            return view('frontend.luckbookresultfalse', ['content'=>$content, 'title'=>$title]);
        }
//        dd($prizes);
//        dd($one_prize, $two_prize, $three_prize);
//        dd($prize_users);
    }

    public function getLuckyPerson()
    {
        $lucky_persons = DB::table('employees')->where(['wintimes'=>5])->orderBy('number')->get(['number', 'name', 'department']);
        if(!empty($lucky_persons)){
            return view('frontend.luckperson', ['lucky_persons'=>$lucky_persons]);
        }

        $title = '幸运奖';
        $content = '幸运奖还没开始抽奖,别着急啊!!!';
        return view('frontend.luckbookresultfalse', ['content'=>$content, 'title'=>$title]);
//        dd($lucky_person);
//        $api = url('/employee/setlucky');
//        $result = Redirect::to('/employee/setlucky');
//        dd($result);
    }

    public function getSpecialPrizePerson()
    {
        $special_persons = DB::table('employees')->where(['wintimes'=>4])->get(['number', 'name', 'department']);
//        dd($special_person);
        if(!empty($special_persons)){
            return view('frontend.specialprizeperson', ['special_persons'=>$special_persons]);
        }
        $title = '特等奖';
        $content = '特等奖大奖还没开始抽奖,别着急啊!!!';
        return view('frontend.luckbookresultfalse', ['content'=>$content, 'title'=>$title]);
    }

    public function getAllLuckyBooks()
    {
        $all_lucky_books = LuckyBooks::where(['is_delete'=>0])->paginate(50);
        return view('backend.getallluckybooks', ['all_lucky_books'=>$all_lucky_books]);
//        $all_lucky_books = DB::table('luckybooks')->where(['is_delete'=>0])->get();
//        return view('')
    }

    public function getTestAllLuckyBooks()
    {
        $all_lucky_books = LuckyBooks::where(['is_delete'=>0])->paginate(50);
//        return $all_lucky_books;
//        $all_lucky_books->setPath(url('/liuxiang/lucky'));
        return view('liuxiang.paginate.testgetallluckybooks', ['all_lucky_books'=>$all_lucky_books]);
    }

    public function getAllWechatImg()
    {
        $img_users = DB::table('users')->where(['is_delete'=>0])->get(['openid', 'headimgurl']);
        foreach ($img_users as $img_user) {
            file_put_contents(public_path('headimg.txt'), $img_user->openid."\\t".$img_user->headimgurl."\\n", FILE_APPEND);
//            set_time_limit(0);
////            return '截止到 openid:'.$img_user->openid.' headimgurl:'.$img_user->headimgurl;
//            $img_content = file_get_contents($img_user->headimgurl);
//            $status      = file_put_contents(public_path('headimg/'.$img_user->openid.'.jpg'), $img_content);
//            if(!$status){
//                dd('截止到 openid:'.$img_user->openid.' headimgurl:'.$img_user->headimgurl);
//            }
        }
        dd('全部保存在本地!!!');

    }

    public function getPrizeVoiceStop()
    {
        $results = VoiceUsers::where(['is_delete'=>0, 'openid'=>Config::get('wechat.voice_users')])->get()->last();
        DB::table('voiceusers')->where(['is_delete'=>0])->update(['is_delete'=>1]);
//        $results = VoiceUsers::where(['is_delete'=>0, 'openid'=>Config::get('wechat.voice_users')])->get()->first();
//        $results = DB::table('voiceusers')->where(['is_delete'=>0, 'openid'=>Config::get('wechat.voice_users')])->get()->last();//报错
//        $results = DB::table('voiceusers')->where(['is_delete'=>0, 'openid'=>Config::get('wechat.voice_users')])->first();
        if(!empty($results)){
            $token   = $results->token;
//        dd($token);
            if((strpos($token, '停') !== false)||(strpos($token, '当') !== false)||(strpos($token, '十') !== false)||(strpos($token, '七') !== false)){
//            if((strpos($token, '当') === false)){
                return 'true';
            }
            return 'false';
//            return 'true';
        }
        return 'empty';
//        if($status){
//            return 'true';
//        }
//        return 'false';

    }


    public function getSpecialPrize()
    {
        $prize_title = '特等奖';
        $grade       = 'Special';
        return view('choujiang.specialprize', ['prize_title'=>$prize_title, 'grade'=>$grade]);
    }
    public function getOnePrize()
    {
        $prize_title = '一等奖';
        $grade       = 'One';
        return view('choujiang.specialprize', ['prize_title'=>$prize_title, 'grade'=>$grade]);
    }
    public function getTwoPrize()
    {
        $prize_title = '二等奖';
        $grade       = 'Two';
        return view('choujiang.specialprize', ['prize_title'=>$prize_title, 'grade'=>$grade]);
    }
    public function getThreePrize()
    {
        $prize_title = '三等奖';
        $grade       = 'Three';
        return view('choujiang.specialprize', ['prize_title'=>$prize_title, 'grade'=>$grade]);
    }

    public function getLuckyPrize()
    {
        $prize_title = 'bg_sd150';
        return view('choujiang.luckybookprize', ['prize_title'=>$prize_title]);
    }

    public function getLuckyBook()
    {
        $prize_title = 'bg_sd50';
        return view('choujiang.luckybookprize', ['prize_title'=>$prize_title]);
    }
}
