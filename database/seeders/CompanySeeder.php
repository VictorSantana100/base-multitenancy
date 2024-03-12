<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Company::create([
            'name' => 'Instituto de Pesquisa em Análises Físico-Químicas',
            'abbreviation' => 'IPAF',
            'email' => 'ipaf@uesc.com.br',
            'uuid' => Str::uuid(),
            'logo' => '/imgs/logo_ipaf.png',
            'cnpj' => '00000706000120'
        ]);
    }
}
