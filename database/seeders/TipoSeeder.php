<?php

namespace Database\Seeders;

use App\Models\Models\Tipo;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class TipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Samuel Sibia', 
            'email' => 'samuel@gmail.com',
            'password' => bcrypt('joaquim49')
        ]);

        User::where(['id' => $user->id])->update(['idacesso' => $user->id]);
    
        /* $role = Role::create(['name' => 'Admin']);
 */
        $roles = Role::where(['name', 'Admin']); 
     
        /* $permissions = Permission::pluck('id','id')->all(); */
   
        /* $roles->syncPermissions($permissions); */
     
        $user->assignRole([$roles->id]);

        /* Tipo::create([
            'id' => '3ce23584-56cc-45ce-853d-84c9965053bf',
            'users_id' => $user->id,
            'idacesso' => $user->id,
            'nome' => 'Matéria-prima', 
            'estado' => 'on'
        ]); */
    }
}
