<?php

use App\Speaker;
use Illuminate\Database\Seeder;

class SpeakersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Speaker::create([
            'name' => 'Mg. Karla Vanessa Barreto Stein',
            'company' => 'Advisory Services de EY',
            'position' => 'Gerente',
            'email' => 'karlabarretostein@gmail.com',
            'profile' => 'https://pe.linkedin.com/in/mg-karla-vanessa-barreto-stein-72b2a674',
            'description' => 'Manager de la división de Advisory Services de EY. Magister en Dirección y Gestión de Tecnologías de la Información en la Universidad Nacional Mayor de San Marcos. Cuenta con más de 9 años de experiencia en los campos de Dirección y Gestión de Proyectos de Consultoría, Auditoría, Seguridad y TI.',
            'image' => '1.jpg',
            'enable' => 1,
        ]);

        Speaker::create([
            'name' => 'Roberto Llanos Gallo',
            'company' => 'Scotiabank Peru',
            'position' => 'Director de Aplicaciones TI',
            'email' => 'roberto.llanos@gmail.com',
            'profile' => 'https://pe.linkedin.com/in/rllanosg/es',
            'description' => 'Director de TI, múltiples proyectos complejos y simultáneos, desarrollo de aplicaciones de TI, gestión de demanda, portafolio de proyectos, gestión de infraestructura de TI, transformación de procesos, tercerización de servicios, logística de comercio exterior, servicios profesionales de TI, consultoria empresarial, banca y servicios financieros.',
            'image' => '0.jpg',
            'enable' => 1,
        ]);

        Speaker::create([
            'name' => 'Luigi Antonio Lizza Mendoza',
            'company' => 'Efact Servicios y tecnologías de la información',
            'position' => 'Gerente de Tecnologías de Información',
            'email' => 'llizza@esan.org.pe',
            'profile' => 'https://pe.linkedin.com/in/llizza',
            'description' => 'Cuento con veinte años de experiencia profesional, habiendo laborado en empresas transnacionales, con una facturación superior a los US$ 114 billones anuales. He tenido a mi cargo proyectos de sistemas con presupuestos superiores a los US$ 2 millones con equipos de trabajo de más de 30 personas, con experiencia en dos implementaciones de SAP ERP participando en una de ellas como Gerente de Proyecto, habiendo sido responsable de la elaboración de las bases, criterios de evaluación y contrato para la selección de un ERP y del consultor a cargo de su implementación. ',
            'image' => '2.jpg',
            'enable' => 1,
        ]);

        Speaker::create([
            'name' => 'Javier Quevedo',
            'company' => 'Asociacion de Exportadores ADEX',
            'position' => 'Gerente de TI',
            'email' => 'https://digitalinbiznez.wordpress.com/',
            'profile' => 'https://pe.linkedin.com/in/javierquevedor',
            'description' => 'Magister en Sistemas e Informática con mención en Gestión de Tecnologías de Información y Comunicaciones con más de 15 años de experiencia en empresas transnacionales del sector retail y servicios para la minería, liderando proyectos de desarrollo e implementación de SAP, Business Inteligence e Infraestructura, todos ellos orientados a la mejora continua de procesos y de la organización.',
            'image' => '3.jpg',
            'enable' => 1,
        ]);
        Speaker::create([
            'name' => 'Raul Saldaña',
            'company' => 'Danper Trujillo SAC',
            'position' => 'SubGerente de Tecnologías de Información y Procesos Empresariales',
            'email' => 'raul11sc@gmail.com',
            'profile' => 'https://pe.linkedin.com/in/mbaraulsaldana/es',
            'description' => 'Excelencia profesional en la Ingeniería de Sistemas, con gran capacidad para la Gestión de Empresas haciendo uso de Tecnologías de Información y la Gestión por procesos. Gran experiencia en proyectos de apoyo a la gestión y automatización de procesos empresariales a nivel Comercial, Logístico, Planeamiento, Producción, Operaciones, Calidad, Exportaciones, Contabilidad y Finanzas en empresas con más de 500 usuarios, con operaciones a nivel nacional y con una facturación superior a $125MM anuales. ',
            'image' => '4.jpg',
            'enable' => 1,
        ]);
    }
}
