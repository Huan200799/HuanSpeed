<?php
namespace App\Repositories\Eloquent;
use App\Models\Product;
use App\Models\User;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Interfaces\UserRepositoryInterface;
use DB;
use Illuminate\Support\Str;
use Auth;
class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return User::class;
    }

    public function GetUser(){
        $users = $this->model->orderby('id', 'desc')->paginate(config('constraint.app.paginates'));
        return $users;
    }

    public function updateProfileUser($id, array $data){
        $result = false;
        try {
        if (!isset($data['avatar'])) {
            $users = $this->model->find($id);
            $data['avatar'] = '';
            $fileName = $users->avatar;
        }
        if ($data['avatar']) {
            $file = $data['avatar'];
            $fileName = uniqid() . '_' . $file->getClientOriginalName();
            $file->move('avatar', $fileName);
        }
        $users = $this->model->find($id);
        $users->name_user = $data['name_user'];
        $users->avatar = $fileName;
        $users->address = $data['address'];
        $users->phone = $data['phone'];
        $users->save();
        $result = true;
        } catch (Exception $exception) {

            return $result;
        }

        return $result;
    }

    public function changepassword($id, array $data){
        $result = false;
        try {
            $user = $this->model->find($id);
            if(Auth::user()->password = bcrypt($data['password'])){
            $user->password = bcrypt($data['passwordnew']);
            $user->save();
            $result = true;
        }
        else
        {
            return back()->withErrors( __('message.forgotpassword'));
        }
        } catch (Exception $exception) {

            return $result;
        }

        return $result;
    }

    public function deleteUser($id)
    {
        $data = null;
        $result = $this->model->find($id);
        if ($result) {
            $data = $result->delete();

            return $data;
        }

        return $data;
    }

}
