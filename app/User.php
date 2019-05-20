<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Contact;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function addUser($request){

        $contact = new Contact();
                           
        $contact['cidade'] = $request['cidade'];
        $contact['rua'] = $request['rua'];
        $contact['uf'] = $request['uf'];
        $contact->save();

        $dataForm = new User();

        $dataForm['name'] = $request['name'];
        $dataForm['email'] = $request['email'];
        $dataForm['contact_id'] = $contact['id'];
        $dataForm['password']= bcrypt($request['password']);
        $dataForm->save();

        return $dataForm;
    }

    public function updateUser($request, $id){

        $contact = Contact::findOrFail($id);
                           
        $contact['cidade'] = $request['cidade'];
        $contact['rua'] = $request['rua'];
        $contact['uf'] = $request['uf'];
        $contact->update();

        $dataForm = User::findOrFail($id);

        $dataForm['name'] = $request['name'];
        $dataForm['email'] = $request['email'];
        $dataForm['contact_id'] = $contact['id'];
        $dataForm['password']= bcrypt($request['password']);
        $dataForm->update();

        return $dataForm;
    }
}
