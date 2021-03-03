<?php
use App\User;
use App\Cliente;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UsuariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete(); //elimina la tabla por las claves foraneas      
        //User::truncate(); // Evita duplicar datos , trunca  la tabla
        $usuarios = new User();
        $usuarios->name = "Angelo Ponce";
        $usuarios->email = "Angeloponce25@gmail.com";
        $usuarios->password = '$2y$10$vPEZ8/lym.bn70UNYDaHU.Tba4k751Rq6MVh8HGlWBL710wjUujQ6';        
        $usuarios->save();
    }
}
