<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Contact;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Null_;

class ContactsController extends Controller
{
    public function contacts(){
        $data['items']=Contact::all();
        $data['count']=Contact::where('status',0)->count();
        return view('admin.contacts.contacts',$data);
    }
    // đã xem
    public function tick(Request $request){

        $finds=Contact::find($request->idRead);
        if($finds->status==0)
        {
            $data['item']=  DB::table('contact')
                ->where('id',$finds->id )
                ->update(['status' => 1]);
        }
        else{
            $data['item'] = DB::table('contact')
                ->where('id',$finds->id )
                ->update(['status' => 0]);

        }

        $data['item'] = DB::table('contact')->where('id',$finds->id )->first();

        return response()->json([
            "status" => true,
            "html" => view("admin.contacts._imgajax",$data)->render(),
        ]);
//        return redirect()->route('admin.contacts.contacts');
//        return view('admin.contacts.contacts',$data);

    }
    //loai form mini
    public function loadAjax(Request $request){
        $idRead = $request->idRead;
        $detailRead=Contact::where('id',$idRead)->first();
        $items=  DB::table('contact')
            ->where('id', $detailRead->id)
            ->update(['status' => 1]);
        return response()->json([
            "status" => true,
            "html" => view("admin.contacts._ajax", ["detailRead" => $detailRead])->render(),
        ]);
//        return json_encode($detailRead);
    }

    public function read(){
        return view('admin.contacts.dread');
    }
    public function send($id,Request $request){
        $sends=Contact::where('id',$id)->first();
        return view('admin.contacts.read',["send" => $sends]);
    }
    //xoa mềm
    public function dell($id){
        Contact::where('id', $id)->delete();
        return redirect()->route('admin.contacts.contacts');
    }
    // thùng rác
    public function bin(){
        $data['items']=Contact::onlyTrashed()->where('deleted_at','!=',Null)->get();
//        print_r(Contact::onlyTrashed()->where('id', 15)->get()->toArray());
        return view('admin.contacts.bin',$data);
    }
    //khong phai thung rác
    public function back($id){
        Contact::where('id', $id)->restore();
        return redirect()->route('admin.contacts.contacts');
    }
    //xóa vĩnh viễn
    public function focusDell($id){
        Contact::where('id', $id)->forceDelete();
        return redirect()->route('admin.contacts.bin');
    }
    //gởi mail
    public function sendMail(Request $request){
        $data=['mail'=>$request->name,'commet'=>$request->detail];
       $Oks= Mail::send('auth.mail', $data, function ($msg) {
            $msg->from('mrphong678@gmail.com','Magblog');
            $msg->to(Input::get('name'),'Bạn tôi')->subject(Input::get('subject'));
        });
        if($Oks) {
            $request->session()->flash('msg', 'Có lỗi khi gởi');
            return redirect()->route('admin.contacts.contacts');
        }else{
            $request->session()->flash('msg','Gởi thành công');
            return redirect()->route('admin.contacts.contacts');
        }
    }
}
