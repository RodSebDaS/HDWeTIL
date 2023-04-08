<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\ProcesosPostsUser;
use App\Models\User;
use Illuminate\Database\Seeder;
use Laravel\Jetstream\Rules\Role;
use Spatie\Permission\Contracts\Role as ContractsRole;
use Spatie\Permission\Models\Role as ModelsRole;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //ABIERTAS SIN ATENDER
        $post = Post::create([
            'tipo_id' => 1,
            'titulo' => 'Aula virtual no me deja inscribirme a las materias',
            'sla' => '2023-01-25 10:00:00',
            'descripcion' => 'No me deja inscribirme a las materias en el aula virtual',
            'servicio_id' =>  '2',
            'activo_id' => '6',
            'prioridad_id' => '1',
            'estado_id' =>  '1',
            'flujovalor_id' => '1',
            'activa' => true,
            'user_id_created_at' => '2',
            'user_id_updated_at' => '2',
            'calificacion' => 0,
            'votos' => 0,
            'respuesta' => '<p>1. Compruebe de que possea acceso a internet.<br>2. Compruebe su conexión a internet.<br>4. Diríjase a su cuenta en la Plataforma de Aulas Virtuales FCEQyN.<br>5. Una vez loguedo vaya a la seccion principal y seleccione una categoria.<br>6. Seleccione la materia y dese de alta.<br>7. Si los inconvenientes persisten ingrese una descripción detallada del mismo.<br>8 . Dirijase a la seccion de tutoriales en:&nbsp;</p><figure class="image"><img src="http://127.0.0.1:8000/storage/images/YrEKfqax8PgS4slv8bB4AjDCbvhs8a1NIzMRBNHS.png"></p><p><a href="https://www.fceqyn.unam.edu.ar/moodle/mod/book/view.php?id=2677">https://www.fceqyn.unam.edu.ar/moodle/mod/book/view.php?id=2677</a></p><p>&nbsp;</p>',
            'observacion' => 'La solicitud está abierta.',
        ]);
        //User_Created_at
        $user_created_at_nombre = User::where('id', '=', $post->user_id_created_at)->pluck('name');
        $user_created_at_email = User::where('id', '=', $post->user_id_created_at)->pluck('email');
        $user_created_at_nombre = $user_created_at_nombre[0] ?? '';
        $user_created_at_email = $user_created_at_email[0] ?? '';
        //User_Updated_at
        $user_updated_at_nombre = User::where('id', '=', $post->user_id_updated_at)->pluck('name');
        $user_updated_at_email = User::where('id', '=', $post->user_id_updated_at)->pluck('email');
        $user_updated_at_nombre = $user_updated_at_nombre[0] ?? '';
        $user_updated_at_email = $user_updated_at_email[0] ?? '';

        ProcesosPostsUser::create([
            'post_id' => $post->id,
            'titulo' => $post->titulo,
            'tipo_id' => $post->tipo_id,
            'tipo_nombre' => $post->tipo->nombre,
            'prioridad_id' => $post->prioridad_id,
            'prioridad_nombre' => $post->prioridad->nombre,
            'estado_id' => $post->estado_id,
            'estado_nombre' => $post->estado->nombre,
            'flujovalor_id' => $post->flujovalor_id,
            'flujovalor_nombre' => $post->flujovalor->nombre,
            'servicio_id' => $post->servicio_id,
            'servicio_nombre' => $post->servicio->nombre,
            'activo_id' =>  $post->activo_id,
            'activo_nombre' => $post->activo->nombre,
            'sla' => $post->sla,
            'descripcion' => $post->descripcion,
            'activa' => $post->activa,
            'respuesta' => $post->respuesta,
            'observacion' => $post->observacion,
            //user-created
            'role_user_created_at' => 'Alumno',
            'user_id_created_at' => $post->user_id_created_at,
            'user_name_created_at' => $user_created_at_nombre,
            'user_email_created_at' => $user_created_at_email,
            'level_created_at' => '1',
            //user-updated
            'role_user_updated_at' => 'Alumno',
            'user_id_updated_at' => $post->user_id_updated_at,
            'user_name_updated_at' => $user_updated_at_nombre,
            'user_email_created_at' => $user_updated_at_email,
            'level_updated_at' => '1',
            //user-asignated
            'role_user_asignated_at' => null,
            'user_id_asignated_at' => null,
            'user_name_asignated_at' => null,
            'user_email_asignated_at' => null,
            'level_asignated_at' => null,
        ]);

        //CERRADAS
        $post = Post::create([
            'tipo_id' => 1,
            'titulo' => 'No puedo ingresar a mi cuenta de SUI',
            'sla' => '2023-01-25 10:00:00',
            'descripcion' => 'No puedo ingresar a mi cuenta de SUI',
            'servicio_id' =>  '5',
            'activo_id' => '6',
            'prioridad_id' => '1',
            'estado_id' =>  '4',
            'flujovalor_id' => '4',
            'activa' => false,
            'user_id_created_at' => '2',
            'user_id_updated_at' => '2',
            'calificacion' => 0,
            'votos' => 0,
            'respuesta' => '<p>1. Compruebe de que possea acceso a internet.<br>2. Compruebe su conexión a internet.<br>4. Diríjase a su cuenta en la Plataforma de Aulas Virtuales FCEQyN.<br>5. Una vez loguedo vaya a la seccion principal y seleccione una categoria.<br>6. Seleccione la materia y dese de alta.<br>7. Si los inconvenientes persisten ingrese una descripción detallada del mismo.<br>8 . Dirijase a la seccion de tutoriales en:&nbsp;</p><figure class="image"><img src="http://127.0.0.1:8000/storage/images/1AmEgFcVYXOYtP5PZ4QxaxpVZvbUSPe0uQgrAYqb.png"></p><p><a href="https://www.fceqyn.unam.edu.ar/moodle/mod/book/view.php?id=2677">https://www.fceqyn.unam.edu.ar/moodle/mod/book/view.php?id=2677</a></p><p>&nbsp;</p>',
            'observacion' => 'La solicitud está cerrada.',
        ]);
        
         //User_Created_at
         $user_created_at_nombre = User::where('id', '=', $post->user_id_created_at)->pluck('name');
         $user_created_at_email = User::where('id', '=', $post->user_id_created_at)->pluck('email');
         $user_created_at_nombre = $user_created_at_nombre[0] ?? '';
         $user_created_at_email = $user_created_at_email[0] ?? '';
        //User_Updated_at
         $user_updated_at_nombre = User::where('id', '=', $post->user_id_updated_at)->pluck('name');
         $user_updated_at_email = User::where('id', '=', $post->user_id_updated_at)->pluck('email');
         $user_updated_at_nombre = $user_updated_at_nombre[0] ?? '';
         $user_updated_at_email = $user_updated_at_email[0] ?? '';

        ProcesosPostsUser::create([
            'post_id' => $post->id,
            'titulo' => $post->titulo,
            'tipo_id' => $post->tipo_id,
            'tipo_nombre' => $post->tipo->nombre,
            'prioridad_id' => $post->prioridad_id,
            'prioridad_nombre' => $post->prioridad->nombre,
            'estado_id' => $post->estado_id,
            'estado_nombre' => $post->estado->nombre,
            'flujovalor_id' => $post->flujovalor_id,
            'flujovalor_nombre' => $post->flujovalor->nombre,
            'servicio_id' => $post->servicio_id,
            'servicio_nombre' => $post->servicio->nombre,
            'activo_id' =>  $post->activo_id,
            'activo_nombre' => $post->activo->nombre,
            'sla' => $post->sla,
            'descripcion' => $post->descripcion,
            'activa' => $post->activa,
            'respuesta' => $post->respuesta,
            'observacion' => $post->observacion,
            //user-created
            'role_user_created_at' => 'Alumno',
            'user_id_created_at' => $post->user_id_created_at,
            'user_name_created_at' => $user_created_at_nombre,
            'user_email_created_at' => $user_created_at_email,
            'level_created_at' => '1',
            //user-updated
            'role_user_updated_at' => 'Alumno',
            'user_id_updated_at' => $post->user_id_updated_at,
            'user_name_updated_at' => $user_updated_at_nombre,
            'user_email_created_at' => $user_updated_at_email,
            'level_updated_at' => '1',
            //user-asignated
            'role_user_asignated_at' => null,
            'user_id_asignated_at' => null,
            'user_name_asignated_at' => null,
            'user_email_asignated_at' => null,
            'level_asignated_at' => null,
        ]);

        $post = Post::create([
            'tipo_id' => 1,
            'titulo' => 'Servidor no inicia',
            'sla' => '2021-05-10 08:00:00',
            'descripcion' => 'Servidor no inicia',
            'servicio_id' =>  '4',
            'activo_id' => '7',
            'prioridad_id' => '3',
            'estado_id' =>  '4',
            'flujovalor_id' => '4',
            'activa' => false,
            'user_id_created_at' => '2',
            'user_id_updated_at' => '2',
            'calificacion' => 0,
            'votos' => 0,
            'respuesta' => '<p>1. Compruebe de que el dispositivo esté conectado a la toma corriente.<br>2. Vea la siguiente guía e identifique los indicadores con falla.</p><figure class="image"><img src="http://127.0.0.1:8000/storage/images/UMAwuILebTuXqAWqbDQLwe8xbkrk4dvcGGKxeYUH.png"></figure><br>3. Para más información diríjase a:</p><p><a href="https://support.hpe.com/hpesc/public/docDisplay?docId=a00063977es_es&amp;docLocale=es_ES">https://support.hpe.com/hpesc/public/docDisplay?docId=a00063977es_es&amp;docLocale=es_ES</a></p>',
            'observacion' => 'La solicitud está cerrada.', 
        ]);

         //User_Created_at
         $user_created_at_nombre = User::where('id', '=', $post->user_id_created_at)->pluck('name');
         $user_created_at_email = User::where('id', '=', $post->user_id_created_at)->pluck('email');
         $user_created_at_nombre = $user_created_at_nombre[0] ?? '';
         $user_created_at_email = $user_created_at_email[0] ?? '';
        //User_Updated_at
         $user_updated_at_nombre = User::where('id', '=', $post->user_id_updated_at)->pluck('name');
         $user_updated_at_email = User::where('id', '=', $post->user_id_updated_at)->pluck('email');
         $user_updated_at_nombre = $user_updated_at_nombre[0] ?? '';
         $user_updated_at_email = $user_updated_at_email[0] ?? '';

        ProcesosPostsUser::create([
            'post_id' => $post->id,
            'titulo' => $post->titulo,
            'tipo_id' => $post->tipo_id,
            'tipo_nombre' => $post->tipo->nombre,
            'prioridad_id' => $post->prioridad_id,
            'prioridad_nombre' => $post->prioridad->nombre,
            'estado_id' => $post->estado_id,
            'estado_nombre' => $post->estado->nombre,
            'flujovalor_id' => $post->flujovalor_id,
            'flujovalor_nombre' => $post->flujovalor->nombre,
            'servicio_id' => $post->servicio_id,
            'servicio_nombre' => $post->servicio->nombre,
            'activo_id' =>  $post->activo_id,
            'activo_nombre' => $post->activo->nombre,
            'sla' => $post->sla,
            'descripcion' => $post->descripcion,
            'activa' => $post->activa,
            'respuesta' => $post->respuesta,
            'observacion' => $post->observacion,
            //user-created
            'role_user_created_at' => 'Alumno',
            'user_id_created_at' => $post->user_id_created_at,
            'user_name_created_at' => $user_created_at_nombre,
            'user_email_created_at' => $user_created_at_email,
            'level_created_at' => '1',
            //user-updated
            'role_user_updated_at' => 'Alumno',
            'user_id_updated_at' => $post->user_id_updated_at,
            'user_name_updated_at' => $user_updated_at_nombre,
            'user_email_created_at' => $user_updated_at_email,
            'level_updated_at' => '1',
            //user-asignated
            'role_user_asignated_at' => null,
            'user_id_asignated_at' => null,
            'user_name_asignated_at' => null,
            'user_email_asignated_at' => null,
            'level_asignated_at' => null,
        ]);

        $post = Post::create([
            'tipo_id' => 1,
            'titulo' => 'Página aula virtual caída',
            'sla' => '2022-07-18 17:30:00',
            'descripcion' => 'Página aula virtual caída',
            'servicio_id' =>  '2',
            'activo_id' => '6',
            'prioridad_id' => '3',
            'estado_id' =>  '4',
            'flujovalor_id' => '4',
            'activa' => false,
            'user_id_created_at' => '2',
            'user_id_updated_at' => '2',
            'calificacion' => 0,
            'votos' => 0,
            'respuesta' => '<p>&nbsp;</p><p>1. Compruebe de que posea acceso a internet.<br>2. Compruebe su conexión a internet.<br>3 . Compruebe su firewall.<br>3. Refresque la cache con F5.<br>4. Si sigue apareciendo la siguiente imagen 404:</p><p><img src="http://127.0.0.1:8000/storage/images/CnR8JsR9N59Uhq6mHfgzUKtI9t9nqLasM1VLZTOt.png"><br>5. Intente ingresar más tarde. Estaremos trabajando para resolverlo la antes posible. Disculpe las molestias!</p><p>&nbsp;</p>',
            'observacion' => 'La solicitud está cerrada.',
        ]);

         //User_Created_at
         $user_created_at_nombre = User::where('id', '=', $post->user_id_created_at)->pluck('name');
         $user_created_at_email = User::where('id', '=', $post->user_id_created_at)->pluck('email');
         $user_created_at_nombre = $user_created_at_nombre[0] ?? '';
         $user_created_at_email = $user_created_at_email[0] ?? '';
        //User_Updated_at
         $user_updated_at_nombre = User::where('id', '=', $post->user_id_updated_at)->pluck('name');
         $user_updated_at_email = User::where('id', '=', $post->user_id_updated_at)->pluck('email');
         $user_updated_at_nombre = $user_updated_at_nombre[0] ?? '';
         $user_updated_at_email = $user_updated_at_email[0] ?? '';

        ProcesosPostsUser::create([
            'post_id' => $post->id,
            'titulo' => $post->titulo,
            'tipo_id' => $post->tipo_id,
            'tipo_nombre' => $post->tipo->nombre,
            'prioridad_id' => $post->prioridad_id,
            'prioridad_nombre' => $post->prioridad->nombre,
            'estado_id' => $post->estado_id,
            'estado_nombre' => $post->estado->nombre,
            'flujovalor_id' => $post->flujovalor_id,
            'flujovalor_nombre' => $post->flujovalor->nombre,
            'servicio_id' => $post->servicio_id,
            'servicio_nombre' => $post->servicio->nombre,
            'activo_id' =>  $post->activo_id,
            'activo_nombre' => $post->activo->nombre,
            'sla' => $post->sla,
            'descripcion' => $post->descripcion,
            'activa' => $post->activa,
            'respuesta' => $post->respuesta,
            'observacion' => $post->observacion,
            //user-created
            'role_user_created_at' => 'Alumno',
            'user_id_created_at' => $post->user_id_created_at,
            'user_name_created_at' => $user_created_at_nombre,
            'user_email_created_at' => $user_created_at_email,
            'level_created_at' => '1',
            //user-updated
            'role_user_updated_at' => 'Alumno',
            'user_id_updated_at' => $post->user_id_updated_at,
            'user_name_updated_at' => $user_updated_at_nombre,
            'user_email_created_at' => $user_updated_at_email,
            'level_updated_at' => '1',
            //user-asignated
            'role_user_asignated_at' => null,
            'user_id_asignated_at' => null,
            'user_name_asignated_at' => null,
            'user_email_asignated_at' => null,
            'level_asignated_at' => null,
        ]);

        /* Post::factory(5)
            ->create(); */
    }
}
