<?php


use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $user = DB::table('users')->insertGetId([
            'name' => 'admin',
            'email' => 'admin@admin',
            'password' => bcrypt('adminadmin'),
        ]);

        $user2 = DB::table('users')->insertGetId([
            'name' => 'user',
            'email' => 'user@user',
            'password' => bcrypt('useruser'),
        ]);

        $zapato1 = DB::table('zapatos')->insertGetId([
            'codigo' => 1231233456787,
            'denominacion' => 'zapato1',
            'precio' => 54.23,
        ]);
        $zapato2 = DB::table('zapatos')->insertGetId([
            'codigo' => 5647382645362,
            'denominacion' => 'zapato2',
            'precio' => 12.34,
        ]);
        
        $zapato3 = DB::table('zapatos')->insertGetId([
            'codigo' => 4837263849568,
            'denominacion' => 'zapato3',
            'precio' => 98.43,
        ]);

        DB::table('carritos')->insert(
            ['usuario_id'=> $user,
            'zapato_id'=>$zapato1,
            'cantidad'=>2],
        );

        DB::table('carritos')->insert(
            ['usuario_id'=> $user,
            'zapato_id'=>$zapato2,
            'cantidad'=>5],
        );

        DB::table('carritos')->insert(
            ['usuario_id'=> $user2,
            'zapato_id'=>$zapato1,
            'cantidad'=>2],
        );

    }
}
