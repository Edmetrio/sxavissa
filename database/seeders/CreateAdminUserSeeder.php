<?php

namespace Database\Seeders;

use App\Models\Models\Tipo;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Cossa Joaquim', 
            'email' => 'cossa@gmail.com',
            'password' => bcrypt('joaquim49')
        ]);

        User::where(['id' => $user->id])->update(['idacesso' => $user->id]);
    
        $role = Role::create(['name' => 'Admin']);
     
        $permissions = Permission::pluck('id','id')->all();
   
        $role->syncPermissions($permissions);
     
        $user->assignRole([$role->id]);

        Tipo::create([
            'id' => '3ce23584-56cc-45ce-853d-84c9965053bf',
            'users_id' => $user->id,
            'idacesso' => $user->id,
            'nome' => 'Matéria-prima', 
            'estado' => 'on'
        ]);

        Tipo::create([
            'id' => '9ed66d9f-614f-4adc-994f-a205099e95a4',
            'users_id' => $user->id,
            'idacesso' => $user->id,
            'nome' => 'Serviço', 
            'estado' => 'on'
        ]);

        Tipo::create([
            'id' => '103ee92d-83c2-4ebb-8d88-8edc53e7e1e9',
            'users_id' => $user->id,
            'idacesso' => $user->id,
            'nome' => 'Produto', 
            'estado' => 'on'
        ]);
    }
}
