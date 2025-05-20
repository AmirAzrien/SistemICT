<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            // Type 1 - Biasa
            ['name' => 'Ahmad Bin Ali', 'email' => 'ahmad.biasa1@johor.gov.my', 'type' => 1, 'jawatan' => 'Pembantu Tadbir (P/O)', 'jabatan' => 'Pejabat Setiausaha Kerajaan Johor'],
            ['name' => 'Noraini Binti Zainal', 'email' => 'noraini.biasa2@johor.gov.my', 'type' => 1, 'jawatan' => 'Penolong Pegawai Tadbir', 'jabatan' => 'Jabatan Pengairan dan Saliran'],
            ['name' => 'Zulkifli Bin Hassan', 'email' => 'zulkifli.biasa3@johor.gov.my', 'type' => 1, 'jawatan' => 'Juruteknik Komputer', 'jabatan' => 'Jabatan Perkhidmatan Veterinar'],
            ['name' => 'Aishah Binti Musa', 'email' => 'aishah.biasa4@johor.gov.my', 'type' => 1, 'jawatan' => 'Pembantu Tadbir (Kewangan)', 'jabatan' => 'Jabatan Kerja Raya Johor'],
            ['name' => 'Syafiq Bin Salleh', 'email' => 'syafiq.biasa5@johor.gov.my', 'type' => 1, 'jawatan' => 'Penolong Jurutera', 'jabatan' => 'Jabatan Perikanan Negeri Johor'],
            ['name' => 'Rohana Binti Omar', 'email' => 'rohana.biasa6@johor.gov.my', 'type' => 1, 'jawatan' => 'Pembantu Awam', 'jabatan' => 'Majlis Bandaraya Johor Bahru'],
            ['name' => 'Hafiz Bin Jamal', 'email' => 'hafiz.biasa7@johor.gov.my', 'type' => 1, 'jawatan' => 'Penolong Akauntan', 'jabatan' => 'Pejabat Tanah dan Galian Johor'],
            ['name' => 'Liyana Binti Ismail', 'email' => 'liyana.biasa8@johor.gov.my', 'type' => 1, 'jawatan' => 'Penolong Pegawai Teknologi Maklumat', 'jabatan' => 'Jabatan Alam Sekitar Johor'],
            ['name' => 'Farid Bin Amin', 'email' => 'farid.biasa9@johor.gov.my', 'type' => 1, 'jawatan' => 'Pembantu Operasi', 'jabatan' => 'Jabatan Pendidikan Negeri Johor'],
            ['name' => 'Salmah Binti Ghazali', 'email' => 'salmah.biasa10@johor.gov.my', 'type' => 1, 'jawatan' => 'Pegawai Tadbir', 'jabatan' => 'Jabatan Kesihatan Negeri Johor'],

            // Type 2 - Sekretariat
            ['name' => 'Razak Bin Daud', 'email' => 'razak.sek1@johor.gov.my', 'type' => 2, 'jawatan' => 'Penolong Pegawai Tadbir', 'jabatan' => 'Pejabat Setiausaha Kerajaan Johor'],
            ['name' => 'Siti Aminah Binti Jalil', 'email' => 'aminah.sek2@johor.gov.my', 'type' => 2, 'jawatan' => 'Pembantu Tadbir (P/O)', 'jabatan' => 'Jabatan Pengairan dan Saliran'],
            ['name' => 'Faizal Bin Rahman', 'email' => 'faizal.sek3@johor.gov.my', 'type' => 2, 'jawatan' => 'Penolong Jurutera', 'jabatan' => 'Jabatan Kerja Raya Johor'],
            ['name' => 'Nabila Binti Hamzah', 'email' => 'nabila.sek4@johor.gov.my', 'type' => 2, 'jawatan' => 'Pembantu Tadbir (Kewangan)', 'jabatan' => 'Jabatan Perikanan Negeri Johor'],
            ['name' => 'Hadi Bin Kamarudin', 'email' => 'hadi.sek5@johor.gov.my', 'type' => 2, 'jawatan' => 'Juruteknik Komputer', 'jabatan' => 'Jabatan Alam Sekitar Johor'],
            ['name' => 'Nurul Binti Izzat', 'email' => 'nurul.sek6@johor.gov.my', 'type' => 2, 'jawatan' => 'Pembantu Operasi', 'jabatan' => 'Majlis Bandaraya Johor Bahru'],
            ['name' => 'Shahrul Bin Yusof', 'email' => 'shahrul.sek7@johor.gov.my', 'type' => 2, 'jawatan' => 'Penolong Akauntan', 'jabatan' => 'Jabatan Perkhidmatan Veterinar'],
            ['name' => 'Azlina Binti Roslan', 'email' => 'azlina.sek8@johor.gov.my', 'type' => 2, 'jawatan' => 'Pegawai Tadbir', 'jabatan' => 'Pejabat Tanah dan Galian Johor'],
            ['name' => 'Firdaus Bin Mokhtar', 'email' => 'firdaus.sek9@johor.gov.my', 'type' => 2, 'jawatan' => 'Pembantu Awam', 'jabatan' => 'Jabatan Pendidikan Negeri Johor'],
            ['name' => 'Haslinda Binti Karim', 'email' => 'haslinda.sek10@johor.gov.my', 'type' => 2, 'jawatan' => 'Penolong Pegawai Teknologi Maklumat', 'jabatan' => 'Jabatan Kesihatan Negeri Johor'],

            // Type 3 - Admin
            ['name' => 'Kamal Bin Ibrahim', 'email' => 'kamal.admin1@johor.gov.my', 'type' => 3, 'jawatan' => 'Penolong Pegawai Tadbir', 'jabatan' => 'Pejabat Setiausaha Kerajaan Johor'],
            ['name' => 'Marina Binti Salleh', 'email' => 'marina.admin2@johor.gov.my', 'type' => 3, 'jawatan' => 'Pembantu Tadbir (Kewangan)', 'jabatan' => 'Jabatan Kerja Raya Johor'],
            ['name' => 'Faiz Bin Osman', 'email' => 'faiz.admin3@johor.gov.my', 'type' => 3, 'jawatan' => 'Juruteknik Komputer', 'jabatan' => 'Jabatan Perkhidmatan Veterinar'],
            ['name' => 'Rosmah Binti Ahmad', 'email' => 'rosmah.admin4@johor.gov.my', 'type' => 3, 'jawatan' => 'Penolong Akauntan', 'jabatan' => 'Jabatan Alam Sekitar Johor'],
            ['name' => 'Zainal Bin Abidin', 'email' => 'zainal.admin5@johor.gov.my', 'type' => 3, 'jawatan' => 'Pembantu Operasi', 'jabatan' => 'Jabatan Pendidikan Negeri Johor'],
            ['name' => 'Ain Binti Mohd', 'email' => 'ain.admin6@johor.gov.my', 'type' => 3, 'jawatan' => 'Penolong Jurutera', 'jabatan' => 'Jabatan Kesihatan Negeri Johor'],
            ['name' => 'Izzudin Bin Haris', 'email' => 'izzudin.admin7@johor.gov.my', 'type' => 3, 'jawatan' => 'Pegawai Tadbir', 'jabatan' => 'Majlis Bandaraya Johor Bahru'],
            ['name' => 'Lina Binti Zahari', 'email' => 'lina.admin8@johor.gov.my', 'type' => 3, 'jawatan' => 'Pembantu Tadbir (P/O)', 'jabatan' => 'Jabatan Perikanan Negeri Johor'],
            ['name' => 'Khairul Bin Nizam', 'email' => 'khairul.admin9@johor.gov.my', 'type' => 3, 'jawatan' => 'Penolong Pegawai Teknologi Maklumat', 'jabatan' => 'Jabatan Pengairan dan Saliran'],
            ['name' => 'Haliza Binti Mohamad', 'email' => 'haliza.admin10@johor.gov.my', 'type' => 3, 'jawatan' => 'Pembantu Awam', 'jabatan' => 'Pejabat Tanah dan Galian Johor'],

            // Type 4 - Super Admin
            ['name' => 'Super Admin', 'email' => 'SuperAdmin@johor.gov.my', 'type' => 4, 'jawatan' => 'Super Admin', 'jabatan' => 'Super Admin'],
            // ['name' => 'Amir Azrien', 'email' => 'AmirAzrien@johor.gov.my', 'type' => 4, 'jawatan' => 'Pegawai Tadbir', 'jabatan' => 'Pejabat Setiausaha Kerajaan Johor'],
            // ['name' => 'Fadzil Bin Iskandar', 'email' => 'fadzil.super1@johor.gov.my', 'type' => 4, 'jawatan' => 'Pegawai Tadbir', 'jabatan' => 'Pejabat Setiausaha Kerajaan Johor'],
            // ['name' => 'Nadiah Binti Halim', 'email' => 'nadiah.super2@johor.gov.my', 'type' => 4, 'jawatan' => 'Penolong Akauntan', 'jabatan' => 'Jabatan Pengairan dan Saliran'],
            // ['name' => 'Shahril Bin Fauzi', 'email' => 'shahril.super3@johor.gov.my', 'type' => 4, 'jawatan' => 'Pembantu Operasi', 'jabatan' => 'Jabatan Alam Sekitar Johor'],
            // ['name' => 'Wani Binti Azman', 'email' => 'wani.super4@johor.gov.my', 'type' => 4, 'jawatan' => 'Penolong Pegawai Teknologi Maklumat', 'jabatan' => 'Jabatan Pendidikan Negeri Johor'],
            // ['name' => 'Hakim Bin Salleh', 'email' => 'hakim.super5@johor.gov.my', 'type' => 4, 'jawatan' => 'Pembantu Tadbir (P/O)', 'jabatan' => 'Jabatan Kerja Raya Johor'],
            // ['name' => 'Rina Binti Mohd Nor', 'email' => 'rina.super6@johor.gov.my', 'type' => 4, 'jawatan' => 'Juruteknik Komputer', 'jabatan' => 'Jabatan Perkhidmatan Veterinar'],
            // ['name' => 'Zaki Bin Hamdan', 'email' => 'zaki.super7@johor.gov.my', 'type' => 4, 'jawatan' => 'Pembantu Tadbir (Kewangan)', 'jabatan' => 'Majlis Bandaraya Johor Bahru'],
            // ['name' => 'Sofea Binti Zakaria', 'email' => 'sofea.super8@johor.gov.my', 'type' => 4, 'jawatan' => 'Penolong Jurutera', 'jabatan' => 'Jabatan Perikanan Negeri Johor'],
            // ['name' => 'Nazri Bin Jalil', 'email' => 'nazri.super9@johor.gov.my', 'type' => 4, 'jawatan' => 'Penolong Pegawai Tadbir', 'jabatan' => 'Pejabat Tanah dan Galian Johor'],
            // ['name' => 'Dayang Binti Zaini', 'email' => 'dayang.super10@johor.gov.my', 'type' => 4, 'jawatan' => 'Pembantu Awam', 'jabatan' => 'Jabatan Kesihatan Negeri Johor'],
        ];

        foreach ($users as $user) {
            User::create([
                ...$user,
                'password' => Hash::make('123456789'),
            ]);
        }
    }
}
