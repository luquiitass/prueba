<?php

/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 09/10/16
 * Time: 09:34
 */
namespace App;

trait Administradores
{

    public function users(){
        return $this->belongsToMany(User::class)->withTimestamps();
    }


    public function t_addAdministradores($users)
    {
        if (is_array($users)) {
            foreach ($users as $user) {
                $this->users()->attach($user);
            }
        }else
        {
            $this->users()->attach($users);
        }
    }

    public function removeAdministradores()
    {
        $this->users()->detach();
    }


    public function html_selectUser(){
        $users= array();
        $us = array();
        foreach ($this->users as $user){
            $users[$user->id] = $user->nombre;
            $us[] = $user->id;
        }
        return view('otros.selectUser',compact('us','users'))->render();
    }

    public function html_selectAdministradoes(){
        $users= array();
        $us = array();
        foreach ($this->administradores as $user){
            $users[$user->id] = $user->nombre;
            $us[] = $user->id;
        }
        return view('otros.selectUser',compact('us','users'))->render();
    }

}