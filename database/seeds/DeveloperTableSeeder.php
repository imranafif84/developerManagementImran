<?php

use Illuminate\Database\Seeder;
use App\Developer;

class DeveloperTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $developer = new Developer;
        $developer->firstname = "Ajay";
        $developer->lastname = "Devygn";
        $developer->email = "ajay.devygn@yahoo.com";
        $developer->phoneno = "8733093788";
        $developer->address = "Mumbai, India";
        $developer->save();

        $developer = new Developer;
        $developer->firstname = "Zlatan";
        $developer->lastname = "Ibrahimovic";
        $developer->email = "zlatan@yahoo.com";
        $developer->phoneno = "998033983309";
        $developer->address = "Milan, Italy";
        $developer->save();
    }
}
