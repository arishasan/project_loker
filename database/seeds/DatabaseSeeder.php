<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $user = new \App\User;
        $user->nama = 'Aris Hasan Ubaidillah';
        $user->category = 'Fulltime';
        $user->email = 'aris@admin.com';
        $user->password = bcrypt('admin');
        $user->no_telpon = '083817122289';
        $user->alamat = 'Cilaku';
        $user->aktif = 'Ya';
        $user->save();

        $user = new \App\User;
        $user->nama = 'Hasan';
        $user->category = 'Fulltime';
        $user->email = 'aris@owner.com';
        $user->password = bcrypt('owner');
        $user->no_telpon = '087820007444';
        $user->alamat = 'Cianjur';
        $user->aktif = 'Ya';
        $user->save();

    }
}
