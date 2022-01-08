<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            /* 'regra-listar', */
            'regra-criar',
            'regra-alterar',
            'regra-apagar',
            /* 'categoria-listar', */
            'categoria-criar',
            'categoria-alterar',
            'categoria-apagar',
            'subcategoria-criar',
            'subcategoria-alterar',
            'subcategoria-apagar',
            'artigo-criar',
            'artigo-alterar',
            'artigo-apagar',
            'materia-criar',
            'composicao-criar',
            'estoque',
            'aumento-criar',
            'utilizador',
            'venda'
         ];
      
         foreach ($permissions as $permission) {
              Permission::create(['name' => $permission]);
         }
    }
}
