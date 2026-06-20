<?php

namespace Tests\Feature;

use App\Models\Dokter;
use App\Models\JadwalPeriksa;
use App\Models\Poli;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PoliScheduleTest extends TestCase
{
    use RefreshDatabase;

    public function test_pasien_can_see_doctor_schedules()
    {
        // 1. Create a Poli
        $poli = Poli::create([
            'nama_poli' => 'Poli Umum',
            'keterangan' => 'Poli Umum',
        ]);

        // 2. Create a User for the Doctor
        $userDokter = User::create([
            'nama' => 'Dr. Budi',
            'email' => 'budi@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'dokter',
            'id_poli' => $poli->id,
        ]);

        // 3. Create a Dokter record
        $dokter = Dokter::create([
            'user_id' => $userDokter->id,
            'nama' => $userDokter->nama,
            'alamat' => 'Alamat Budi',
            'no_hp' => '08123456789',
        ]);

        // 4. Create a JadwalPeriksa record
        $jadwal = JadwalPeriksa::create([
            'dokter_id' => $dokter->id,
            'hari' => 'Senin',
            'jam_mulai' => '08:00:00',
            'jam_selesai' => '10:00:00',
            'status' => 'aktif',
        ]);

        // 5. Create a Patient User
        $pasien = User::create([
            'nama' => 'Pasien Test',
            'email' => 'pasien@test.com',
            'password' => bcrypt('password'),
            'role' => 'pasien',
        ]);

        // 6. Act: Access the poli registration page
        $response = $this->actingAs($pasien)->get(route('pasien.daftar-poli'));

        // 7. Assert: Check if the schedule is present in the view
        $response->assertStatus(200);
        $response->assertViewHas('jadwals', function ($jadwals) use ($jadwal) {
            return $jadwals->contains('id', $jadwal->id);
        });

        // Also check if the doctor's name is correctly rendered (optional but good for view verification)
        $response->assertSee('Dr. Budi');
        $response->assertSee('data-poli="' . $poli->id . '"', false);
    }

    public function test_pasien_can_submit_registration()
    {
        // 1. Setup data
        $poli = Poli::create(['nama_poli' => 'Poli Umum', 'keterangan' => 'Poli Umum']);
        $userDokter = User::create([
            'nama' => 'Dr. Budi', 'email' => 'budi2@gmail.com', 'password' => bcrypt('password'), 'role' => 'dokter', 'id_poli' => $poli->id
        ]);
        $dokter = Dokter::create([
            'user_id' => $userDokter->id, 'nama' => $userDokter->nama, 'alamat' => 'Alamat Budi', 'no_hp' => '08123456789'
        ]);
        $jadwal = JadwalPeriksa::create([
            'dokter_id' => $dokter->id, 'hari' => 'Senin', 'jam_mulai' => '08:00:00', 'jam_selesai' => '10:00:00', 'status' => 'aktif'
        ]);
        $pasien = User::create([
            'nama' => 'Pasien Test', 'email' => 'pasien2@test.com', 'password' => bcrypt('password'), 'role' => 'pasien'
        ]);

        // 2. Act: Submit registration
        $response = $this->actingAs($pasien)->post(route('pasien.daftar-poli.submit'), [
            'id_poli' => $poli->id,
            'id_jadwal' => $jadwal->id,
            'keluhan' => 'Sakit kepala',
            'id_pasien' => $pasien->id,
        ]);

        // 3. Assert: Check if record exists and redirected
        $response->assertStatus(302);
        $this->assertDatabaseHas('daftar_poli', [
            'id_pasien' => $pasien->id,
            'id_jadwal' => $jadwal->id,
            'keluhan' => 'Sakit kepala',
        ]);
    }
}
