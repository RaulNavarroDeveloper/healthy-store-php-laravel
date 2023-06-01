<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PublicacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('publicaciones')->insert([
            [
                'publicacion_id' => 1,
                'categoria_id' => 1,
                'usuario_id' => 1,
                'titulo' => 'La importancia de comer sano',
                'meta_title' => 'La importancia de comer sano',
                'resumen' => 'Todos sabemos que las personas que se alimentan de forma saludable y equilibrada, y con alimentos variados, tienen una mayor probabilidad de: crecer y desarrollarse sanos y fuertes; tener más energía para trabajar y disfrutar de sí mismos; sufrir menos infecciones y otras enfermedades.',
                'contenido' => 'Comer una dieta bien balanceada puede ayudarle a disminuir el riesgo de contraer varias enfermedades así como a mantener un peso saludable.
                Hay ciertas ocasiones en las que es particularmente importante asegurarse de seguir una dieta saludable, por ejemplo, si desea bajar de peso o si está cuidando lo que come porque está embarazada. Sin embargo, es importante comer una dieta balanceada toda su vida, sin importar qué edad tenga; nunca es mal momento para hacer cambios y mejorar sus hábitos alimentarios. Existe evidencia sólida que demuestra que comer una dieta saludable puede reducir su riesgo de obesidad y enfermedades tales como diabetes, cardiopatía, accidentes cerebrovasculares, osteoporosis y algunos tipos de cáncer.',
                'imagen' => 'la-importancia-de-comer-sano.jpg',
                'imagen_preview' => 'la-importancia-de-comer-sano.jpg',
                'created_at' => now(),
                'updated_at' => now(),

            ],
            [
                'publicacion_id' => 2,
                'categoria_id' => 3,
                'usuario_id' => 1,
                'titulo' => 'Razones por las que hacer ejercicio es bueno',
                'meta_title' => 'Razones por las que hacer ejercicio es bueno',
                'resumen' => 'Sabes que hacer ejercicio es bueno para ti, ¿pero sabes cuán bueno es? Descubre de qué manera puede enriquecer tu vida el ejercicio: desde levantar tu estado de ánimo hasta mejorar tu vida sexual.',
                'contenido' => 'Todos lo hemos oído muchas veces: El ejercicio regular es bueno para la salud y puede ayudarte a bajar de peso. Pero si usted es como muchos argentinos, pasa mucho tiempo ocupado, tiene un trabajo sedentario y no se ejercita habitualmente. La buena noticia es que nunca es demasiado tarde para empezar. Usted puede comenzar de a poco y encontrar maneras de hacer más actividad física en su vida. Para obtener el mayor beneficio, usted debe tratar de realizar la cantidad recomendada de ejercicio para su edad. Si usted lo logra, se sentirá mejor, ayudará a prevenir o controlar muchas enfermedades y puede incluso vivir más tiempo.',
                'imagen' => 'razones-porque-hacer-ejercicio.jpg',
                'imagen_preview' => 'razones-porque-hacer-ejercicio.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'publicacion_id' => 3,
                'categoria_id' => 3,
                'usuario_id' => 1,
                'titulo' => 'La importancia de hacer cardio',
                'meta_title' => 'La importancia de hacer cardio',
                'resumen' => 'Practicar cardio de forma regular es uno de los aspectos que más tenemos en cuenta a la hora de ponernos en forma. Pero, ¿porqué es tan importante para nuestra salud?',
                'contenido' => 'Los ejercicios de entrenamiento cardio, son los que aumentan nuestro ritmo cardíaco, incrementan nuestra capacidad de resistencia, y mejoran nuestra condición física.
                 Y es que el ejercicio cardio aporta infinidad de beneficios para nuestra salud, y la podemos realizar en variedad de formas, ya sea andando, corriendo, subiendo escaleras, o realizando cualquier tipo de actividad física durante período prolongado de tiempo a una intensidad moderada.
                 Cuando realizamos un entrenamiento cardio, nuestro organismo soporta adaptaciones debido a la práctica frecuente de ejercicio aeróbico, esa acomodación y cambio en nuestro cuerpo será mayor o menor dependiendo principalmente de la frecuencia, del grado de intensidad y de la duración.
                 La intensidad es un factor fundamental, ya que cuanto mayor sea la intensidad de nuestra actividad cardiovascular, mayor y mejor será la acomodación de nuestro cuerpo en la capacidad de realizar futuras actividades de igual o mayor intensidad.
                 A la intensidad se le suma la duración del ejercicio, ya que en el equilibrio entre ambos factores deriva la forma perfecta de conseguir la efectividad del entrenamiento. Una intensidad adecuada en cardio provoca el aumento de nuestro ritmo cardiorrespiratorio, quemando más calorías rápidamente al tiempo que mejoramos nuestro metabolismo.
                 El mantenimiento de esa intensidad, ligada a una duración prolongada de entrenamiento ayuda a mejorar nuestra resistencia fortaleciendo nuestro corazón y pulmones. Y estos son solo algunos de los beneficios más importantes que aporta la realización de entrenamientos cardio.',
                'imagen' => 'importancia-del-cardio.jpg',
                'imagen_preview' => 'importancia-del-cardio.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
