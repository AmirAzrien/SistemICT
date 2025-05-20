<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

use App\Models\Permohonan;
use App\Models\User;

class MohonSeeder extends Seeder
{
    public function run(): void
    {
        $senaraiSkop = [
            'Pembangunan Sistem' => 'Sistem',
            'Perkakasan ICT' => 'Perkakasan ICT',
            'Perisian' => 'perisian',
            'Rangkaian dan Alatan Rangkaian' => 'Rangkaian dan Alatan Rangkaian',
            'Perkhidmatan ICT' => 'Perkhidmatan ICT',
            'Cloud' => 'Cloud',
        ];

        // Ambil semua pengguna type 1 (biasa)
        $penggunaBiasa = User::where('type', 1)->get();

        foreach ($penggunaBiasa as $index => $user) {
            // Pilih secara rawak dari senarai skop
            $skopList = array_keys($senaraiSkop);
            $skop = $skopList[array_rand($skopList)];

            // Jana no rujukan berdasarkan skop
            $noRujukan = $this->generateNoRujukan($skop, $senaraiSkop);

            Permohonan::create([
                'no_rujukan' => $noRujukan,
                'id_pekerja' => $user->id_pekerja,
                'jabatan' => $user->jabatan,
                'name' => $user->name,
                'skop' => $skop,
                'tajuk' => 'Permohonan Projek ' . ($index + 1),
                'keterangan' => 'Ini adalah keterangan untuk projek ke-' . ($index + 1),
                'status_sekretariat' => 'Menunggu',
                'created_at' => Carbon::now()->subDays(rand(1, 30)),
                'updated_at' => Carbon::now(),
            ]);
        }
    }

    private function generateNoRujukan(string $skop, array $kodSkopList): string
    {
        // Dapatkan kod skop berdasarkan nama
        $kodSkop = $kodSkopList[$skop] ?? 'LAIN';
        $year = now()->format('Y');

        $count = DB::table('permohonan')
            ->whereYear('created_at', $year)
            ->where('skop', $skop)
            ->count() + 1;

        $bilangan = str_pad($count, 4, '0', STR_PAD_LEFT);

        return "SUKJ/{$kodSkop}/{$year}/{$bilangan}";
    }
}
