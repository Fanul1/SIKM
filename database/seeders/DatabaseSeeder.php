<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::create([
            'name'=>'admin',
            'email'=>'admin@ukm.com',
            'role'=>'1',
            'password'=>'admin'
        ]);
        User::create(
        [ //BEM USK
            'name'=>'bemusk',
            'email'=>'adminbem@ukm.com',
            'role'=>'2',
            'password'=>'bem123'
        ]);
        User::create(
        [//DPM USK
            'name'=>'dpmusk',
           'email'=>'admindpm@ukm.com',
           'role'=>'2',
           'password'=>'dpm123'
       ]);
        User::create([
        //MPM USK
        'name'=>'mpmusk',
        'email'=>'adminmpm@ukm.com',
        'role'=>'2',
        'password'=>'mpm123'
       ]);
       User::create([
        //PA_Leuser
        'name'=>'paleuser',
        'email'=>'adminpaleu@ukm.com',
        'role'=>'2',
        'password'=>'pale123'
       ]);
       User::create([
        //MENWA
        'name'=>'menwa',
        'email'=>'adminmenwa@ukm.com',
        'role'=>'2',
        'password'=>'menwa123'
       ]);
       User::create([
        //KSR-PMI
        'name'=>'ksrpmi',
        'email'=>'adminksrpmi@ukm.com',
        'role'=>'2',
        'password'=>'ksrpmi123'
       ]);
       User::create([
        //PERS_DETAK
        'name'=>'detak',
        'email'=>'admindetak@ukm.com',
        'role'=>'2',
        'password'=>'detak123'
       ]);
       User::create([
        //PRAMUKA
        'name'=>'pramuka',
        'email'=>'adminpramuka@ukm.com',
        'role'=>'2',
        'password'=>'pramuka123'
       ]);
       User::create([
        //KEMPO
        'name'=>'kempo',
        'email'=>'adminkempo@ukm.com',
        'role'=>'2',
        'password'=>'kempo123'
       ]);
       User::create([
        //PUTROE_PHANG
        'name'=>'putroe',
        'email'=>'adminputroe@ukm.com',
        'role'=>'2',
        'password'=>'putroe123'
       ]);
       User::create([
        //TEATER_NOL
        'name'=>'teater',
        'email'=>'adminteater@ukm.com',
        'role'=>'2',
        'password'=>'teater123'
       ]);
       User::create([
        //TAEKWONDO
        'name'=>'taekwondo',
        'email'=>'admintaekwondo@ukm.com',
        'role'=>'2',
        'password'=>'taekwondo123'
       ]);
       User::create([
        //TARUNG_DRAJAT
        'name'=>'tarung',
        'email'=>'admintarung@ukm.com',
        'role'=>'2',
        'password'=>'tarung123'
       ]);
       User::create([
        //PENCAK_SILAT
        'name'=>'pencak',
        'email'=>'adminpencak@ukm.com',
        'role'=>'2',
        'password'=>'pencak123'
       ]);
       User::create([
        //KARATE
        'name'=>'karate',
        'email'=>'adminkarate@ukm.com',
        'role'=>'2',
        'password'=>'karate123'
       ]);
       User::create([
        //MERPATI_PUTIH
        'name'=>'merpati',
        'email'=>'adminmerpati@ukm.com',
        'role'=>'2',
        'password'=>'merpati123'
       ]);
       User::create([
        //BOLA_BASKET
        'name'=>'basket',
        'email'=>'adminbasket@ukm.com',
        'role'=>'2',
        'password'=>'basket123'
       ]);
       User::create([
        //Bulu tangkis
        'name'=>'bultang',
        'email'=>'adminbultang@ukm.com',
        'role'=>'2',
        'password'=>'bultang123'
       ]);
       User::create([
        //catur
        'name'=>'catur',
        'email'=>'admincatur@ukm.com',
        'role'=>'2',
        'password'=>'catur123'
       ]);
       User::create([
        //CENDEKIA
        'name'=>'cendekia',
        'email'=>'admincendekia@ukm.com',
        'role'=>'2',
        'password'=>'cendekia123'
       ]);
       User::create([
        //MUAY_THAI
        'name'=>'mutay',
        'email'=>'adminmutay@ukm.com',
        'role'=>'2',
        'password'=>'mutay123'
       ]);
       User::create([
        //PENTAQUE
        'name'=>'peque',
        'email'=>'adminpeque@ukm.com',
        'role'=>'2',
        'password'=>'peque123'
       ]);
       User::create([
        //LiterasiInformasi
        'name'=>'litfo',
        'email'=>'adminlitfo@ukm.com',
        'role'=>'2',
        'password'=>'litfo123'
       ]);
       User::create([
        //ATLETIK
        'name'=>'atlet',
        'email'=>'adminatlet@ukm.com',
        'role'=>'2',
        'password'=>'atlet123'
       ]);
       User::create([
        //TENIS LAPANGAN
        'name'=>'tenis',
        'email'=>'admintenis@ukm.com',
        'role'=>'2',
        'password'=>'tenis123'
       ]);
       User::create([
        //BPSD
        'name'=>'bpsd',
        'email'=>'adminbpsd@ukm.com',
        'role'=>'2',
        'password'=>'bpsd123'
       ]);
       User::create([
        //PADUAN_SUARA MAHASISWA
        'name'=>'paduan',
        'email'=>'adminpaduan@ukm.com',
        'role'=>'2',
        'password'=>'paduan123'
       ]);
       User::create([
        //DRUM CORPS
        'name'=>'drum',
        'email'=>'admindrum@ukm.com',
        'role'=>'2',
        'password'=>'drum123'
       ]);
    }
}
